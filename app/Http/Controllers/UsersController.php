<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Volunteer;
use App\Models\Delegation;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function avatarChangeForm()
    {
        return view('dashboard.changeAvatarForm');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'file' => 'required|max:5120|image',
        ]);
        $filename = Auth::user()->nameVol . Auth::user()->surnameVol . Auth::user()->surname2Vol . substr(Auth::user()->numDocVol, 0, 4) . '.jpg';
        $request->file('file')->storeAs('avatar', $filename);
        $volunteer = Volunteer::find(Auth::user()->id)
            ->update(['imageVol' => $filename]);
        session()->flash('successUploadImage', 'Se ha subido el Avatar.');
        return redirect()->route('dashboard.changeAvatar');
    }

    public function showAllUsers()
    {
        $volunteers = Volunteer::select(
            'id',
            'nameVol',
            'surnameVol',
            'surname2Vol',
            'birthDateVol',
            'typeDocVol',
            'numDocVol',
            'telVol',
            'sexVol',
            'shirtSizeVol',
            'persMailVol',
            'corpMailVol',
            'typeViaVol',
            'direcVol',
            'numVol',
            'flatVol',
            'aditiInfoVol',
            'codPosVol',
            'stateVol',
            'townVol',
            'imageVol',
            'organiVol',
            /********/
            'isLoggeable',
            'isInternVol',
            'isRegisterComplete',
            /********/
            'nameAuthVol',
            'tlfAuthVol',
            'numDocAuthVol'
        )
            ->where('isAdminVol', '!=', "1")
            ->get();
        return view("dashboard.showAllUsers", compact("volunteers"));
    }

    public function showMyProfile()
    {
        $volunteer = Volunteer::select(
            'id',
            'nameVol',
            'surnameVol',
            'surname2Vol',
            'birthDateVol',
            'typeDocVol',
            'numDocVol',
            'telVol',
            'sexVol',
            'shirtSizeVol',
            'persMailVol',
            'corpMailVol',
            'typeViaVol',
            'direcVol',
            'numVol',
            'flatVol',
            'aditiInfoVol',
            'codPosVol',
            'stateVol',
            'townVol',
            'imageVol',
            'organiVol',
            /********/
            'isInternVol',
            /********/
            'nameAuthVol',
            'tlfAuthVol',
            'numDocAuthVol'
        )
            ->where('id', Auth::user()->id)
            ->first();

        $allDelegations = Delegation::all();
        return view('dashboard.showMyProfileForm', compact("volunteer", "allDelegations"));

    }

    public function banUser(Request $request)
    {
        $volunteer = Volunteer::select('id')
            ->where('id', $request['id'])
            ->update(['isLoggeable' => 0]);
        session()->flash('successUser', 'Se ha BLOQUEADO el USUARIO.');
        return redirect()->route('dashboard.showAllUsers');

    }

    public function unbanUser(Request $request)
    {
        $volunteer = Volunteer::select('id')
            ->where('id', $request['id'])
            ->update(['isLoggeable' => 1]);
        session()->flash('successUser', 'Se ha DESBLOQUEADO el USUARIO.');
        return redirect()->route('dashboard.showAllUsers');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'shirtSizeVol' => 'required',
            'organiVol' => 'required',
            'telVol' => 'required',
            'typeViaVol' => 'required',
            'direcVol' => 'required',
            'numVol' => 'required',
            'aditiInfoVol' => 'required',
            'codPosVol' => 'required',
            'stateVol' => 'required',
            'townVol' => 'required',
            // 'delegations' => 'required',
        ]);

        $volunteer = Volunteer::find(Auth::user()->id);
        if ($volunteer->delegations()->count() != 0) {
            $volunteer->delegations()->detach();
        }

        $volunteer->delegations()->attach($request->delegations);

        Auth::user()->update(
            [
                'shirtSizeVol' => $request->shirtSizeVol,
                'organiVol' => $request->organiVol,
                'telVol' => $request->telVol,
                'corpMailVol' => $request->corpMailVol,
                'typeViaVol' => $request->typeViaVol,
                'direcVol' => $request->direcVol,
                'numVol' => $request->numVol,
                'flatVol' => $request->flatVol,
                'aditiInfoVol' => $request->aditiInfoVol,
                'codPosVol' => $request->codPosVol,
                'stateVol' => $request->stateVol,
                'townVol' => $request->townVol
            ],
        );

        session()->flash('successUpdateUser', 'Se ha Actualizado el USUARIO.');
        return redirect()->route('dashboard.showMyProfile');
    }

    public static function showEachInterest($activity)
    {
        $interest = [];
        foreach ($activity as $getTypeAct) {
            foreach ($getTypeAct->typeAct as $typeAct) {
                array_push($interest, $typeAct->nameTypeAct);
            }
        }
        return array_unique($interest); 
    }

    /* Método de búsqueda de usuarios según su nombre pepe*/ 

    public function searchVolunteerByNameSurname($search){

        $volunteers=Volunteer::where('nameVol', $search)->get();

        return view('dashboard.showAllUsers', compact("volunteers"));
        
    }


    /* pepe */

    public function search(Request $request){
    
        if($request->ajax()){
    
            $data=Volunteer::where('id','like','%'.$request->search.'%')
            ->orwhere('nameVol','like','%'.$request->search.'%')
            ->orwhere('surnameVol','like','%'.$request->search.'%')->get();
    
            $output='';
        if(count($data)>0){
    
             /* $output ='
                <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>';
    
                    foreach($data as $row){
                        $output .='
                        <tr>
                        <th scope="row">'.$row->id.'</th>
                        <td>'.$row->nameVol.'</td>
                        <td>'.$row->surnameVol.'</td>
                        </tr>
                        ';
                    }
 
             $output .= '
                 </tbody>
                </table>'; */

                $output ='

                ';

                foreach($data as $row){

                    $output .='

                    <div class="row" style="padding-top: 15px;
                    padding-bottom: 10px;
                    padding-left: 30px;
                    padding-right: 30px;
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: center;
                    border: 1px solid black;
                    background-color: #e8f1fa;
                    border-radius: 25px;
                    margin:20px;">
                        <div>
                            <strong>
                                '.$row->id.''.
                                 $row->nameVol.''.
                                 $row->surname2Vol.' 
                            </strong>
                            <br />';

                            if ($row->organiVol == false)
                            {
                                $output .='
                                SIN Empresa Asociada';
                            }
                                
                            else
                            {
                                $output .=''.$row->organiVol.'';
                            }

                            $output .='
                        </div>

                        <div class="mailVol">
                            <a href="mailto:'. $row->persMailVol . '.">' . $row->persMailVol . '</a>
                            '; 
                            if ($row->corpMailVol){
                                $output .= '
                                    (C)
                                    <a href="mailto:'. $row->corpMailVol .'">'.$row->corpMailVol .'</a>';
                            }

                            $output .='

                        </div>

                        <div class="tlfVol">
                            <a href="tel:+34 ' . $row->telVol .'">'. $row->telVol . '.</a>
                        </div>
                        <div class="controlButton moreDetails">
                        <i class="bx bxs-down-arrow"></i>
                        </div>
                    </div>


                    


                    ';

                }

                $output .='

                ';

        }
        else{
    
            $output .='No results';
    
        }
    
        return $output;
    
        }

      }

}