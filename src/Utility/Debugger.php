<?php


namespace App\Utility;


class Debugger
{
    public static function debug($anyVariable){
        echo "<pre>";
        var_dump($anyVariable);
        echo "</pre>";
    }

}