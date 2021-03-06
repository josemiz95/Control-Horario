<?php

namespace App\Http\Controllers;

use Constants\Checks;
use App\Models\TimeSlot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
                
                $slotToday = $slotToday->fresh();
                $slotToday->calculateTotalTime();

                return response($check, 201);

            } elseif ($action == Checks::$in) {
                $slotToday = $user->timeSlots()->create([
                    'date' => date('Y-m-d'),
                ]);

                $check = $slotToday->createCheck($action);

                return response($check, 201);
            }
        }

        return response(['message'=>'Action not allowed'], 400);
    }

    public function recalculateSlotTime($id){
        $slot = TimeSlot::findOrFail($id);
        $totalTime = $slot->calculateTotalTime();

        return response(['slot'=>$slot, 'total_time'=>$totalTime]);
    }

    public function userChecksFromDate(Request $request){
        $validation = Validator::make($request->all(),[
            'user'=>'required|exists:users,id',
            'date'=>'required|date',
        ]);
        
        if(!$validation->fails()){
            $user = User::find($request->input('user'));
            // $date = new Carbon($request->input('date'));
            $date = Carbon::create($request->input('date'));

            $timeSlots = $user->getTimeSlotsDate($date);
            $timeSlotsTotal = $user->getTimeSlotsTotalDate($date);

            return response(['slots'=>$timeSlots, 'total_time'=>$timeSlotsTotal], 200);
        }
        
        return response(['status'=>false, 'errors'=>$validation->errors()->toArray()], 403);
    }
}
