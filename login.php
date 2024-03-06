<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Kuota</title>
    <link rel="stylesheet" href="asstes/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card-title text-left">
                    <img src="assets/img/logo.png" class="img-fluid mx-auto" alt="">
                    <h1 class="fw-bold my-3" style="color: #0C145A;">Login</h1>
                    <p class="fw-medium" style="color: #0C145A">Masuk untuk melakukan proses top up</p>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="mb-4">
                            <label for="username" class="form-label fw-semibold rounded-5" style="color: #0C145A;">Username/Email</label>
                            <input type="text" class="form-control" id="username" name="username" />
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold" style="color: #0C145A;">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="login" class="btn text-light" style="background-color: #4D17E2;">Continue</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<?php
$validUsername = "userlsp"; // Ganti dengan username yang diinginkan
$validPassword = "smkisfi"; // Ganti dengan password yang diinginkan

// Cek apakah form sudah di-submit dengan menclick tombol submit atau belum
if (isset($_POST['login'])) {
    //menyimpan variable yang mengambil data inputan yang diisi
    $username = $_POST['username'];
    $password = $_POST['password'];

    // cek apakah username sama atau sesuai dengan valid username
    if ($username == $validUsername && $password == $validPassword) {
        //jika benar maka mengirimkan session kedalam page index
        session_start();
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        //jika salah maka akan menampilkan alert dari script js
        echo "<script>alert('Username atau Password Salah!')</script>";
    }
}
?>