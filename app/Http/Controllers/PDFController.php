<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\Document;
use App\Models\Activity;
use App\Models\Inscription;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;



use PDF;
   
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ContactModelVol()
    {

        $data = [
            'date' => date('d/m/Y'),
            'name' => Auth::user()->nameVol.' '.Auth::user()->surnameVol.' '.Auth::user()->surname2Vol,
            'numDoc' => Auth::user()->typeDocVol.' '.Auth::user()->numDocVol,
            'street' => Auth::user()->typeViaVol.' '.Auth::user()->direcVol.', Nº '.Auth::user()->numVol,
            'birthDate' => date('d-m-Y',strtotime(Auth::user()->birthDateVol)),
        ];

        $pdf = PDF::loadView('pdf.contactModelVol', $data);
        $filename="modeloAcuerdoDeIncorpora".Auth::user()->nameVol.Auth::user()->surnameVol.Auth::user()->surname2Vol.'.pdf';
        $filename =htmlspecialchars(str_replace(' ', '', $filename));
        return $pdf->download($filename);
    }

    public function volunteerInscriptionModel()
    {
        $autorizer = (Auth::user()->nameAuthVol == '')? '':(Auth::user()->nameAuthVol.' '.Auth::user()->numDocAuthVol.' ( Tel: '.Auth::user()->tlfAuthVol.' )');
        $data = [
            'date' => date('d/m/Y'),
            'name' => Auth::user()->nameVol,
            'surnames' => Auth::user()->surnameVol.' '.Auth::user()->surname2Vol,
            'numDoc' => Auth::user()->typeDocVol.' '.Auth::user()->numDocVol,
            'street' => Auth::user()->typeViaVol.' '.Auth::user()->direcVol.', Nº '.Auth::user()->numVol.' '.Auth::user()->flatVol.' '.Auth::user()->codPosVol.' '.Auth::user()->stateVol.' '.Auth::user()->townVol,
            'aditiInfo' => Auth::user()->aditiInfoVol,
            'tel' => Auth::user()->telVol,
            'persMail' => Auth::user()->persMailVol,
            'authorizer' => $autorizer ,
        ];

        $pdf = PDF::loadView('pdf.volunteerInscriptionModel', $data);
        $filename="contratoDeVoluntariado".Auth::user()->nameVol.Auth::user()->surnameVol.Auth::user()->surname2Vol.'.pdf';
        $filename =htmlspecialchars(str_replace(' ', '', $filename));
        return $pdf->download($filename);
    }

    public function preinscription(Request $request)
    {
        $inscription = Inscription::find($request->id);
        $data = [
            'date' => date('d/m/Y'),
            'direAct' =>  $inscription->activity->direAct,
            'entityAct' =>  $inscription->activity->entityAct ,
            'nameAct' =>  $inscription->activity->nameAct ,
            'dateAct' =>  date('d-m-Y',strtotime( $inscription->activity->dateAct)),
            'startTimeAct' => $inscription->activity->timeAct,
            'endTimeAct' =>  $inscription->activity->endTimeAct  ,

            'requiAct' =>  $inscription->activity->requiAct,
            'requiPrevAct' =>  $inscription->activity->requiPrevAct,
            'formaAct' =>  $inscription->activity->formaAct,

            'nameVol' => $inscription->volunteer->nameVol,
            'surnameVol' => $inscription->volunteer->surnameVol,
            'surname2Vol' => $inscription->volunteer->surname2Vol,

            'typeDocVol' =>  $inscription->volunteer->typeDocVol,
            'numDocVol' =>  $inscription->volunteer->numDocVol,
        ];

        $pdf = PDF::loadView('pdf.preinscription', $data);
        $filename="preinscripción".$inscription->activity->nameAct.Auth::user()->nameVol.Auth::user()->surnameVol.Auth::user()->surname2Vol.'.pdf';
        $filename =htmlspecialchars(str_replace(' ', '', $filename));
        return $pdf->download($filename);

    }


    public function initialPDFupload(Request $request)
    {
        $request->validate([
            'file1' => 'required|max:5120|mimes:pdf',
            'file2' => 'required|max:5120|mimes:pdf'
            ]);
        foreach ($request->file() as $key=>$file) {
            $filename=Auth::user()->nameVol.Auth::user()->surnameVol.Auth::user()->surname2Vol.substr(Auth::user()->numDocVol,0,4).$_FILES['file'.substr($key,-1,1)]['name'];
            $file->storeAs('pdf', $filename );
            $volunteer = Volunteer::find(Auth::user()->id);
            $document = new Document;
            $document->nameDoc = $filename;
            if(substr($key,-1,1)==1){
                $document->isContactModelVol=true;
                $document->titleDoc="Modelo_Contrato_Voluntariado";
            }else if(substr($key,-1,1)==2){
                $document->isInscripModelVol=true;
                $document->titleDoc="Inscripcion_Registro_Personas_Voluntarias";
            }
            $volunteer = $volunteer->documents()->save($document);

        }
        EmailController::initialPDFUploader(Auth::user()->nameVol,Auth::user()->persMailVol);                               

        return view('endpoint.endIncomplete');

    }
}