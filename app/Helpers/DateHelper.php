<?php
namespace App\Helpers;

use Morilog\Jalali\Jalalian;

class DateHelper
{
    public static function toJalali($date)
    {
        $jalaliDate = new Jalalian();
        return $jalaliDate->createCarbonFromFormat('Y-m-d', $date);
    }

    public static function toGregorian($date)
    {
        $jalaliDate = new Jalalian();
        return $jalaliDate->createCarbonFromFormat('Y-m-d', $date)->toGregorian();
    }
}
///i want to use jalalian package and i awnt to use it in public functionindex method in my
// transaction controller which has a transaction variabel and it contains  transaction model
// with all() method and compacts it with transaction variable and in front we recieve it
//i want to change ad date which i receive from data base to salary date using the jalalian package

