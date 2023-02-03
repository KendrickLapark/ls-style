<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delegation extends Model
{
    protected $primaryKey = 'delegation_id';

    use HasFactory;

    protected $fillable = [
        'nameDel'
    ];

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
            'volunteer_delegations',
            'delegation_id',
            'volunteer_id'
            );
    }
}
