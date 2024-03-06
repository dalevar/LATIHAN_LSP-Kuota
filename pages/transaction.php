<?php
require '../data.php';
$id = $_GET['id']; //$id yang berisi mengambil nilai Id yang dikirim dari product yang dipilih
$counter = 0; //membuat variable counter dengan nilai 0
session_start(); //session start men cek apakah user telah login atau belum
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
                <h1 class="fw-bold my-3" style="color: #0C145A;">Checkout</h1>
                <p class="fw-medium" style="color: #0C145A">Purchase Detail</p>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                        <form method="POST" action="../pages/invoice.php?id=<?= $id ?>">
                            <input type="hidden" name="id" value="<?= $kuota[$id] ?>">
                            <input type="hidden" name="harga_Product" value="<?= $kuota[$id]['harga'] ?>">
                            <input type="hidden" name="harga_Topping" id="harga_Topping" value="0">
                            <div class="mb-4">
                                <label for="username" class="form-label fw-semibold rounded-5" style="color: #0C145A;">Product Name</label>
                                <input type="text" class="form-control" id="product" name="product" value="<?= $kuota[$id]['kuota_judul'] ?>" readonly disabled />
                            </div>
                            <div class="mb-4">
                                <label for="harga" class="form-label fw-semibold" style="color: #0C145A;">Price</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="Rp. <?= number_format($kuota[$id]['harga'], 0) ?>" readonly disabled />
                            </div>
                            <div class="mb-4">
                                <label for="total" class="form-label fw-semibold" style="color: #0C145A;">Total</label>
                                <input type="total" class="form-control" id="total" name="total" value="Rp. <?= number_format($kuota[$id]['harga'], 0)  ?>" readonly disabled />
                            </div>
                            <div class="d-grid col-4">
                                <button type="submit" name="beli" class="btn text-light" style="background-color: #4D17E2;">Beli</button>
                            </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 mt-4">
                        <div class="mb-4">
                            <label for="topping" class="form-label fw-semibold" style="color: #0C145A">Topping</label>
                            <div class="form-check">
                                <?php foreach ($topping as $t) : ?>
                                    <?php $counter++; ?>
                                    <input class="form-check-input" type="checkbox" value="<?= $t['harga'] ?>" id="topping<?= $counter ?>" name="topping[]">
                                    <label class="form-check" for="topping<?= $counter ?>">
                                        <?= $t['paket'] ?> - <?= $t['waktu'] ?> - Rp. <?= number_format($t['harga'], 0) ?>
                                    </label>
                                <?php endforeach; ?>
                                <?php foreach ($topping as $t) : ?>
                                    <input type="hidden" name="selected_toppings[]" id="selected_topping<?= $counter ?>" value="<?= $t['paket'] ?>">
                                <?php endforeach; ?>
                            </div>
                            </form>
                            <img src="../assets/img/<?= $kuota[$id]['img'] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        let topping = document.querySelectorAll('input[name="topping[]"]'); //membuat variable topping dengan selector dari inputan type elemen checkbox di halaman
        let total = document.getElementById('total'); // berdasarkan id 
        let harga = <?= $kuota[$id]['harga'] ?>; // menyimpan data harga diambil langsung dari data.php
        let totalTopping = 0; //menyimpan nilai default
        let productName = document.querySelector('#product').value; //mengambil value dari inputan dengan id product

        topping.forEach((t) => { //foreach dengan nilai (t) untuk melakukan iterasi pada checkbox yang dipilih sebelumnya lalu menambahkan addEventListener
            t.addEventListener('change', function() { //mendeteksi atau melakukan perubahan 
                if (this.checked) { // jika checkbox di centang maka akan melakukan perubahan penambahan harga
                    totalTopping += parseInt(this.value);
                } else { // jika tidak maka akan mengurangi atau tidak menambah apa apa
                    totalTopping -= parseInt(this.value);
                }
                let totalHarga = harga + totalTopping; // menghitung total
                total.value = 'Rp. ' + totalHarga.toLocaleString('id-ID'); //mengubah value pada inputan dengan id total diisi dengan totalHarga yang menghitung total harga keseluruhan
                document.getElementById('harga_Topping').value = totalTopping; //mengubah value pada inputan dengan id harga_Topping diisi dengan totalTopping

                // Update hidden input for selected topping name
                document.getElementById('selected_topping<?= $counter ?>').value = '<?= $t['paket'] ?>';
            });
        });
    </script>

</body>

</html>