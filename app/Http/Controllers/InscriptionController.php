<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use App\Models\Volunteer;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function doInscription(Request $request)
    {
        $volunteer=Volunteer::find(Auth::user()->id);
        $volunteer->activities()->attach($request->id, 
                            [
                                'timeIns' => date('h:i:s'),
                                'dateIns' => date('Y-m-d'),
                            ]
                        );
        session()->flash('doPreinscription', 'Te has preinscrito en una actividad.');
        return redirect()->route('dashboard.logged.showNotify');
    }

    public function uploadPreinscription(Request $request)
    {
        $request->validate([
            'file' => 'required|max:5120|mimes:pdf',
            'id' => 'required',
        ]);
        $inscription = Inscription::where('inscription_id',$request->id)->first();

        $filename=str_replace(" ","",
                            $inscription->activity->nameAct.
                            $inscription->volunteer->nameVol.
                            $inscription->volunteer->surnameVol).
                            date('mdYhis', time()).substr($_FILES['file']['name'],-4,4);

        $persMailVol = $inscription->volunteer->persMailVol;
        $activity = $inscription->activity->nameAct;
        $nameVol = $inscription->volunteer->nameVol;
        $request->file('file')->storeAs('preInscription', $filename );
        $inscription = $inscription
                ->update(['filenameIns'=> $filename]);
        EmailController::sendPreinscriptionMail(
            $activity,
            $persMailVol
        );   

        EmailController::sendPreinscriptionToAdminMail(
            $nameVol,
            $persMailVol,
            $activity
        );   
        session()->flash('uploadPreinscription', 'Se ha subido un documento, espera a que un Administrador lo valide.');
        return redirect()->route('dashboard.logged.showNotify');
    }

    public function downloadPreinscription (Request $request)
    {
        $inscription = Inscription::where('inscription_id',$request->id)->first();
        $filename=($inscription->filenameIns);
        return Storage::download('preInscription/'.$filename);
    }

    public function validatePreinscription(Request $request)
    {
        $inscription = Inscription::where('inscription_id',$request->id)->first();
        $inscription->update(['isCompletedIns'=> true]);
        $nameAct=$inscription->activity->nameAct;
        $persMailVol=$inscription->volunteer->persMailVol;

        EmailController::completeInscriptionMail(
            $nameAct,
            $persMailVol
        );   

        session()->flash('validatePreinscripcion', 'Se ha validado la preinscipcion.');
        return redirect()->route('dashboard.admin.showNotify');
    }


    public function declinatePreinscription(Request $request)
    {
        $inscription = Inscription::where('inscription_id',$request->id)->first();
        Storage::delete('preInscription/'.$inscription->filenameIns);
        $inscription->update(['isCompletedIns'=> null,'filenameIns'=> null]);

        
        EmailController::declinatePreinscriptionMail(
            $inscription->activity->nameAct,
            $inscription->volunteer->persMailVol
        );   

        session()->flash('declinatePreinscription', 'Se ha RECHAZADO una preinscipcion.');
        return redirect()->route('dashboard.admin.showNotify');
    }


}
