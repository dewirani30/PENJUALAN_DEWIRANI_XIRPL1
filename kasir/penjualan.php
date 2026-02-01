<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Penjualan</h4>
        </div>
        <div class="panel-body">

            <a href="penjualan_tambah.php" class="btn btn-sm btn-info pull-right">
                Transaksi Baru
            </a>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>No</th>
                    <th>ID Jual</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $no = 1;
                $user_id = $_SESSION['user_id'];

                $data = mysqli_query($koneksi,"
                    SELECT penjualan.*, barang.nama_barang, barang.harga_jual
                    FROM penjualan
                    JOIN barang ON penjualan.id_barang = barang.id_barang
                    WHERE penjualan.user_id='$user_id'
                    ORDER BY id_jual DESC
                ");

                while ($d = mysqli_fetch_array($data)) {
                    $jumlah = 0;
                    if ($d['harga_jual'] > 0) {
                        $jumlah = $d['total_harga'] / $d['harga_jual'];
                    }
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['id_jual']; ?></td>
                    <td><?= $d['nama_barang']; ?></td>
                    <td><?= $d['tgl_jual']; ?></td>
                    <td><?= $jumlah; ?></td>
                    <td>Rp. <?= number_format($d['total_harga']); ?></td>
                    <td>
                        <a target="_blank"
                           href="cetak_penjualan.php?id_jual=<?= $d['id_jual']; ?>"
                           class="btn btn-xs btn-warning">
                           Cetak
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>
