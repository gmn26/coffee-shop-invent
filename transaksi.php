<?php
    include("be/db.php");
    include("be/auth.php");
    checkHasAccess();
    
    $queryDetailBarangMasuk = fetchBarangMasuk();
    $banyakBarangMasuk = getBanyakBarangMasuk($mysqli);
    $queryDetailBarangKeluar = fetchBarangKeluar();
    $banyakBarangKeluar = getBanyakBarangMasuk($mysqli);

    $detailBarangMasuk = mysqli_query($mysqli, $queryDetailBarangMasuk);
    $detailBarangKeluar = mysqli_query($mysqli, $queryDetailBarangKeluar);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi | Coffee Shop Inventaris</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="stok.php">Stok Barang</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="signout.php">Keluar</a>
    </nav>
    <h1>Barang Masuk</h1>
    <!-- <a href="barangmasuk.php">Tambahkan Barang Masuk</a> -->
    <table border="1px">
        <tr>
            <td>Nomor</td>
            <td>Nama Barang</td>
            <td>Jumlah</td>
            <td>Tanggal</td>
        </tr>
        <?php
            if(mysqli_fetch_lengths($detailBarangMasuk) == NULL){
        ?>
                <tr>
                    <td colspan="4">
                        Belum ada barang masuk
                    </td>
                </tr>
        <?php
            }else{
                $i = 1;
                foreach($detailBarangMasuk as $data){
        ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data["nama_barang"]; ?></td>
                        <td><?= $data["jumlah_barang_masuk"]; ?></td>
                        <td><?= $data["tgl_barang_masuk"]; ?></td>
                    </tr>
        <?php
                    $i++;
                }
            }
        ?>  
    </table>
    <h1>Barang Keluar</h1>
    <!-- <a href="barangkeluar.php">Tambahkan Barang Keluar</a> -->
    <table border="1px">
        <tr>
            <td>Nomor</td>
            <td>Nama Barang</td>
            <td>Jumlah</td>
            <td>Tanggal</td>
        </tr>
        <?php
            if(mysqli_fetch_lengths($detailBarangKeluar) == NULL){
        ?>
                <tr>
                    <td colspan="4">
                        Belum ada barang keluar
                    </td>
                </tr>
        <?php
            }else{
                $i = 1;
                foreach($detailBarangKeluar as $data){
        ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data["nama_barang"]; ?></td>
                        <td><?= $data["jumlah_barang_keluar"]; ?></td>
                        <td><?= $data["tgl_barang_keluar"]; ?></td>
                    </tr>
        <?php
                    $i++;
                }
            }
        ?>  
    </table>
</body>
</html>