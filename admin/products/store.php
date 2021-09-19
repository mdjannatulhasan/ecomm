<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']).'/ecomm/config.php';
use App\Utility\Utility;
use App\Utility\Debugger;
Use App\Utility\Sanitizer;
Use App\Utility\Validator;
use App\Product\product;


$target = $_FILES['picture']['tmp_name'];
$destination = "../../uploads/".time()."_".$_FILES['picture']['name'];
$is_moved = move_uploaded_file($target, $destination);

if($is_moved){
    $_picture = time()."_".$_FILES['picture']['name'];
}else{
    $_picture = null;
}

if(Utility::isPosted()){
    $_title = $_POST['title'];
    $_details = $_POST['details'];
    
    $conn = new PDO("mysql:host=localhost;dbname=ecomm_v1", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "INSERT INTO `products` (`title`,`short_description`,`picture`) VALUES (:title, :details, :picture)" ;
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':title',$_title);
    $stmt->bindParam(':details',$_details);
    $stmt->bindParam(':picture',$_picture);
    $result = $stmt->execute();
}
if ($result) {
    $_SESSION['message'] = "Product added successfully";
}else{
    $_SESSION['message'] = "Product not added";
}


header("location:index.php");