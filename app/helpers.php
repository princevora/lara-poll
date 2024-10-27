<?php

use Illuminate\Support\Carbon;

if (!function_exists('getGreeting')) {
    
    /**
     * @param ?mixed $time
     * @return ?string
     */
    function getGreeting($time = null): ?string
    {
        $time = empty($time) ? Carbon::now()->hour : $time;

        if ($time >= 6 && $time < 12) {
            return 'Good morning';
        } elseif ($time >= 12 && $time < 18) {
            return 'Good afternoon';
        } else {
            return 'Good evening';
        }    
    }
}
