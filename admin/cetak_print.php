<?php
session_start();
include '../koneksi.php';

if (!isset($_GET['dari']) || !isset($_GET['sampai'])) {
    die('Tanggal tidak valid');
}

$dari   = $_GET['dari'];
$sampai = $_GET['sampai'];

$data = mysqli_query($koneksi,"
    SELECT 
        penjualan.id_jual,
        penjualan.tgl_jual,
        barang.nama_barang,
        user.user_nama,
        barang.harga_jual,
        penjualan.total_harga
    FROM penjualan
    JOIN barang ON penjualan.id_barang = barang.id_barang
    JOIN user ON penjualan.user_id = user.user_id
    WHERE penjualan.tgl_jual BETWEEN '$dari' AND '$sampai'
    ORDER BY penjualan.tgl_jual ASC
");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
</head>
<body onload="window.print()">

<h3 align="center">LAPORAN PENJUALAN</h3>
<p>Periode: <?= $dari ?> s/d <?= $sampai ?></p>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Barang</th>
    <th>Kasir</th>
    <th>Jumlah</th>
    <th>Total</th>
</tr>

<?php
$no = 1;
$grand = 0;

while ($d = mysqli_fetch_assoc($data)) {
    $qty = ($d['harga_jual'] > 0)
        ? $d['total_harga'] / $d['harga_jual']
        : 0;

    $grand += $d['total_harga'];
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['tgl_jual'] ?></td>
    <td><?= $d['nama_barang'] ?></td>
    <td><?= $d['user_nama'] ?></td>
    <td><?= $qty ?></td>
    <td>Rp <?= number_format($d['total_harga']) ?></td>
</tr>
<?php } ?>

<tr>
    <th colspan="5">TOTAL</th>
    <th>Rp <?= number_format($grand) ?></th>
</tr>
</table>

</body>
</html>
