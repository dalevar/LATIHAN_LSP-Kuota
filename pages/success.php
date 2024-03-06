<?php
require '../data.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kuota Internet</title>
    <link rel="stylesheet" href="asstes/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="padding-top: 8em;">
        <div class="mx-auto text-center">
            <img src="../assets/img/success.png" class="img-fluid mx-auto" alt="">
            <h2 class="fw-bold mt-4" style="color: #0C145A;">Well Done!</h2>
            <p class="fw-medium" style="color: #0C145A;">Kamu sudah bisa melakukan pengisian paket<br>
                dan menjadi pemenang!</p>
            <a href="../index.php" class="btn text-light px-5 py-2" style="background-color: #4D17E2; border-radius: 100px">Home</a>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>