<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function showUserDocuments()
    {
        $documents = Auth::user()->documents()->get();
        return view("dashboard.showMyDocuments", compact("documents"));
    }

    public function downloadMyDocument(Request $request)
    {
        $filename = Auth::user()->documents()
                                ->select('nameDoc')
                                ->where('doc_id',$request->doc)
                                ->first();
        $filename=($filename['nameDoc']);
        return Storage::download('pdf/'.$filename);
    }

    public function downloadThatDocument(Request $request)
    {
        $filename = Document::select('nameDoc')
                                ->where('doc_id',$request->doc)
                                ->first();
        
        $filename=($filename['nameDoc']);
        return Storage::download('pdf/'.$filename);
    }

    public function deleteMyDocument(Request $request)
    {
        $filename = Auth::user()->documents()
                                ->select('nameDoc')
                                ->where('doc_id',$request->doc)
                                ->first();
        $filename=($filename['nameDoc']);
        Storage::delete('pdf/'.$filename);
        $fromDatabase = Auth::user()->documents()->find($request->doc);
        $fromDatabase->delete();
        session()->flash('deleteDocument', 'El documento ha sido borrado correctamente.');
        return redirect()->route('dashboard.showUserDocument');
    }

    public function showThatUserDocuments(Request $request)
    {
        $volunteer = Volunteer::select('nameVol','surnameVol','surname2Vol','numDocVol','persMailVol','telVol')
                                ->where('id',$request->id)
                                ->first();
        $documents = Volunteer::find($request->id)->documents()->get();
        return view("dashboard.showThatUserDocuments", compact("volunteer","documents"));
    }

    public function showThatUserDocumentFromUserList(Request $request)
    {
        $filename = Document::select('nameDoc')
        ->where('doc_id',$request->doc)
        ->first();
        $filename=($filename['nameDoc']);
        return Storage::download('pdf/'.$filename);
    }

}
