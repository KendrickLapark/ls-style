<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Volunteer;
use App\Models\Document;
use App\Models\Inscription;
use App\Models\TypeActivity;

use DB;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function adminShowNotify()
    {
        $isNotCompleted=Volunteer::where('isRegisterComplete',0)
                                    ->where('isAdminVol',0)
                                    ->get();
                                    
        $inscriptionNotValidated=Inscription::where('filenameIns','!=', null)
                                            ->where('isCompletedIns', 0)
                                            ->get();
        return view("dashboard.showAdminNotifications", compact("isNotCompleted","inscriptionNotValidated"));

    }

    public function loggedShowNotify()
    {
        $activityTypes = TypeActivity::all();
        $inscription = Inscription::where('volunteer_id', Auth::user()->id)->get() ;
       
        return view("dashboard.showLoggedNotifications", compact("inscription","activityTypes"));

    }

    public static function notifyTrigger()
    {
        $isNotCompleted=Document::select('volunteer_id', DB::raw('SUM(isContactModelVol)') , DB::raw('SUM(isInscripModelVol)')) 
                                ->join('Volunteer', 'documents.volunteer_id','=','Volunteer.id')
                                ->groupBy('volunteer_id')
                                ->where('isAdminVol','=',0)
                                ->where('isRegisterComplete','=',0)
                                ->count();
        if($isNotCompleted>0){
            return true;
        }

        $inscriptionNotValidated=Inscription::where('filenameIns','!=', null)
                                            ->where('isCompletedIns', 0)
                                            ->count();
        if($inscriptionNotValidated>0){
            return true;
        }


        /* Documentos */
        return false;
    }

    public static function notifyLoggedTrigger()
    {
        /* Tenemos documentos que subir */
        $activities=Volunteer::find(Auth::user()->id)->activities;

        $noDocUploaded=0;
        foreach ($activities as  $activity) {
            if($activity->pivot->filenameIns==null){
                $noDocUploaded++;
            }
        }
        if ($noDocUploaded>0){
            return true;
        } 
        
        return false;
    }
}
