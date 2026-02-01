<?php
    include '../koneksi.php';
    $id = $_POST['id'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $nama = $_POST['user_nama'];
    $status = $_POST['user_status'];

    mysqli_query($koneksi, "update user set username='$username', password='$pass', user_nama='$nama', user_status='$status' where user_id='$id'");

    echo "<script>alert('Data Telah Diubah'); window.location.href='user.php'</script>";
?>