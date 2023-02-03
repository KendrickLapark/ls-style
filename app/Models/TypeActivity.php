<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Activity;

class TypeActivity extends Model
{
    protected $primaryKey = 'typeAct_id';

    use HasFactory;

    protected $fillable = [
        'nameTypeAct',
        'descTypeAct',
        'sonOf'
    ];

    public function activity()
    {
       /*
       return $this->belongsToMany(
           RelatedModel, 
           pivot_table_name, 
           foreign_key_of_current_model_in_pivot_table, 
           foreign_key_of_other_model_in_pivot_table);   
       */
       return $this->belongsToMany(
            Activity::class,
            'activity_type_activities',
            'typeActivity_id',
            'activity_id'
            );
    }

}
