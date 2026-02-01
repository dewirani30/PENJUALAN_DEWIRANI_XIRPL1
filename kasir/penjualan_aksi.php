<?php
session_start();
include '../koneksi.php';

$user_id = $_SESSION['user_id'];
$tgl     = date('Y-m-d');

$id_barang = $_POST['id_barang'];
$jumlah    = $_POST['jumlah'];    

for ($i = 0; $i < count($id_barang); $i++) {

    if (empty($id_barang[$i]) || empty($jumlah[$i])) {
        continue;
    }

    $q = mysqli_query($koneksi,
        "SELECT * FROM barang WHERE id_barang='".$id_barang[$i]."'"
    );
    $b = mysqli_fetch_assoc($q);

    if (!$b) {
        continue;
    }

    $harga = (int)$b['harga_jual'];
    $stok  = (int)$b['stok'];
    $jml   = (int)$jumlah[$i];

    if ($jml > $stok) {
        echo "<script>
            alert('Stok {$b['nama_barang']} tidak mencukupi');
            history.back();
        </script>";
        exit;
    }

    $total = $harga * $jml;

    mysqli_query($koneksi,"
        INSERT INTO penjualan 
        (id_barang, tgl_jual, total_harga, user_id)
        VALUES 
        ('".$id_barang[$i]."', '$tgl', '$total', '$user_id')
    ");

    $sisa = $stok - $jml;
    mysqli_query($koneksi,"
        UPDATE barang SET stok='$sisa'
        WHERE id_barang='".$id_barang[$i]."'
    ");
}

echo "<script>
    alert('Transaksi berhasil');
    window.location='penjualan.php';
</script>";
