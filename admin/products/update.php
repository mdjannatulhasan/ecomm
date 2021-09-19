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
    $_id = $_GET['id'];
    $conn = new PDO("mysql:host=localhost;dbname=ecomm_v1", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE `products` SET `title`=:title,`short_description`=:details WHERE `id`=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $_id);
    
    $stmt->bindParam(':title',$_title);
    $stmt->bindParam(':details',$_details);
    $result = $stmt->execute();
    $products = $stmt->fetch();
}