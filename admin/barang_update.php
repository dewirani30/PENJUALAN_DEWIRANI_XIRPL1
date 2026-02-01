<?php
    include '../koneksi.php';

    $id = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $hrgbeli = $_POST['harga_beli'];
    $hrgjual = $_POST['harga_jual'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "update barang set nama_barang='$nama', harga_beli='$hrgbeli', harga_jual='$hrgjual', stok='$stok' where id_barang='$id'");

    echo "<script>alert('Data Telah Diubah'); window.location.href='barang.php'</script>";
?>