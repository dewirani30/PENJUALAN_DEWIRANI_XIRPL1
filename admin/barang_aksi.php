<?php
    include '../koneksi.php';
    $nama= $_POST['nama_barang'];
    $hrgbeli = $_POST['harga_beli'];
    $hrgjual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
     mysqli_query($koneksi, "insert into barang values('', '$nama', '$hrgbeli', '$hrgjual', '$stok')");
    header("location:barang.php");
?>