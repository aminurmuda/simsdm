<?php

use Carbon\Carbon;

function tanggal($date){
    return Carbon::parse($date)->format('d/m/Y');
} 

function jam($time){
    return Carbon::parse($time)->format("H:i");
} 

function lembur($from, $to){
    $start = Carbon::createFromFormat('Y-m-d H:i:s', $from);
    $end = Carbon::createFromFormat('Y-m-d H:i:s', $to);
    $diff_in_minutes = $end->diffInMinutes($start) - 540;
    if($diff_in_minutes > 0) {
        if($diff_in_minutes > 60) {
            return floor($diff_in_minutes/60) . ' jam ' . ($diff_in_minutes%60) . ' menit';
        }
        return $diff_in_minutes.' menit';

        // return $end;
    } 
    return '-';
} 