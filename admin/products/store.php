<?php
include_once($_SERVER['DOCUMENT_ROOT']).'/ecomm/config.php';
use App\Utility\Utility;
use App\Utility\Debugger;
Use App\Utility\Sanitizer;
Use App\Utility\Validator;
use App\Product\product;

if(Utility::isPosted()){
    $_title = $_POST['title'];
    $_details = $_POST['details'];
    
    $conn = new PDO("mysql:host=localhost;dbname=ecomm_v1", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO `products` (`title`,`short_description`) VALUES (:title, :details)" ;
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title',$_title);
    $stmt->bindParam(':details',$_details);
    $result = $stmt->execute();
}