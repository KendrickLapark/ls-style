<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class Volunteer extends Authenticatable
{
    public $table="Volunteer";
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nameVol' ,
        'surnameVol' ,
        'surname2Vol' ,
        'birthDateVol',
        'typeDocVol' ,
        'numDocVol' ,
        'telVol',
        'sexVol' ,
        'shirtSizeVol',
        'password',
        'persMailVol' ,
        'corpMailVol' ,
        'typeViaVol',
        'direcVol',
        'numVol',
        'flatVol' ,
        'aditiInfoVol',
        'codPosVol' ,
        'stateVol' ,
        'townVol' ,
        'imageVol',
        'organiVol',
        /********/
        'isLoggeable',
        'isAdminVol',
        'isInternVol',
        'isRegisterComplete',
        /********/
        'nameAuthVol',
        'tlfAuthVol',
        'numDocAuthVol'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isIncomplete()
    {
        $isContactModelVol=$this->documents
                ->where('isContactModelVol',1)
                ->count();
        $isInscripModelVol=$this->documents
                    ->where('isInscripModelVol',1)
                    ->count();

        if ($isInscripModelVol == 0 || $isContactModelVol == 0 ){
            return true;
        }

        return false;
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function delegations()
    {
       return $this->belongsToMany(
            Delegation::class,
            'volunteer_delegations',
            'volunteer_id',
            'delegation_id'
            );
    }

    public function activities()
    {

       return $this->belongsToMany(
            Activity::class,
            'inscriptions',
            'volunteer_id',
            'activity_id'
            )
            ->withPivot('timeIns', 'dateIns','isCompletedIns','filenameIns')
            ->withTimestamps();
            
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class, 'volunteer_id','id' );
    }


}
