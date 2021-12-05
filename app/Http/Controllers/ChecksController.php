<?php

namespace App\Http\Controllers;

use Constants\Checks;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecksController extends Controller
{
    public function check($action){
        if($action == Checks::$in || $action == Checks::$out){
            $user = Auth::user();
            $slotToday = $user->timeSlots()->where('date','=', date('Y-m-d'))->withCount('timeChecks')
                                            ->where('created','0')
                                            ->orderBy('id','desc')->first();

            if($slotToday && $slotToday->time_checks_count < 2){
                $lastCheck = $slotToday->timeChecks()->orderBy('check_time','desc')->first();

                if($lastCheck->type == $action){
                    return response(['message'=>'Action not allowed'], 400);
                }

                $check = $slotToday->createCheck($action);

                return response($check, 201);

            } elseif ($action == Checks::$in) {
                $slotToday = $user->timeSlots()->create([
                    'date' => date('Y-m-d'),
                    'total_time' => '00:00:00'
                ]);

                $check = $slotToday->createCheck($action);

                return response($check, 201);
            }
        }

        return response(['message'=>'Action not allowed'], 400);
    }
}
