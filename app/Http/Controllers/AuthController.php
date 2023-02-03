<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Mail;
use Session;
use App\Models\Volunteer;
use App\Models\Inscription;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmailController;

class AuthController extends Controller
{
    /* Dashboard */

    public function userIncompleteDashboard()
    {
        return view('dashboard.dashboardIncomplete');
    }

    public function loggedDashboard()
    {
        $inscriptions = Inscription::where('volunteer_id', Auth::user()->id)
            ->get();
        return view('dashboard.dashboard', compact("inscriptions"));
    }

    public function adminDashboard()
    {
        return view('dashboard.dashboardAdmin');
    }

    /* End Dashboard */

    /* Login */
    public function login(Request $request)
    {

        $request->validate([
            'numDocVol' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('numDocVol', 'password');
        try {
            $volunteer = Volunteer::select('isLoggeable')->where('numDocVol', $request['numDocVol'])->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect()->route('vol.login')->with('errorLogin', 'No se ha podido realizar el login. El DNI o NIE es incorrecto');
        }

        if (Auth::attempt($credentials)) {
            return $this->checkRole();
        } else
            return Redirect()->route('vol.login')->with('errorLogin', 'No se ha podido realizar el login. La contraseña es incorrecta');
    }
    /* End Login */

    public function checkRole()
    {
        if (Auth::user()->isAdminVol == true) {
            return Redirect()->route('dashboard.admin');
        }

        if (Auth::user()->isIncomplete() || Auth::user()->isRegisterComplete == 0) {
            return Redirect()->route('dashboard.incomplete');
        }

        if (Auth::user()->isLoggeable == 1) {
            return Redirect()->route('dashboard.logged');
        }

        return Redirect()->view('endpoint.endLoginBanned');
    }

    /* Register */
    public function create(Request $request)
    {
        $request->validate(
            [
                'nameVol' => 'required',
                'surnameVol' => 'required',
                'surname2Vol' => 'required',
                'birthDateVol' => 'required',
                'typeDocVol' => 'required',

                'numDocVol' => [
                    'unique:volunteer',
                    function ($attribute, $value, $fail) use ($request) {
                        $resultado = false;
                        $resultado = ($this->checkDNI($request['numDocVol']) || $this->checkNIF($request['numDocVol']) ? true : false);
                        if (!$resultado) {
                            $fail("El documento ya esta registrado");
                        }

                    }
                ],
                'telVol' => 'required',
                'sexVol' => 'required',
                'shirtSizeVol' => 'required',
                'persMailVol' => 'required|email|unique:volunteer|regex:/(.+)@(.+)\.(.+)/i',
                'persMailConfVol' => [
                    'required'
                ],
                'dataConf' => 'required',
                'offenseConf' => 'required',
                'typeViaVol' => 'required',
                'direcVol' => 'required',
                'numVol' => 'required',
                'codPosVol' => 'required',
                'stateVol' => 'required',
                'townVol' => 'required',
            ],
            [
                'numDocVol.unique' => 'Ese documento ya se encuentra en nuestra base de datos',
                'persMailVol.unique' => 'Ese correo ya se encuentra en nuestra base de datos'
            ]
        );

        $data = $request->all();
        $check = $this->store($data);
        return view('endpoint.endRegister');

    }

    public function store(array $data)
    {
        

        $pass = ($this->genPass());

        echo "La pass es $pass";

        EmailController::sendRegisterMail($data['persMailVol'], $pass);
        $pass = Hash::make($pass);

        return Volunteer::create([
            'nameVol' => $data['nameVol'],
            'surnameVol' => $data['surnameVol'],
            'surname2Vol' => $data['surname2Vol'],
            'birthDateVol' => $data['birthDateVol'],
            'typeDocVol' => $data['typeDocVol'],
            'numDocVol' => $data['numDocVol'],
            'telVol' => $data['telVol'],
            'sexVol' => $data['sexVol'],
            'persMailVol' => $data['persMailVol'],
            'shirtSizeVol' => $data['shirtSizeVol'],
            'password' => $pass,
            'typeViaVol' => $data['typeViaVol'],
            'direcVol' => $data['direcVol'],
            'numVol' => $data['numVol'],
            'flatVol' => $data['flatVol'],
            'aditiInfoVol' => $data['aditiInfoVol'],
            'codPosVol' => $data['codPosVol'],
            'stateVol' => $data['stateVol'],
            'townVol' => $data['townVol'],
            'nameAuthVol' => $data['nameAuthVol'],
            'tlfAuthVol' => $data['tlfAuthVol'],
            'numDocAuthVol' => $data['numDocAuthVol']
        ]);

    }
    /* End Register */

    /* Recovery Pasword */
    public function recoveryPassword(Request $request)
    {
        $pass = ($this->genPass());
        EmailController::recoveryPassword($request['persMailVol'], $pass);
        $pass = Hash::make($pass);
        Volunteer::where('persMailVol', $request['persMailVol'])
            ->where('isAdminVol', "!=", 1)
            ->update(['password' => $pass]);
        return Redirect()->route('endpoint.endPasswordRecovery');
    }
    /* End Recovery Pasword */

    /* Validate User */

    public function completeUser(Request $request)
    {
        $toValidate = Volunteer::find($request->doc)
            ->update(['isRegisterComplete' => true]);
        $toMail = Volunteer::select('persMailVol')
            ->where('id', '=', $request->doc)
            ->first();
        EmailController::validateUser($toMail['persMailVol'], "");

        session()->flash('validateUser', 'El usuario ha sido validado correctamente.');
        return redirect()->route('dashboard.admin.showNotify');
    }

    /* End Validate User */

    /* Utilities */

    public static function logOut()
    {
        Auth::logout();
        return Redirect()->route('home');
    }

    public static function isLogged()
    {
        return Auth::check();
    }

    public static function isAdmin()
    {

        return Auth::user()->isAdminVol;
    }

    function genPass()
    {
        $comb = 'abcdefghjklmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
        $pass = array();
        $combLen = strlen($comb) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $combLen);
            $pass[] = $comb[$n];
        }
        return implode($pass);
    }


