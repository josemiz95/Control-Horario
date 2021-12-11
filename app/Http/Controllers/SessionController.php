<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Constants\Checks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function getUserData(){
        $session = Auth::user();

        return response($session, 200);
    }

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

    public function getTodayChecks(){
        $session = Auth::user();
        $checks = $session->getChecksDate(Carbon::today());

        return response($checks, 200);
    }

    public function getChecks(){
        $session = Auth::user();

        return response($session->checks, 200);
    }
}
