<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ExtraActivityController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CSVController;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

/* Auth */

/* Vista Form Register */
Route::get('/registrarVoluntario', function () {
    return view('register');
})->name('vol.create');

/* Hacer clic en registrar */ 
Route::post('/guardarVoluntario',[AuthController::class,'create'])
    ->name('vol.save');

/* Fin Registro */
Route::get('/graciasRegistro', function () {
    return view('endpoint.endRegister');
})->name('vol.end');

/* Vista Form Login */
Route::get('/identificate', function () {
     return view('login');
})->name('vol.login');

/* Hacer clic en login */ 
Route::post('/hacerLogin',[AuthController::class,'login'])
    ->name('vol.doLogin');

/* Form: recovery Password */
Route::get('/recoveryPassword', function () {
        return view('recoveryPassword');
   })->name('vol.recoveryPassWord');

/* Hacer clic en Recovery Password */ 
Route::post('/recoveryPasswordClic',[AuthController::class,'recoveryPassword'])
    ->name('vol.recoveryPasswordClic');

/* Endpoint Recovery */    
Route::get('/endRecoveryPass', function () {
    return view('endpoint.endPasswordRecovery');
})->name('endpoint.endPasswordRecovery');    

/* End Auth */

/* Endpoint Usuario Baneado */
Route::get('/accesobloqueado', function () {
    return view('endpoint.endLoginBanned');
})->name('vol.banned');

/* Logout */
Route::get('/logout',[AuthController::class,'logOut'])
    ->name('vol.logout');

/*************************************************************/
/***MIDDLEWARE ROUTES*****************************************/
/*************************************************************/

Route::middleware(['isUserIncomplete'])->group(function () {
    /* RUTAS INCOMPLETAS */
    Route::get('/dashboard-incomplete', [AuthController::class, 'userIncompleteDashboard'])
        ->name('dashboard.incomplete');
    /* Generate ContactModelVol PDF */
    Route::post('/contactModelVol',[PDFController::class,'ContactModelVol'])
        ->name('PDF.generateContactModelVol');
    /* Generate volunteerInscriptionModel PDF */
    Route::post('/volunteerInscriptionModel',[PDFController::class,'volunteerInscriptionModel'])
        ->name('PDF.volunteerInscriptionModel');
    /* PDF -> initialPDFupload */
    Route::post('/initialPDFupload',[PDFController::class,'initialPDFupload'])
        ->name('PDF.initialPDFupload');
});

