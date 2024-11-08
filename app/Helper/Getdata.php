<?php

namespace App\Helper;

use Illuminate\Support\Facades\DB;

class Getdata
{
    public function GetAllCountry()
    {
        $countries = DB::table('countries')->get();
        return $countries;

    }
    public function GetAllTimezone()
    {
        $timezones = DB::table('timezones')->get();
        return $timezones;

    }
    public function GetAllFont()
    {
        $fonts = DB::table('fonts')->get();
        return $fonts;

    }
    public function GetAllLngCode()
    {
        $languages = DB::table('languages')->get();
        return $languages;

    }
}
