<?php
require '../data.php'; //mengambil data dari file data.php
if (isset($_POST['beli'])) { //mengecek apakah form sudah di submit
    $id = $_GET['id']; //mengambil nilai id yang dikirim dari product yang dipilih
    $product = $_POST['product']; //mengambil nilai product yang dikirim dari product yang dipilih
    $harga = $_POST['harga']; //mengambil nilai harga yang dikirim dari product yang dipilih
    $total = $_POST['total']; //mengambil nilai total yang dikirim dari product yang dipilih
    $topping = $_POST['topping']; //mengambil nilai topping yang dikirim dari product yang dipilih
    $harga_topping = $_POST['harga_topping']; //mengambil nilai harga_topping yang dikirim dari product yang dipilih
    $total_harga = $_POST['total_harga']; //mengambil nilai total_harga yang dikirim dari product yang dipilih
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
                                <th scope="col" width="12%">Nomor Product</th>
                                <th scope="col">Nama Product</th>
                                <th scope="col">Harga Product</th>
                                <th scope="col">Topping</th>
                                <th scope="col">Harga Topping</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                        <table>
                            <tbody>
                                <tr>
                                    <td>Nama Product</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Harga Product</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Topping</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Harga Topping</td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td>Total Keseluruhan</td>
                                    <td>:</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>