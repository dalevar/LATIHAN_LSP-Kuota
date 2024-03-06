<?php
require '../data.php'; //mengambil data dari file data.php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve other form data using $_POST
    $harga_Product = $_POST['harga_Product'];
    $harga_Topping = $_POST['harga_Topping'];
    $product = $kuota[$id]['kuota_judul'];
    $total = $harga_Product + $harga_Topping;

    // Retrieve selected toppings
    $selectedToppings = isset($_POST['topping']) ? $_POST['topping'] : [];

    // Create an array to store topping information
    $toppingDetails = [];

    // Loop through selected toppings and store their details
    foreach ($selectedToppings as $selectedTopping) {
        foreach ($topping as $t) {
            if ($t['harga'] == $selectedTopping) {
                $toppingDetails[] = $t['paket'] . " - " . $t['waktu'] . " - Rp. " . number_format($t['harga'], 0);
                break; // Break the loop once a match is found
            }
        }
    }

    // Concatenate topping details
    $selectedToppings = implode("<br>", $toppingDetails);
}


session_start();
//session start untuk mengecek apakah user telah login, jika belum maka akan dilempat ke halaman login kembali
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
    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <img src="../assets/img/logo.png" class="img-fluid mx-auto" alt="">
                <h1 class="fw-bold my-3" style="color: #0C145A;">Invoice</h1>
                <p class="fw-medium" style="color: #0C145A">Information Purchase Detail</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Product</th>
                                <th scope="col">Harga Product</th>
                                <th scope="col">Topping</th>
                                <th scope="col">Harga Topping</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $product ?></td>
                                <td>Rp.<?= number_format($harga_Product, 0)  ?></td>
                                <td><?= $selectedToppings ?></td>
                                <td>Rp. <?= number_format($harga_Topping, 0) ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4" style="padding-bottom: 2em;">
                        <table class="mb-3">
                            <tbody>
                                <tr>
                                    <td>Nama Product</td>
                                    <td>:</td>
                                    <td><?= $product ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Product</td>
                                    <td>:</td>
                                    <td>Rp.<?= number_format($harga_Product, 0)  ?></td>
                                </tr>
                                <tr>
                                    <td>Topping</td>
                                    <td>:</td>
                                    <td><?= $selectedToppings ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Topping</td>
                                    <td>:</td>
                                    <td>Rp. <?= number_format($harga_Topping, 0) ?></td>
                                </tr>
                                <tr class="fw-bold">
                                    <td>Total Keseluruhan</td>
                                    <td>:</td>
                                    <td>Rp.<?= number_format($total, 0)  ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="success.php" class="btn text-light" style="background-color: #0C145A;">Continue</a>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>