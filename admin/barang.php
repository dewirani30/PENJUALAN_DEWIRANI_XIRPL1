<?php
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Barang</h4>
        </div>
        <div class="panel-body">
            <a href="barang_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br><br>
            <table class="table table-bordered table-striped">
    <tr>
        <th width="1%">No</th>
        <th>Id Barang</th>
        <th>Nama</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th width="15%">OPSI</th>
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

            <td>
                <a href="barang_edit.php?id_barang=<?= $d['id_barang']; ?>" class="btn btn-sm btn-info">Edit</a>
                <a href="barang_hapus.php?id_barang=<?= $d['id_barang']; ?>" 
                   class="btn btn-sm btn-danger" 
                   onclick="return confirm('Hapus data?')">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>

        </div>
    </div>
</div>