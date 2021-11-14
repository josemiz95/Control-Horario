<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'time_slots';

    protected $fillable = [
        'user_id',
        'date',
        'total_time',
        'created'
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

    public function createCheck($action){
        return $this->timeChecks()->create([
            'type' => $action,
            'check_time' => Carbon::now()->toDateTimeString(),
        ]);
    }
}
