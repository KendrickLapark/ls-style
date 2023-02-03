<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nameDoc',
        'titleDoc',
        'isContactModelVol',
        'isInscripModelVol',
        'volunteer_id',
    ];

    public function volunteer()
    {
        return $this->belongsTo(Volunteer::class);
    }
}