Route::middleware(['isLogged'])->group(function () {
    /*RUTAS LOGGEADAS*/
    Route::get('/dashboard-logged',  [AuthController::class, 'loggedDashboard'])
            ->name('dashboard.logged');
    /* Muestro mis documentos */
    Route::get('/dashboard-showUserDocument',  [DocumentController::class, 'showUserDocuments'])
            ->name('dashboard.showUserDocument');
    /* Descarga mi documento */
    Route::post('/dashboard-downloadDocument',  [DocumentController::class, 'downloadMyDocument'])
        ->name('dashboard.downloadDocument');        
    /* Borrar mi documento */
    Route::post('/dashboard-deleteDocument',  [DocumentController::class, 'deleteMyDocument'])
        ->name('dashboard.deleteDocument'); 
    /* Form Logged Change Avatar */
    Route::get('/changeAvatar-logged',[UsersController::class, 'avatarChangeForm'])
        ->name('dashboard.changeAvatar');     
    /* CLIC Form Logged Change Avatar */
    Route::post('/uploadAvatar',[UsersController::class, 'uploadAvatar'])
    ->name('dashboard.uploadAvatar');  
    /* Muestro Perfil Form */
    Route::get('/dashboard-showMyProfile',  [UsersController::class, 'showMyProfile'])
        ->name('dashboard.showMyProfile'); 
    /* CLIC Update Profile Form Logged  */
    Route::post('/updateProfile',[UsersController::class, 'updateProfile'])
        ->name('dashboard.updateProfile');   
    /* Muestro mis education */
    Route::get('/dashboard-showMyEducation',  [EducationController::class, 'showMyEducation'])
        ->name('dashboard.showMyEducation'); 
    /* Borro mi education */
    Route::post('/dashboard-deleteEducation',  [EducationController::class, 'deleteEducation'])
        ->name('dashboard.deleteEducation');   
    /* Form create education */
    Route::match(['get', 'post'], '/dashboard-createEducation',[EducationController::class, 'createEducation'])
    ->name('dashboard.createEducation');   
    /* CLIC Create Education form   */
    Route::post('/dashboard-saveEducation',[EducationController::class, 'saveEducation'])
        ->name('dashboard.saveEducation');       
    /* Descarga mi educación */
    Route::post('/dashboard-downloadEducation',[EducationController::class, 'downloadEducation'])
        ->name('dashboard.downloadEducation');
    /* Muestra todas las actividades */
    Route::get('/dashboard-showAllActivitiesLogged',[ActivityController::class,'showAllActivitiesLogged'])
        ->name('dashboard.showAllActivitiesLogged');
    /* Mostrar MI InfoExtra de usuario */
    Route::post('/dashboard-showMyInfoExtra',  [ExtraActivityController::class, 'showMyInfoExtra'])
        ->name('dashboard.showMyInfoExtra');
    /* CLIC en quiero inscribirme */
    Route::post('/dashboard-makeInscription',  [InscriptionController::class, 'doInscription'])
        ->name('dashboard.makeInscription');
    /* Mostramos dashboard de notificaciones Logged */
    Route::get('/dashboard-logged-showNotify',[NotifyController::class, 'loggedShowNotify'])
        ->name('dashboard.logged.showNotify');
    /* Generate Preinscription PDF */
    Route::post('/preinscription',[PDFController::class,'preinscription'])
        ->name('PDF.generatepreinscription');
    /*  UPLOAD  Preinscription PDF */
    Route::post('/uploadPreinscription',[InscriptionController::class,'uploadPreinscription'])
        ->name('dashboard.uploadPreinscription');
    /* Show Calendar Activity */
    Route::get('/dashboard-logged-showNotify',[NotifyController::class, 'loggedShowNotify'])
        ->name('dashboard.logged.showNotify');
    /* Mostramos los datos de esa actividad */
    Route::get('/showThatActivity/{id}', [ActivityController::class, 'showThatActivity'])
        ->name('dashboard.showThatActivity');
    /* Filtramos calendario por categorias */
    Route::get('/showFilterByTypeAct/{id}', [ActivityController::class, 'showFilterByTypeAct'])
        ->name('dashboard.showFilterByTypeAct');
        /**/ 

});

