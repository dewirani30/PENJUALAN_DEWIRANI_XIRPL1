<?php
session_start();
include '../koneksi.php';

if (!isset($_GET['id_jual'])) {
    die('ID Jual tidak ditemukan');
}

$id_jual = $_GET['id_jual'];

$q = mysqli_query($koneksi,"
    SELECT penjualan.*, barang.nama_barang, barang.harga_jual, user.user_nama
    FROM penjualan
    JOIN barang ON penjualan.id_barang = barang.id_barang
    JOIN user ON penjualan.user_id = user.user_id
    WHERE penjualan.id_jual = '$id_jual'
");

$d = mysqli_fetch_assoc($q);

if (!$d) {
    die('Data tidak ditemukan');
}

$jumlah = 0;
if ($d['harga_jual'] > 0) {
    $jumlah = $d['total_harga'] / $d['harga_jual'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Struk Penjualan</title>
    <style>
        body {
            font-family: monospace;
            font-size: 12px;
        }
        .struk {
            width: 280px;
        }
        hr {
            border: 1px dashed #000;
        }
        .right {
            text-align: right;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body onload="window.print()">

<div class="struk">
    <div class="center">
        <strong>TOKO AURORA</strong><br>
        STRUK PENJUALAN<br>
        =====================
    </div>

    Invoice : <?= $d['id_jual']; ?><br>
    Tanggal : <?= $d['tgl_jual']; ?><br>
    Kasir   : <?= $d['user_nama']; ?><br>

    <hr>

    <?= $d['nama_barang']; ?><br>
    <?= $jumlah; ?> x <?= number_format($d['harga_jual']); ?>
    <span class="right" style="float:right;">
        <?= number_format($d['total_harga']); ?>
    </span>

    <hr>

    TOTAL
    <span class="right" style="float:right;">
        <?= number_format($d['total_harga']); ?>
    </span>

    <br><br>
    <div class="center">
        Terima kasih<br>
        Telah berbelanja di Toko Aurora
    </div>
</div>

</body>
</html>
