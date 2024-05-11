<?php
    include("db.php");
    if(isset($_POST["add"])){
        $barang = $_POST["nama_barang"];
        $jumlah_barang_masuk = $_POST["jumlah_barang"];
        $tgl_barang_masuk = $_POST["tgl_barang_masuk"];
        $query = "INSERT INTO tb_barang_masuk(nama_barang, jumlah_barang_masuk, tgl_barang_masuk) VALUES ('$barang', $jumlah_barang_masuk, '$tgl_barang_masuk')";

        try{
            mysqli_query($mysqli, $query);
            
            if(mysqli_affected_rows($mysqli) > 0){
                echo"
                    <script>
                        alert('Berhasil menambahkan transaksi barang masuk')
                        document.location.href = '../index.php'
                    </script>
                ";
            }
        }catch(Exception $e){
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