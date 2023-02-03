<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TypeActivity;

class Activity extends Model
{
    protected $primaryKey = 'activity_id';

    use HasFactory;

    protected $fillable = [
        'nameAct',
        'descAct',
        'entityAct',
        "timeAct",
        "dateAct",
        'isPreseAct',
        'quotasAct',
        'isVisible'
    ];

    public function typeAct()
    {
       /*
       return $this->belongsToMany(
           RelatedModel, 
           pivot_table_name, 
           foreign_key_of_current_model_in_pivot_table, 
           foreign_key_of_other_model_in_pivot_table);   
       */
       return $this->belongsToMany(
            TypeActivity::class,
            'activity_type_activities',
            'activity_id',
            'typeActivity_id'
            );
    }

    public function infoExtra()
    {
        return $this->hasMany(ExtraActivity::class, 'activity_id', 'activity_id' );
    }

    public function volunteers()
    {
       /*
       return $this->belongsToMany(
           RelatedModel, 
           pivot_table_name, 
           foreign_key_of_current_model_in_pivot_table, 
           foreign_key_of_other_model_in_pivot_table);   
       */
       return $this->belongsToMany(
            Volunteer::class,
            'inscriptions',
            'activity_id',
            'volunteer_id'
            )->withPivot('timeIns', 'dateIns','isCompletedIns','filenameIns')
            ->withTimestamps();
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class,'activity_id', 'activity_id' );
    }

    public function colorSelect($activity, $eachInscription)
    {
        if ($activity->isNulledAct){
            return "#8A8A8A";
        } elseif ($activity->isDoneIns == 1) {
            return "#00A300";
        } elseif($eachInscription->isCompletedIns == 1) {
            return "#8f1d21";
        }elseif (is_null($eachInscription->filenameIns) && is_null($eachInscription->isCompletedIns)){
            return "#000000";
        }elseif ($eachInscription->filenameIns && $eachInscription->isCompletedIns == 0){
            return "#ffa500";
        }
    }
}
