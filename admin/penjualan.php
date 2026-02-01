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

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>ID Jual</th>
                    <th>Nama Barang</th>
                    <th>Nama Kasir</th>
                    <th>Tanggal Jual</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                </tr>

                <?php
                $no = 1;
                $data = mysqli_query($koneksi,"
                    SELECT 
                        penjualan.id_jual,
                        barang.nama_barang,
                        user.user_nama,
                        penjualan.tgl_jual,
                        barang.harga_jual,
                        penjualan.total_harga
                    FROM penjualan
                    JOIN barang ON penjualan.id_barang = barang.id_barang
                    JOIN user ON penjualan.user_id = user.user_id
                    ORDER BY penjualan.id_jual DESC
                ");

                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['id_jual']; ?></td>
                        <td><?= $d['nama_barang']; ?></td>
                        <td><?= $d['user_nama']; ?></td>
                        <td><?= $d['tgl_jual']; ?></td>
                        <td><?php echo $d['total_harga'] / $d['harga_jual']; ?></td>
                        <td><?= "Rp. " . number_format($d['total_harga']); ?></td>
                    </tr>
                <?php } ?>
            </table>

                <?php
                    $total = mysqli_query($koneksi,"SELECT SUM(total_harga) AS total FROM penjualan");
                    $t = mysqli_fetch_assoc($total);
                ?>
                    <div class="alert alert-success">
                        <b>Total Pendapatan:</b> Rp. <?= number_format($t['total']); ?>
                    </div>


        </div>
    </div>
</div>
