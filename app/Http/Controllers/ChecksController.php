<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChecksController extends Controller
{
    public function check($action){
        if($action == 'in' || $action == 'out'){
            $user = Auth::user();
            $slotToday = $user->timeSlots()->where('date','=', date('Y-m-d'))
                                            ->where('created','0')
                                            ->has('timeChecks', '<', 2)
                                            ->orderBy('id','desc')->first();

            if($slotToday){
                $lastCheck = $slotToday->timeChecks()->orderBy('check_time','desc')->first();

                if($lastCheck->type == $action){
                    return response(['message'=>'action not allowed'], 400);
                }

                $check = $slotToday->createCheck($action);

                return response(['slot'=>$slotToday, 'check'=>$check], 201);

            } elseif ($action == 'in') {
                $slotToday = $user->timeSlots()->create([
                    'date' => date('Y-m-d'),
                    'total_time' => '00:00:00'
                ]);

                $check = $slotToday->createCheck($action);

                return response(['slot'=>$slotToday, 'check'=>$check], 201);
            }
        }

        return response(['message'=>'action not allowed'], 400);
    }
}
