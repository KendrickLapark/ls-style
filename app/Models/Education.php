<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $primaryKey = 'education_id';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'volunteer_id',
        'titleEdu',
        'hoursEdu',
        'endEdu',
        'filenameEdu',
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}
