<?php
    include'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Filter Laporan</h4>            
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <input type="date" name="tgl_dari" class="form-control">
                        </td>
                        <td>
                            <br>
                            <input type="date" name="tgl_sampai" class="form-control">
                        </td>
                        <td>
                            <br>
                            <input type="submit" name="btn btn-primary" value="Filter">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    </div>
    <br>
    <?php
        if (isset($_GET['tgl_dari']) && isset($_GET['tgl_sampai'])) {
            $dari = $_GET['tgl_dari'];
            $sampai = $_GET['tgl_sampai'];
    ?>
        <div class="panel">
            <div class="panel-heading">
                <h4>Data Laporan Toko dari <b><?php echo $dari; ?></b> sampai <b><?php echo $sampai; ?></b></h4>
            </div>
            <div class="panel-body">
                <a target="_blank" href="cetak_print.php?dari=<?php echo $dari; ?>&sampai=<?php echo $sampai; ?>" clas="btn btn-primary"><i class="glyphicon glyphicon-print"></i>Cetak</a> 
                <br>
                <br>
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
                    include '../koneksi.php';
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
                            WHERE DATE(penjualan.tgl_jual) 
                                BETWEEN '$dari' AND '$sampai'
                            ORDER BY penjualan.tgl_jual ASC
                        ");

                        $no = 1;
                    while ($d=mysqli_fetch_array($data)) {

                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>INVOICE-<?php echo $d['id_jual']; ?></td>
                        <td><?php echo $d['nama_barang']; ?></td>
                        <td><?php echo $d['user_nama']; ?></td>
                        <td><?php echo $d['tgl_jual']; ?></td>
                        <td><?php echo $d['total_harga'] / $d['harga_jual']; ?></td>
                        <td><?php echo "Rp." .number_format($d['total_harga']); ?></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            </div>
        </div>
    <?php
        }
    ?>
</div>