    function checkDNI($dni)
    {
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
            return true;
        } else {
            return false;
        }
    }

    function checkNIF($nif)
    {
        $nif = strtoupper($nif);
        if (preg_match('~(^[XYZ\d]\d{7})([TRWAGMYFPDXBNJZSQVHLCKE]$)~', $nif, $parts)) {
            $control = 'TRWAGMYFPDXBNJZSQVHLCKE';
            $nie = array('X', 'Y', 'Z');
            $parts[1] = str_replace(array_values($nie), array_keys($nie), $parts[1]);
            $cheksum = substr($control, $parts[1] % 23, 1);
            return ($parts[2] == $cheksum);
        } elseif (preg_match('~(^[ABCDEFGHIJKLMUV])(\d{7})(\d$)~', $nif, $parts)) {
            $checksum = 0;
            foreach (str_split($parts[2]) as $pos => $val) {
                $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
            }
            $checksum = ((10 - ($checksum % 10)) % 10);
            return ($parts[3] == $checksum);
        } elseif (preg_match('~(^[KLMNPQRSW])(\d{7})([JABCDEFGHI]$)~', $nif, $parts)) {
            $control = 'JABCDEFGHI';
            $checksum = 0;
            foreach (str_split($parts[2]) as $pos => $val) {
                $checksum += array_sum(str_split($val * (2 - ($pos % 2))));
            }
            $checksum = substr($control, ((10 - ($checksum % 10)) % 10), 1);
            return ($parts[3] == $checksum);
        }
        return false;
    }

    public static function getAuth()
    {
        return Auth::user()->id;
    }
}