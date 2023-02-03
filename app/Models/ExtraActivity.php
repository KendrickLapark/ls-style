<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtraActivity extends Model
{
    protected $primaryKey = 'extraAct_id';

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nameInfoExtra',
        'titleInfoExtra',
        'activity_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id', 'activity_id' );

    }

}
