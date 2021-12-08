<?php

namespace Helpers;

class Time
{
    public static function secondsToHours($seconds){
        $h = str_pad(floor($seconds / 3600), 2, "0", STR_PAD_LEFT);
        $m = str_pad(floor(($seconds / 60) % 60), 2, "0", STR_PAD_LEFT);
        $s = str_pad($seconds % 60, 2, "0", STR_PAD_LEFT);
        
        return "$h:$m:$s";
    }
}