<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'time_checks';

    protected $fillable = [
        'user_id',
        'date',
        'total_time',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function timeChecks(){
        return $this->hasMany(timeCheck::class, 'slot_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
