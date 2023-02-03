<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;
use App\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
 
class EmailController extends Controller
{

    public static function getAdmins()
    {
        if(Auth::user()){
            $chained=[];
            $volunteers = Volunteer::where('isAdminVol',"=",1)
                                    ->orderBy('persMailVol')
                                    ->get();
            foreach ($volunteers as $volunteer ) {
                array_push($chained, $volunteer->persMailVol);
            }
            return $chained;
        }
    }

    public function sendEmail($dato,$saludo,$subject, $reciever,$body)
    {
        $mailInfo = new \stdClass();
        $mailInfo->title ="Voluntariado Magtel";
        $mailInfo->saludo=$saludo;
        $mailInfo->dato = $dato;        
        $mailInfo->senderCompany = "Voluntariado Magtel";
        $mailInfo->to = $reciever;
        $mailInfo->subject = $subject;
        $mailInfo->name = "Voluntariado Magtel";
        $mailInfo->cc = "";
        $mailInfo->bcc = "";
        $mailInfo->from = "jose.exposito@magtel.es";
        $mailInfo->body = $body;
        Mail::to($reciever)
           ->send(new Mailer($mailInfo));
    }

    public static function sendRegisterMail($persMailVol,$pass)
    {
        try{
            $saludo = "Gracias por registrarse en Voluntariado Magtel";
            $subject = "Registro Voluntariado Magtel";
            $body = "Aqui tiene su contraseña";
            $dato = $pass;
            (new EmailController)->sendEmail($dato,$saludo,$subject, $persMailVol, $body);
        }catch(\Exception $e){
            return view('endpoint.error');
        }
    }

    public static function recoveryPassword($persMailVol,$pass)
    {
        try{
            $saludo = "Recuperación de contraseña en Voluntariado Magtel";
            $subject = "Ha solicitado una recuperación de contraseña";
            $body = "Aqui tiene su contraseña";
            $dato = " Su nueva contraseña es:  ".$pass;
            (new EmailController)->sendEmail($dato,$saludo,$subject, $persMailVol, $body);
        }catch(\Exception $e){
            return view('endpoint.error');
        }

    }

    public static function initialPDFUploader($nameVol, $persMailVol)
    {
        foreach (self::getAdmins() as $eachAdmin) {
            try{
                $saludo = $nameVol. " ha SUBIDO los documentos iniciales";
                $subject = $nameVol."-".$persMailVol." ha SUBIDO los documentos iniciales";
                $body = "";
                $dato="Puedes Confirmarlos en la sección de Administrador";
                (new EmailController)->sendEmail($dato,$saludo,$subject, $eachAdmin, $body);
            }catch(\Exception $e){
                return view('endpoint.error');
            }
        }
    }

    public static function validateUser($persMailVol,$dato)
    {
        try{
            $saludo = "Su usuario ha sido validado";
            $subject = "Su usuario ha sido validado en la plataforma de Voluntariado Magtel";
            $body = "Ya puede acceder a todas las funcionalidades";
            $dato = "";
            (new EmailController)->sendEmail($dato,$saludo,$subject, $persMailVol, $body);
        }catch(\Exception $e){
            return view('endpoint.error');
        }

    }

    public static function sendPreinscriptionMail($nameAct,$persMailVol)
    {
        try{
            $saludo = "Gracias por preinscribirte en una actividad";
            $subject = "Preinscripción en actividad del Voluntariado Magtel";
            $body = "Se ha Preinscrito  :  ".$nameAct.' ('.date('H:i:s').'-'.date('d-m-Y').')';
            $dato = "Puede terminar la inscripción cuando quiera accediendo a la web";
            (new EmailController)->sendEmail($dato,$saludo,$subject, $persMailVol, $body);
        }catch(\Exception $e){
            return view('endpoint.error');
        }
    }

    public static function sendPreinscriptionToAdminMail($nameVol,$persMailVol, $nameAct)
    {
        foreach (self::getAdmins() as $eachAdmin) {
            try{
                $saludo = $nameVol. " se ha preinscrito a una actividad de Voluntariado ";
                $subject = $nameVol."-".$persMailVol." se ha preinscrito a una actividad de Voluntariado";
                $body = $persMailVol." se ha preinscrito en  :  ".$nameAct.' ('.date('H:i:s').'-'.date('d-m-Y').')';
                $dato = "";
                (new EmailController)->sendEmail($dato,$saludo,$subject, $eachAdmin, $body);
            }catch(\Exception $e){
            }
        }
    }

    public static function completeInscriptionMail($nameAct,$persMailVol)
    {
        try{
            $saludo = "SE HA VALIDADO UNA INSCRIPCION";
            $subject = "INSCRIPCION en actividad del Voluntariado Magtel";
            $body = "Se ha inscrito a:  ".$nameAct.' ('.date('H:i:s').'-'.date('Y-m-d').')';
            $dato = "Se pondra en contacto con usted un administrador de la plataforma";
            (new EmailController)->sendEmail($dato,$saludo,$subject, $persMailVol, $body);
        }catch(\Exception $e){
            return view('endpoint.error');
        }
    }

    public static function declinatePreinscriptionMail($nameAct,$persMailVol)
    {
        try{
            $saludo = "Lo sentimos";
            $subject = "Rechazo en actividad del Voluntariado Magtel";
            $body = "Su inscripción en la actividad:  ".$nameAct.' ('.date('H:i:s').'-'.date('Y-m-d').')'." ha sido rechazada";
            $dato = "Aun quedan muchas actividades en las que dar tu apoyo";
            (new EmailController)->sendEmail($dato,$saludo,$subject, $persMailVol, $body);
        }catch(\Exception $e){
            return view('endpoint.error');
        }
    }

    public static function nullActivityMail($nameAct,$persMailVol)
    {
        try{
            $saludo = "Lo sentimos";
            $subject = "Actividad Anulada";
            $body = "Por motivos ajenos a nuestra voluntad se ha anulado la actividad:  ".$nameAct.' ('.date('H:i:s').'-'.date('Y-m-d').')';
            $dato = "Aun quedan muchas actividades en las que dar tu apoyo";
            (new EmailController)->sendEmail($dato,$saludo,$subject, $persMailVol, $body);
        }catch(\Exception $e){
            return view('endpoint.error');
        }
    }

}
