<?php
include_once ($_SERVER['DOCUMENT_ROOT']) . '/ecomm/config.php';

use App\Utility\Utility;
use App\Utility\Debugger;
use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Product\product;

$conn = new PDO("mysql:host=localhost;dbname=ecomm_v1", "root", "");
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT `id`,`title`,`short_description` FROM `products`";
$stmt = $conn->prepare($query);
$result = $stmt->execute();
$products = $stmt->fetchAll();

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
            <h1 class="h1">Products</h1>
            <div class="mx-auto" style="max-width: 700px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($products as $product) :
                        ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><?= $product['title'] ?></td>
                                <td> <a href="show.php?id=<?= $product['id'] ?>"> Show </a> | <a href="edit.php?id=<?= $product['id'] ?>"> Edit </a> | <a href="delete.php?id=<?= $product['id'] ?>"> Delete </a></td>
                            </tr>
                        <?php
                        endforeach
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>