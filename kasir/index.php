<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">

    <div class="alert alert-info text-center">
        <h4 style="margin-bottom:0px;">
            <b>Selamat Datang!</b> Sistem Informasi Penjualan
        </h4>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h4>Dashboard</h4>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-barcode"></i>
                                <span class="pull-right">
                                    <?php
                                    $barang = mysqli_query($koneksi,"SELECT * FROM barang");
                                    echo mysqli_num_rows($barang);
                                    ?>
                                </span>
                            </h1>
                            Jumlah Barang
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-inbox"></i>
                                <span class="pull-right">
                                    <?php
                                    $stok = mysqli_query($koneksi,"SELECT SUM(stok) AS total_stok FROM barang");
                                    echo mysqli_fetch_assoc($stok)['total_stok'];
                                    ?>
                                </span>
                            </h1>
                            Total Stok Barang
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <span class="pull-right">
                                    <?php
                                    $jual = mysqli_query($koneksi,"SELECT * FROM penjualan");
                                    echo mysqli_num_rows($jual);
                                    ?>
                                </span>
                            </h1>
                            Total Transaksi
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1>
                                <i class="glyphicon glyphicon-usd"></i>
                                <span class="pull-right">
                                    <?php
                                    $pendapatan = mysqli_query($koneksi,"SELECT SUM(total_harga) AS total FROM penjualan");
                                    echo number_format(mysqli_fetch_assoc($pendapatan)['total']);
                                    ?>
                                </span>
                            </h1>
                            Total Pendapatan
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="panel panel-default">
    <div class="panel-heading">
        <h4>Riwayat Transaksi</h4>
    </div>
    <div class="panel-body">

       <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>ID Penjualan</th>
                    <th>Tanggal</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Kasir</th>
                </tr>

                <?php

                    $data = mysqli_query($koneksi, "
                        SELECT penjualan.*, 
                            barang.nama_barang, 
                            barang.harga_jual,
                            user.user_nama 
                        FROM penjualan
                        JOIN barang ON penjualan.id_barang = barang.id_barang
                        JOIN user ON penjualan.user_id = user.user_id
                        ORDER BY id_jual DESC
                        LIMIT 10

                    ");

                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['id_jual']; ?></td>
                    <td><?php echo $d['tgl_jual']; ?></td>
                    <td><?php echo $d['nama_barang']; ?></td>
                    <td><?php echo $d['total_harga'] / $d['harga_jual']; ?></td>
                    <td><?php echo "Rp " . number_format($d['total_harga']); ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                </tr>
            <?php }?>
       </table>

    </div>
</div>


</div>

</body>
</html>