<?php
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Barang</h4>
        </div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
    <tr>
        <th width="1%">No</th>
        <th>Id Barang</th>
        <th>Nama</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
    
    </tr>

    <?php
    include '../koneksi.php';
    $data = mysqli_query($koneksi,"SELECT * FROM barang");
    $no = 1;

    while ($d = mysqli_fetch_array($data)) {

        $nomor = $d['id_barang'];
        $cek = mysqli_query($koneksi,
            "SELECT * FROM penjualan 
             WHERE id_barang='$nomor'"
        );
    ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['id_barang']; ?></td>
            <td><?= $d['nama_barang']; ?></td>
            <td><?= "Rp." . number_format($d['harga_beli']); ?></td>
            <td><?= "Rp." . number_format($d['harga_jual']); ?></td>
            <td><?= $d['stok']; ?></td>

           
        </tr>
    <?php } ?>
</table>

        </div>
    </div>
</div>