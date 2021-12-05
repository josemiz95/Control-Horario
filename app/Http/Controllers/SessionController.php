<?php

namespace App\Http\Controllers;

use Constants\Checks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    public function getLastCheck(){
        $session = Auth::user();

        $slotToday = $session->timeSlots()->where('date', date('Y-m-d'))->withCount('timeChecks')
                            ->where('created','0')
                            ->orderBy('id','desc')->first();

        if($slotToday && $slotToday->time_checks_count < 2){
            return response(['actual'=>Checks::$in, 'next'=>Checks::$out], 200);
        }

        return response(['actual'=>Checks::$out, 'next'=>Checks::$in], 200);
    }
}
