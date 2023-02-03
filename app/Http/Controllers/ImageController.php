<?php
namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;

class ImageController extends Controller {

    public function __construct()
   {
        $this->middleware('auth');
   } 
    public function getImage($filename) {
       $path = '/gracious-chaplygin.217-76-139-146.plesk.page/storage/app/avatar/'.$filename;
       $type = "image";
       header('Content-Type:'.$type);
       header('Content-Length: ' . filesize($path));
       readfile($path);

    }

 }