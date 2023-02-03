<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function showMyEducation()
    {
        $education = Auth::user()->education;
        return view('dashboard.showAllEducation', compact("education"));
    }

    public function deleteEducation (Request $request)
    {
        $delete = Auth::user()->education->find($request->id);
        $delete = $delete['filenameEdu'];

        Storage::delete('education/'.$delete);

        Auth::user()->education->find($request->id)->delete();

        session()->flash('deleteEducation', 'Un Titulo ha sido borrado de tu expediente.');
        return Redirect()->route('dashboard.showMyEducation');    
    }

    public function createEducation ()
    {
        return view('dashboard.createEducation');
    }

    public function saveEducation (Request $request)
    {
        $validated = $request->validate([
            'titleEdu' => 'required',
            'hoursEdu' => 'required',
            'endEdu' => 'required',
            'file' => 'required|max:5120|mimes:pdf'
        ]);

        /* Subir */
        $filename=str_replace(" ","",$validated['titleEdu'].Auth::user()->nameVol).date('mdYhis', time()).substr($_FILES['file']['name'],-4,4);
        // $validated['file']->storeAs('education', $filename );

        /* Guardar */

        $education = new Education;
        $education->titleEdu = $validated['titleEdu'];
        $education->hoursEdu = $validated['hoursEdu'];
        $education->endEdu = $validated['endEdu'];
        $education->filenameEdu = $filename;

        Auth::user()->education()->save($education);


        /* Redirigir */
        session()->flash('uploadEducation', 'Un Titulo ha sido GUARDADO EN tu expediente.');
        return Redirect()->route('dashboard.showMyEducation');    

    }

    public function downloadEducation(Request $request)
    {
        $filename = Auth::user()->education->find($request->id);
        $filename=($filename['filenameEdu']);
        return Storage::download('education/'.$filename);
    }
    
    public function downloadThatEducation(Request $request)
    {
        $filename = Education::find($request->id);
        $filename=($filename['filenameEdu']);
        return Storage::download('education/'.$filename);
    }
}
