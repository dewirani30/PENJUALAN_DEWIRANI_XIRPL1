<?php
    include '../koneksi.php';
    $username= $_POST['username'];
    $pass = $_POST['password'];
    $nama = $_POST['user_nama'];
    $status = $_POST['user_status'];
    mysqli_query($koneksi, "insert into user values('', '$username','$pass', '$nama', '$status')");
    header("location:user.php");
?>