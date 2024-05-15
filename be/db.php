<?php
    $db_host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "coffee_shop_invent";

    // connect to db
    $mysqli = mysqli_connect($db_host, $username, $password, $db_name);

    function fetchBarang($connectDB){
        $query = "SELECT nama_barang FROM tb_nama_barang";
        $result = mysqli_query($connectDB, $query);

        return mysqli_fetch_all($result);
    }

    function getBanyakBarang($connectDB){
        $query = "SELECT COUNT(nama_barang) AS banyak_barang FROM tb_nama_barang";
        $result = mysqli_query($connectDB, $query);

        return mysqli_fetch_array($result);
    }

    function fetchStokBarang(){
        return "SELECT * FROM tb_stok_barang";
    }

    function getTotalStoKBarang($connectDB){
        $query = "SELECT SUM(total) AS total FROM tb_stok_barang";
        $result = mysqli_query($connectDB, $query);

        return mysqli_fetch_array($result);
    }

    function fetchBarangMasuk(){
        return "SELECT * FROM tb_barang_masuk";
    }

    function getBanyakBarangMasuk($connectDB){
        $query = "SELECT COUNT(id_transaksi_masuk) AS banyak_barang_masuk FROM tb_barang_masuk";
        $result = mysqli_query($connectDB, $query);

        return mysqli_fetch_array($result);
    }

    function fetchBarangKeluar(){
        return "SELECT * FROM tb_barang_keluar";
    }

    function getBanyakBarangKeluar($connectDB){
        $query = "SELECT COUNT(id_transaksi_keluar) AS banyak_barang_keluar FROM tb_barang_keluar";
        $result = mysqli_query($connectDB, $query);

        return mysqli_fetch_array($result);
    }

    function getStokSetiapBarang($connectDB){
        $query = "SELECT total AS total FROM tb_stok_barang";
        $result = mysqli_query($connectDB, $query);

        return mysqli_fetch_array($result);
    }

    function getStokSatuBarang($connectDB, $search){
        $query = "SELECT total AS total_barang FROM tb_stok_barang WHERE nama_barang = '$search'";
        $result = mysqli_query($connectDB, $query);

        return mysqli_fetch_array($result);
    }
?>