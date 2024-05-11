<?php
    include("be/db.php");
    include("be/auth.php");
    checkHasAccess();

    $listbarang = fetchBarang($mysqli);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk | Coffee Shop Inventaris</title>
</head>
<body>
    <form action="be/prosesbarangmasuk.php" method="POST">
        <h1>
            Barang Masuk
        </h1>
        <label for="Nama Barang">Nama Barang</label>
        <select name="nama_barang">
            <?php
                foreach($listbarang as $data){
            ?>
                    <option value="<?= $data; ?>"><?= $data; ?></option>
            <?php
                }
            ?>
        </select>
        <br>
        <label for="Jumlah Barang">Jumlah Barang Masuk</label>
        <input type="number" name="jumlah_barang" min="0">
        <br>
        <label for="Tanggal Barang Masuk">Tanggal Masuk</label>
        <input type="date" name="tgl_barang_masuk">
        <br>
        <button name="add">Tambah</button>
        <a href="transaksi.php">Kembali</a>
    </form>
</body>
</html>