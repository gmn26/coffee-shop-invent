<?php
    include("be/db.php");
    include("be/auth.php");
    checkHasAccess();

    $banyakBarang = getBanyakBarang($mysqli);
    $banyakBarangMasuk = getBanyakBarangMasuk($mysqli);
    $banyakStokBarang = getTotalStoKBarang($mysqli);
    if(isset($banyakStokBarang) && $banyakStokBarang["total"] == NULL){
        $banyakStokBarang["total"] = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Coffee Shop Inventaris</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="stok.php">Stok Barang</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="signout.php">Keluar</a>
    </nav>
    <h1>Welcome, Admin!</h1>
    <div style="display: flex; gap: 16px;">
        <div class="counter-info">
            <h1>
                <?= $banyakBarang["banyak_barang"]; ?>
            </h1>
            <h3>
                Banyak Jenis Barang
            </h3>
            <a href="addbarang.php">
                Tambah Barang Baru
            </a>
        </div>
        <div class="counter-info">
            <h1>
                <?= $banyakBarangMasuk["banyak_barang_masuk"]; ?>
            </h1>
            <h3>
                Banyak Barang Masuk
            </h3>
        </div>
        <div class="counter-info">
            <h1>
                <?= $banyakStokBarang["total"]; ?>
            </h1>
            <h3>
                Total Stok Seluruh Barang
            </h3>
        </div>
    </div>
</body>
</html>