<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $primaryKey = 'inscription_id';

    use HasFactory;

    protected $fillable = [
        'isCompletedIns',
        'filenameIns'
    ];
    
    public function activity()
    {
        return $this->belongsTo(Activity::class,'activity_id', 'activity_id');
    }

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class,'volunteer_id', 'id');
    }
}
