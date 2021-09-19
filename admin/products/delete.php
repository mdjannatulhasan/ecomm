<?php
include_once ($_SERVER['DOCUMENT_ROOT']) . '/ecomm/config.php';

use App\Utility\Utility;
use App\Utility\Debugger;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Product\product;
session_start();
$_id = $_GET['id'];
$conn = new PDO("mysql:host=localhost;dbname=ecomm_v1", "root", "");
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "DELETE FROM `products` WHERE `id`=:id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id);
$result = $stmt->execute();
if ($result) {
    $_SESSION['message'] = "Product deleted successfully";
}else{
    $_SESSION['message'] = "Product is not deleted";
}


header("location:index.php");
?>