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

$query = "SELECT `title`,`short_description`,`picture` FROM `products` WHERE `id`=:id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $_id);
$result = $stmt->execute();
$products = $stmt->fetch();
if ($products['picture']!=null){
    $_SESSION['picture']=$products['picture'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <section>
        <div class="container text-center pt-5">
            <h1 class="h1">Edit Product</h1>

            <form action="update.php?id=<?=$_id?>" method="post" class="mt-5 text-start mx-auto" style="max-width: 700px;"enctype="multipart/form-data">
                <div class="row g-3 align-items-center justify-content-center mb-3">
                    <div class="col-2">
                        <label for="title" class="col-form-label">Title</label>
                    </div> 
                    <div class="col-10">
                        <input type="text" id="title" name="title" class="form-control w-100" value="<?= $products['title']?>">
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center mb-3">
                    <div class="col-2">
                        <label for="details" class="col-form-label">Details</label>
                    </div>
                    <div class="col-10">
                        <input type="text" id="details" name="details" class="form-control w-100" value="<?= $products['short_description']?>">
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center mb-3">
                    <div class="col-2">
                        <label for="picture" class="col-form-label">Picture</label>
                    </div>

                    <div class="col-10">
                        <input type="file" accept="image/*" id="picture" name="picture" class="form-control-file w-100" value="<?=$products['picture']?>">
                    </div>
                    <img id="imagePre" src="../../uploads/<?=$products['picture']?>" alt="your image" />
                </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        picture.onchange = evt => {
            const [file] = picture.files
            if (file) {
                imagePre.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>