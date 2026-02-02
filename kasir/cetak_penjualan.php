<?php
include '../koneksi.php';
session_start();

$user_id = $_SESSION['user_id'];

// ambil tanggal dari klik cetak struk
$tgl = $_GET['tgl_jual'];

// ambil data kasir
$user = mysqli_fetch_array(
    mysqli_query($koneksi,"SELECT * FROM user WHERE user_id='$user_id'")
);

// ambil semua barang dari transaksi user di tanggal itu
$data = mysqli_query($koneksi,"SELECT penjualan.*, barang.nama_barang, barang.harga_jual FROM penjualan JOIN barang ON penjualan.id_barang = barang.id_barang WHERE penjualan.tgl_jual='$tgl' AND penjualan.user_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Struk Penjualan</title>
<style>
body{
    font-family: monospace;
    font-size: 12px;
}
.struk{
    width: 220px;
    margin: auto;
}
.center{
    text-align: center;
}
.line{
    border-top: 1px dashed #000;
    margin: 5px 0;
}
</style>
</head>

<body onload="window.print()">

<div class="struk">

<div class="center">
<b>Toko Aurora</b><br>
Jl. RAYA KALIGETAS No. 1<br>
====================
</div>

Tanggal : <?= $tgl ?><br>
Kasir   : <?= $user['user_nama']; ?>

<div class="line"></div>

<?php
$total = 0;
while($d = mysqli_fetch_array($data)){
    $qty = $d['total_harga'] / $d['harga_jual']; // hitung jumlah barang
    $total += $d['total_harga'];
?>
<?= $d['nama_barang']; ?><br>
<?= $qty; ?> x <?= number_format($d['harga_jual']); ?>
&nbsp;&nbsp;<?= number_format($d['total_harga']); ?>
<br>
<?php } ?>

<div class="line"></div>

TOTAL : Rp <?= number_format($total); ?>

<div class="line"></div>

<div class="center">
Terima Kasih<br>
Selamat Belanja 😊
</div>

</div>

</body>
</html>