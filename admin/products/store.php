<?php
include_once($_SERVER['DOCUMENT_ROOT']).'/ecomm/config.php';
use App\Utility\Utility;
use App\Utility\Debugger;
Use App\Utility\Sanitizer;
Use App\Utility\Validator;
use App\Product\product;

if(Utility::isPosted()){
    $_title = $_POST['title'];
    echo $_title;
}