<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeCheck extends Model
{
    use HasFactory;

    protected $table = 'time_checks';

    protected $fillable = [
        'slot_id',
        'type', // In / Out
        'check_time',
        'coment',
        'changed',
        'changed_by'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'laravel_through_key'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'check_time'
    ];

    protected $casts = [
        'check_time'  => 'datetime:Y-m-d H:i:s',
    ];

    public function timeSlot(){
        return $this->belongsTo(TimeSlot::class, 'slot_id');
    }

    public function user(){
        return $this->hasOneThrough(User::class, TimeSlot::class, 'slot_id', 'user_id');
    }

    public function changedBy(){
        return $this->belongsTo(User::class, 'changed_by');
    }
}
