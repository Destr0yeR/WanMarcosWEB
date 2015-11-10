<?php

namespace App\Services\Util;

use Carbon\Carbon;

class DateTimeService {

    public function __construct() {
        $this->today = Carbon::now();
    }

    public function getDateTime(){
        return Carbon::now()->toDateTimeString();
    }

    public function getActiveDate() {
        $tmp = Carbon::now();
        return $tmp->subDays(config('constants.max_active_days'))->toDateTimeString();
    }

    public function getInactiveDate() {
        $tmp = Carbon::now();
        return $tmp->subDays(config('constants.max_active_days')+1)->toDateTimeString();
    }

    public function convertDate($timestamp) {
        $date = Carbon::now();
        $date->timestamp = $timestamp;
        return $date;
    }

    public function convertDateString($timestamp) {
        $date = Carbon::now();
        $date->timestamp = $timestamp;
        return $date->toDateTimeString();
    }

    public function getDaysDifference($a, $b) {
        return $a->diffInDays($b);
    }

    public function getHoursDifference($a, $b) {
        return $a->diffInHours($b);
    }

    public function getDaysTodayDifference($a){
        return $this->getDaysDifference($this->today, $a);
    }

    public function getDaysTodayDifferenceTimestamp($a){
        return $this->getDaysDifference($this->today, $this->convertDate($a));
    }

    public function getHoursTodayDifference($a){
        return $this->getHoursDifference($this->today, $a);
    }
    public function getHoursTodayDifferenceTimestamp($a){
        return $this->getHoursDifference($this->today, $this->convertDate($a));
    }

    public function parse($str){
        return Carbon::parse($str);
    }
}