Route::middleware(['isAdmin'])->group(function () {
    /* RUTAS ADMIN */

    /*pepe*/
    // search route
    Route::get("search",[UsersController::class,'search']);

    Route::get('/dashboard-admin',[AuthController::class, 'adminDashboard'])
            ->name('dashboard.admin');
    /* Mostramos dashboard de notificaciones Admin */
    Route::get('/dashboard-admin-showNotify',[NotifyController::class, 'adminShowNotify'])
            ->name('dashboard.admin.showNotify');
    /* Descarga ESE documento */
    Route::post('/dashboard-downloadThatDocument',  [DocumentController::class, 'downloadThatDocument'])
        ->name('dashboard.downloadThatDocument');   
    /* Validar usuario */
    Route::post('/dashboard-validateUser',  [AuthController::class, 'completeUser'])
        ->name('dashboard.validateUser');  
    /* Mostrar todos los usuarios */
    Route::get('/dashboard-showAllUsers',[UsersController::class, 'showAllUsers'])
        ->name('dashboard.showAllUsers');
    /*Buscar usuarios por nombre o apellidos pepe*/
    Route::get('/dashboard-showAllUsers/{search}', [UsersController::class, 'searchVolunteerByNameSurname'])
        ->name('dashboard.searchVolunteerByNameSurname'); 
    /* Bloquear usuario */
    Route::post('/dashboard-banUser', [UsersController::class, 'banUser'])
        ->name('dashboard.banUser');
    /* Desloquear usuario */
    Route::post('/dashboard-unbanUser',[UsersController::class, 'unbanUser'])
        ->name('dashboard.unbanUser');
    /* Mostrar Documentos de usuario */
    Route::post('/dashboard-showThatUserDocument',  [DocumentController::class, 'showThatUserDocuments'])
        ->name('dashboard.showThatUserDocument');
    /* Mostrar ese Documento desde la lista de documentos */    
    Route::post('/dashboard-showDocument',  [DocumentController::class, 'showThatUserDocumentFromUserList'])
        ->name('dashboard.showDocument');
    /* Mostrar Actividades */
    Route::get('/dashboard-showAllActivities',[ActivityController::class, 'showAllActivities'])
        ->name('dashboard.showAllActivities');
    /* Form Crear Actividad */
    Route::get('/dashboard-formCreateActivity',[ActivityController::class, 'formCreateActivity'])
        ->name('dashboard.formCreateActivity');
    /* Click en  Form Crear Actividad */
    Route::post('/dashboard-saveActivity',[ActivityController::class, 'saveActivity'])
        ->name('dashboard.saveActivity');
    /* Borrar Actividad */
    Route::post('/dashboard-deleteActivity',[ActivityController::class, 'deleteActivity'])
        ->name('dashboard.deleteActivity');
    /* Hacer visible Actividad */
    Route::post('/dashboard-visibleActivity',[ActivityController::class, 'doVisible'])
    ->name('dashboard.visibleActivity');
    /* Hacer visible Actividad */
    Route::post('/dashboard-invisibleActivity',[ActivityController::class, 'doInvisible'])
        ->name('dashboard.invisibleActivity');
    /* Cargar para UPDATE FORM */
    Route::post('/dashboard-getActivityUpdateData',[ActivityController::class, 'getActivityUpdateData'])
        ->name('dashboard.getActivityUpdateData');
    /* Click en  Form Update Actividad */
    Route::post('/dashboard-updateActivity',[ActivityController::class, 'updateActivity'])
        ->name('dashboard.updateActivity');
    /* Mostrar información extra de la actividad */
    Route::post('/dashboard-showAllExtraActivity',[ExtraActivityController::class, 'showAllExtraActivity'])
        ->name('dashboard.showAllExtraActivity');
    /* Form Crear Información Extra Actividad */
    Route::post('/dashboard-formCreateInfoExtra',[ExtraActivityController::class, 'formCreateInfoExtra'])
        ->name('dashboard.formCreateInfoExtra');
    /* Click en  Form Crear Información Extra Actividad */
    Route::post('/dashboard-uploadInfoExtra',[ExtraActivityController::class, 'uploadInfoExtra'])
        ->name('dashboard.uploadInfoExtra');
    /* Mostrar InfoExtra de usuario */
    Route::post('/dashboard-showInfoExtra',  [ExtraActivityController::class, 'showInfoExtra'])
        ->name('dashboard.showInfoExtra');
    /* Descarga educación */
    Route::post('/dashboard-downloadThatEducation',  [EducationController::class, 'downloadThatEducation'])
        ->name('dashboard.downloadThatEducation');
    /* Download Preinscription PDF */
    Route::post('/downloadPreinscription',[InscriptionController::class,'downloadPreinscription'])
        ->name('dashboard.downloadPreinscription');
    /* Validate Preinscription PDF */
    Route::post('/validatePreinscription',[InscriptionController::class,'validatePreinscription'])
        ->name('dashboard.validatePreinscription');
    /* Declinate Preinscription PDF */
    Route::post('/declinatePreinscription',[InscriptionController::class,'declinatePreinscription'])
        ->name('dashboard.declinatePreinscription');
    /* AJAX Volunteer Search */
    Route::post('/ajaxVolunteerSearch',[UsersController::class,'ajaxVolunteerSearch'])
        ->name('dashboard.ajaxVolunteerSearch');
    /* create Users CSV */    
    Route::get('/getUsersCSV',[CSVController::class,'getUsersCSV'])
        ->name('CSV.getUsers');
    /* Borrar Actividad */
    Route::post('/dashboard-nullActivity',[ActivityController::class, 'nullActivity'])
        ->name('dashboard.nullActivity');

});


