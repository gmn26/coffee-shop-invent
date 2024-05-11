<?php
    include("db.php");
    if(isset($_POST["add"])){
        $barang = $_POST["nama_barang"];
        $query = "INSERT INTO tb_nama_barang(nama_barang) VALUES ('$barang')";
        $query2 = "INSERT INTO tb_stok_barang(nama_barang, total) VALUES ('$barang', 0)";

        try{
            mysqli_query($mysqli, $query);
            mysqli_query($mysqli, $query2);
            
            if(mysqli_affected_rows($mysqli) > 0){
                echo"
                    <script>
                        alert('Berhasil menambahkan barang baru')
                        document.location.href = '../index.php'
                    </script>
                ";
            }
        }catch(Exception $e){
            echo"
                <script>
                    alert('Gagal menambahkan barang baru, tidak dapat menambahkan barang yang telah ada')
                    document.location.href = '../addbarang.php'
                </script>
            ";
        }

    }else{
        header("Location: ../index.php");
    }
?>