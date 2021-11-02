<?php
include_once($_SERVER['DOCUMENT_ROOT']).'/ecomm/config.php';
use App\Utility\Utility;
use App\Utility\Debugger;
Use App\Utility\Sanitizer;
Use App\Utility\Validator;
use App\Product\product;
session_start();

$target = $_FILES['picture']['tmp_name'];
$destination = "../../uploads/".time()."_".$_FILES['picture']['name'];
$is_moved = move_uploaded_file($target, $destination);
echo $_FILES['picture']['name'];
if($is_moved){
    $_picture = time()."_".$_FILES['picture']['name'];
}
else if($_SESSION['picture']!=null){
    echo $_SESSION['picture'];
    $_picture = $_SESSION['picture'];
}else{
    $_picture = null;
}

if(Utility::isPosted()){
    $_title = $_POST['title'];
    $_details = $_POST['details'];
    $_id = $_GET['id'];
    $conn = new PDO("mysql:host=localhost;dbname=ecomm_v1", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "UPDATE `products` SET `title`=:title,`short_description`=:details, `picture`=:picture WHERE `id`=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $_id);
    
    $stmt->bindParam(':title',$_title);
    $stmt->bindParam(':details',$_details);
    $stmt->bindParam(':picture',$_picture);
    $result = $stmt->execute();
    $products = $stmt->fetch();
}
if ($result) {
    $_SESSION['message'] = "Product updated successfully";
}else{
    $_SESSION['message'] = "Product can not update";
}


header("location:index.php");