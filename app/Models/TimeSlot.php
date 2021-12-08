<?php

namespace App\Models;

use Carbon\Carbon;
use Constants\Checks;
use Helpers\Time;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'time_slots';

    protected $with = ['timeChecks'];

    protected $fillable = [
        'user_id',
        'date',
        'total_time',
        'total_seconds',
        'created'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    
    protected $casts = [
        'date'  => 'datetime:Y-m-d',
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

    public function calculateTotalTime(){
        $checks = $this->timeChecks;
        $totalTimeSeconds = 0;

        if(count($checks)>1){
            $lastCheck = null;
            foreach($checks as $check){
                if($lastCheck!= null && $lastCheck->type == Checks::$in && $check->type == Checks::$out){
                    $totalTimeSeconds += $check->check_time->diffInSeconds($lastCheck->check_time);
                    $lastCheck = null;
                    continue;
                }

                $lastCheck = $check;
            }
        }

        $totalTime = Time::secondsToHours($totalTimeSeconds);
        $this->total_time = $totalTime;
        $this->total_seconds = $totalTimeSeconds;
        $this->save();

        return $totalTime;
    }
}
