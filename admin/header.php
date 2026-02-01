<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['user_status'] != 1) {
    header("location:../index.php?pesan=belum_login");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Sistem Informasi Penjualan</title>
    <link rel="stylesheet" href="../asset/css/bootstrap.css">
    <script src="../asset/js/jquery.js"></script>
    <script src="../asset/js/bootstrap.js"></script>
</head>
<body style="background:#f0f0f0">

<nav class="navbar navbar-inverse" style="border-radius:0px">
    <div class="container-fluid">

        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">
                Admin
            </a>
        </div>

        <ul class="nav navbar-nav">
            <li>
                <a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
            <li>
                <a href="barang.php"><i class="glyphicon glyphicon-road"></i> Barang</a></li>
            <li>
                <a href="user.php"><i class="glyphicon glyphicon-user"></i> User</a></li>
            <li>
                <a href="penjualan.php"><i class="glyphicon glyphicon-retweet"></i> Penjualan</a></li>
            <li>
                <a href="laporan.php"><i class="glyphicon glyphicon-list-alt"></i> Laporan</a></li>
            <li>
                <a href="../logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
                <p class="navbar-text">
                    Halo, <b><?= $_SESSION['username']; ?></b>
                </p>
            </li>
        </ul>

    </div>
</nav>
