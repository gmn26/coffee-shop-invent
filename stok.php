<?php
    include("be/db.php");
    include("be/auth.php");
    checkHasAccess();
    
    $queryStokBarang = fetchStokBarang();
    $stokBarang = mysqli_query($mysqli, $queryStokBarang);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang | Coffee Shop Inventaris</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav>
        <a href="index.php">Dashboard</a>
        <a href="stok.php">Stok Barang</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="signout.php">Keluar</a>
    </nav>
    <h1>Stok Barang</h1>
    <a href="barangmasuk.php">Tambahkan Barang Masuk</a>
    <table border="1px">
        <tr>
            <td>Nomor</td>
            <td>Nama Barang</td>
            <td>Total</td>
            <td>Aksi</td>
        </tr>
        <?php
            if(mysqli_affected_rows($mysqli) == 0){
        ?>
                <tr>
                    <td colspan="4">
                        Belum ada barang yang terdaftar
                    </td>
                </tr>
        <?php
            }else{
                $i = 1;
                while($data = mysqli_fetch_array($stokBarang)){
        ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $data["nama_barang"]; ?></td>
                        <td><?= $data["total"]; ?></td>
                        <td>
                            <a href="barangmasuk.php?barang=<?= $data["nama_barang"]; ?>">Masuk</a>
                            |
                            <a href="barangkeluar.php?barang=<?= $data["nama_barang"]; ?>">Keluar</a>
                        </td>
                    </tr>
        <?php
                    $i++;
                }
            }
        ?>
    </table>
</body>
</html>