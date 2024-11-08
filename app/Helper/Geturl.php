<?php

namespace App\Helper;

class Geturl
{
    public function GetUrlPrefix()
    {
        $prefix = request()->route()->getPrefix();

        $prefixName = preg_replace('/[^A-Za-z0-9. -]/', '', $prefix);

        return $prefixName;

    }

}
