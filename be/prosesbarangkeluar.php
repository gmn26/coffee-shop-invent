<?php
    include("db.php");
    if(isset($_POST["add"])){
        $barang = $_POST["nama_barang"];
        $jumlah_barang_keluar = $_POST["jumlah_barang"];
        $tgl_barang_keluar = $_POST["tgl_barang_keluar"];
        $totalAwal = getStokSatuBarang($mysqli, $barang);
        $totalAwal = $totalAwal["total_barang"];
        $totalBarang = $totalAwal - $jumlah_barang_keluar;
        
        $queryTransaksi = "INSERT INTO tb_barang_keluar(nama_barang, banyak_barang_keluar, tgl_barang_keluar) VALUES ('$barang', '$jumlah_barang_keluar', '$tgl_barang_keluar')";
        $queryUpdateStok = "UPDATE tb_stok_barang SET total = $totalBarang WHERE nama_barang = '$barang'";

        try{
            mysqli_query($mysqli, $queryTransaksi);
            mysqli_query($mysqli, $queryUpdateStok);
            
            if(mysqli_affected_rows($mysqli) > 0){
                echo"
                    <script>
                        alert('Berhasil menambahkan transaksi barang masuk')
                        document.location.href = '../index.php'
                    </script>
                ";
            }
        }catch(Exception $e){
            // echo $e;
            echo"
                <script>
                    alert('Gagal menambahkan transaksi barang masuk')
                    document.location.href = '../barangmasuk.php'
                </script>
            ";
        }
    }else{
        header("Location: ../index.php");
    }
?>