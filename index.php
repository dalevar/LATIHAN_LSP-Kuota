<?php
require 'data.php'; //mengambil data dari file data.php

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
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Paket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Rewards</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Discover</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Global Rank</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="logout.php" class="btn text-light" style="background-color: #4D17E2;">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div style="padding-top: 8em;">
                        <p style="color: #7E8CAC;">Halo, Guys</p>
                        <h1 class="fw-bold" style="color: #0C145A;">Kartu Internet dengan<br>
                            Sinyal Terbaik</h1>
                        <p class="fw-medium" style="color: #0C145A;">Nikmati berbagai macam paket internet yang kami tawarkan</p>
                        <a href="#" class="btn text-light" style="background-color: #4D17E2;">Lihat Paket</a>
                        <a href="" class="mx-2">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- / Hero Section -->

    <!-- Paket Section -->
    <section class="paket" style="padding-top: 8em">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="fw-bold" style="color: #0C145A;">Paket Internet</h1>
                    <p class="fw-medium" style="color: #0C145A;">Pilih paket internet yang sesuai dengan kebutuhanmu</p>
                </div>
            </div>
            <div class="row">
                <!-- Menggunakna perulangan foreach untuk menampilkan data dari data.php lalu mengambil nilai dengan $value, dan $k adalah index dari array yang dianggap id -->
                <?php foreach ($kuota as $k => $value) : ?>
                    <div class="col-lg-4 g-2">
                        <div class="card" style="width: 18rem; background-color: #F9FAFF;">
                            <img src="assets/img/<?= $value['img'] ?>" class="card-img-top w-50 mx-auto mt-2" height="120" alt="Paket Gambar">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['kuota_judul'] ?></h5>
                                <p class="card-text fw-bold" style="font-size: 32px;"><?= $value['total_gb'] ?> |<small class="fw-light" style="font-size: 18px"><?= $value['masa_aktif'] ?></small></p>
                                <p class="card-text">Rp. <?= number_format($value['harga'], 0) ?></p>
                                <a href="pages/transaction.php?id=<?= $k ?>" class="btn text-light" style="background-color: #4D17E2;">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- /Paket Section -->

    <!-- Footer Section -->
    <section class="footer" style="padding-top: 6em;">
        <div class="container">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
                <div class="col-4 col-lg-4 mb-3">
                    <img src="assets/img/logo.png" class="img-fluid mb-3" alt="">
                    <p class="fw-light" style="color: #0C145A;">membantu anda untuk menjadi pemenang sejati</p>
                    <p class="fw-light" style="color: #0C145A;">Copyright 2021. All Rights Reserved. </p>
                </div>

                <div class="col mb-3">
                    <h5>Company</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About Us</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Press Release</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Terms of Use</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Privacy & Policy</a></li>
                    </ul>
                </div>

                <div class="col mb-3">
                    <h5>Support</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Refund Policy</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Unlock Rewards</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Live Chatting</a></li>
                    </ul>
                </div>

                <div class="col mb-3">
                    <h5>Contact</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">hi@store.gg</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">team@store.gg</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pasific 12, Jakarta Selatan</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">021 - 1122 - 9090</a></li>
                    </ul>
                </div>
            </footer>
        </div>

    </section>
    <!-- / Footer Section -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>