<?php

namespace App\Utility;


class Sanitizer
{
    public static function sanitize($nonSanitizedData){
        //run some cleaning process based on business need

        $sanitizedData = $nonSanitizedData;
        return $sanitizedData;
    }
}