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
            <h1 class="h1">Add New</h1>

            <form action="store.php" method="post" class="mt-5 text-start mx-auto" style="max-width: 700px;" enctype="multipart/form-data">
                <div class="row g-3 align-items-center justify-content-center mb-3">
                    <div class="col-2">
                        <label for="title" class="col-form-label">Title</label>
                    </div>
                    <div class="col-10">
                        <input type="text" id="title" name="title" class="form-control w-100">
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center mb-3">
                    <div class="col-2">
                        <label for="details" class="col-form-label">Details</label>
                    </div>
                    <div class="col-10">
                        <input type="text" id="details" name="details" class="form-control w-100">
                    </div>
                </div>
                <div class="row g-3 align-items-center justify-content-center mb-3">
                    <div class="col-2">
                        <label for="picture" class="col-form-label">Picture</label>
                    </div>

                    <div class="col-10">
                        <input type="file" accept="image/*" id="picture" name="picture" class="form-control-file w-100">
                    </div>
                    <img id="imagePre" src="#" alt="your image" />
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