<?php
    session_start();

    include 'koneksi.php';
    $username = $_POST['username'];
    $password = ($_POST['password']);

    $data = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");

    $cek = mysqli_num_rows($data);

    if ($cek > 0) {
        $d = mysqli_fetch_assoc($data);
        $_SESSION['username'] = $username;
        $_SESSION['user_status'] = $d['user_status'];
        $_SESSION['user_id'] = $d['user_id'];



        if ($d['user_status'] == 1){
            header("location: admin/index.php");}
        else if ($d['user_status'] == 2) {
            header("location:kasir/index.php");
        }
        else {
            header("location:index.php?pesan=akses_ditolak");
        }
    } else {
        header("location:index.php?pesan=gagal");
    }
?>