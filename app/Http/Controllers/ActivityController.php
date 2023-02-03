<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use App\Models\Activity;
use App\Models\Inscription;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showAllActivities()
    {
        //$activities = Activity::all();
        $activities = Activity::orderBy('dateAct')->get();
        $activityTypes = TypeActivity::all();

        return view('dashboard.showAllActivities', compact("activities","activityTypes"));
    }

    public function formCreateActivity()
    {
        $activityTypes = TypeActivity::all();
        return view("dashboard.createActivity", compact("activityTypes"));
    }

    public function saveActivity(Request $request)
    {
        $request->validate([
            'nameAct' => 'required',
            'descAct' => 'required',
            'entityAct' => 'required',
            'timeAct' => 'required',
            'dateAct' => 'required',
            'quotasAct' => 'required',
        ]);

        $activity = new Activity;
        
        $activity->nameAct = $request->nameAct;
        $activity->descAct = $request->descAct;
        $activity->entityAct = $request->entityAct;
        $activity->timeAct = $request->timeAct;
        $activity->dateAct = $request->dateAct;
        if ($request->isPreseAct=="on"){
            $activity->isPreseAct = true;
        }else{
            $activity->isPreseAct = false;
        }
        $activity->quotasAct = $request->quotasAct;



        $activity->direAct = $request->direAct;
        $activity->requiPrevAct = $request->requiPrevAct;
        $activity->requiAct = $request->requiAct;
        $activity->formaAct = $request->formaAct;
        $activity->endTimeAct = $request->endTimeAct;


        $activity->save();
        $activity->typeAct()->attach($request->ActTypes);


        session()->flash('sucessActivityCreated', 'Se ha CREADO una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }

    public function deleteActivity(Request $request)
    {
        try{
            $fromDatabase = Activity::where('activity_id',$request->id)->delete();
        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }

        session()->flash('sucessActivityDeleted', 'Se ha BORRADO una ACTIVIDAD.');
       return redirect()->route('dashboard.showAllActivities');
    }

    public function doVisible(Request $request)
    {
        try{
            $activity = Activity::where('activity_id',$request->id)
                                ->update(['isVisible'=> true]);
        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
            
        session()->flash('sucessVisibleActivity', 'Se ha CAMBIADO A VISIBLE una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }

    public function doInvisible(Request $request)
    {
        try{
            $activity = Activity::where('activity_id',$request->id)
                                ->update(['isVisible'=> false]);
        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
            
        session()->flash('sucessVisibleActivity', 'Se ha CAMBIADO A INVISIBLE una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');

    }

    public function getActivityUpdateData(Request $request)
    {
        try{
            $activity = Activity::where('activity_id',$request->id)->first();

            $activityTypes = TypeActivity::all();

            return view('dashboard.showUpdateActivityForm', compact("activity","activityTypes"));
    


        }catch(\Exception $e){
            return redirect()->route('dashboard.showAllActivities');
        }
    }

    public function updateActivity(Request $request)
    {
        $request->validate([
            'nameAct' => 'required',
            'descAct' => 'required',
            'entityAct' => 'required',
            'timeAct' => 'required',
            'dateAct' => 'required',
            'quotasAct' => 'required',
            'direAct' => 'required',
            'requiPrevAct' => 'required',
            'formaAct' => 'required',
            'endTimeAct' => 'required',
            'requiAct' => 'required',
        ]);

        if ($request->isPreseAct=="on"){
            $presen = true;
        }else{
            $presen = false;
        }

        $activity = Activity::where('activity_id', $request->activity_id);

        $activity->update([
                    'nameAct' => $request->nameAct,
                    'descAct' => $request->descAct,
                    'entityAct' => $request->entityAct,
                    'timeAct' => $request->timeAct,
                    'dateAct' => $request->dateAct,
                    'quotasAct' => $request->quotasAct,  
                    'isPreseAct' => $presen,       
                    'direAct' => $request->direAct,
                    'requiPrevAct' => $request->requiPrevAct,
                    'formaAct' => $request->formaAct,
                    'endTimeAct' => $request->endTimeAct,
                    'requiAct' => $request->requiAct,         
                ]);

        $activity = Activity::find($request->activity_id);

        $activity->typeAct()->detach();

        $activity->typeAct()->attach($request->ActTypes);

        session()->flash('sucessActivityUpdated', 'Se ha ACTUALIZADO una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }

    public function showAllActivitiesLogged(Request $request)
    {
        $activities = Activity::select('activities.activity_id','activities.nameAct','activities.descAct','activities.dateAct','activities.timeAct','activities.isNulledAct')
                                ->where('activities.isVisible', 1)
                                ->get();
        $activityTypes = TypeActivity::all();
        return view('dashboard.showAllActivitiesLogged', compact("activities","activityTypes"));
    }

    /* Metodo para filtrar por fecha pepe */

    public static function showActivitiesByDate($dateActivity)
    {

        $activities = Activity::where('activities.dateAct', $dateActivity)
                                ->get();
        return redirect()->route('dashboard.showAllActivitiesLogged');

    }


    public static function quotaCalculator($quota,$activity_id)
    {
        $inscription = Inscription::where('activity_id',$activity_id)
                                    ->where('isCompletedIns',true)
                                    ->count();
        return ($quota-$inscription);
    }

    public static function inscriptedYet($activity_id, $volunteer_id)
    {
        if (Inscription::where('activity_id', $activity_id)
                        ->where('volunteer_id', $volunteer_id)
                        ->count() != 0) {
                            return true;
        } else
            return false;
    }

    public function showThatActivity ($activity_id)
    {
        $activity = Activity::where('activity_id',$activity_id)
                            ->where('isVisible',true)
                            ->first();
        $activityTypes = TypeActivity::all();
        return view('dashboard.showThatActivity', compact("activity","activityTypes"));
    }

    public function showFilterByTypeAct($id)
    {
        $typeAct = TypeActivity::where('typeAct_id',$id)->first();
 
        $activities=$typeAct->activity;

        $activityTypes = TypeActivity::all();
        $typeAct = $typeAct->nameTypeAct;

        return view('dashboard.showActivitiesByCategoryLogged', compact("activities","activityTypes","typeAct"));
    }

    public function nullActivity(Request $request)
    {
        $activity = Activity::where('activity_id',$request->id)->first();
        Activity::where('activity_id',$request->id)->first()->update(['isNulledAct'=> true]);

        foreach ($activity->volunteers as $volunteer) {
            EmailController::nullActivityMail(
                $activity->nameAct,
                $volunteer->persMailVol
            ); 
        }
        session()->flash('nullActivity', 'Se ha ANULADO una ACTIVIDAD.');
        return redirect()->route('dashboard.showAllActivities');
    }

}