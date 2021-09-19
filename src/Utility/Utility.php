<?php

namespace App\Utility;


class Utility
{
    public static function isPosted(){
        if(strtoupper($_SERVER['REQUEST_METHOD'])== 'POST'){
            return true;
        }
        return false;
    }

}