<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ExtraActivity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ExtraActivityController extends Controller
{
    public function showAllExtraActivity(Request $request)
    {
        $activity = Activity::where('activity_id',$request->id)->first();

        return view('dashboard.showAllExtraActivity', compact("activity"));
    }
    
    public function formCreateInfoExtra(Request $request)
    {
        $id= $request->id;

        return view('dashboard.createInfoExtraActivity', compact("id"));
    }

    public function uploadInfoExtra (Request $request)
    {
        $request->validate([
            'infoExtra' => 'required|max:5120|mimes:pdf,jpeg,png,jpg',
            'titleInfoExtra' => 'required',
            'id' => 'required',
        ]);
        $activity = Activity::where('activity_id',$request->id)->first();
        $filename=str_replace(" ","",$activity['nameAct'].$request['titleInfoExtra']).date('mdYhis', time()).substr($_FILES['infoExtra']['name'],-4,4);
        $request->file('infoExtra')->storeAs('infoExtra', $filename );

        $activity = Activity::find($request->id);

        $infoExtra = new ExtraActivity;
        $infoExtra->nameInfoExtra = $filename;
        $infoExtra->titleInfoExtra = $request['titleInfoExtra'];

        $activity=$activity->infoExtra()->save($infoExtra);

        session()->flash('successUpload', 'Has añadido información extra a una Actividad.');
        return redirect()->route('dashboard.showAllActivities');
    }

    public function showInfoExtra(Request $request)
    {
        $filename = ExtraActivity::where('extraAct_id',$request->id)
                                    ->first();
        $filename=($filename['nameInfoExtra']);
        return Storage::download('infoExtra/'.$filename);
    }

    public function showMyInfoExtra(Request $request)
    {
        $filename = ExtraActivity::where('extraAct_id',$request->id)
                                    ->first();
        $filename=($filename['nameInfoExtra']);
        return Storage::download('infoExtra/'.$filename);
    }
}
