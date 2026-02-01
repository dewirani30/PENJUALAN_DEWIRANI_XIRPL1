<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
<div class="panel">
<div class="panel-heading">
    <h4>Transaksi Penjualan</h4>
</div>
<div class="panel-body">

<form method="POST" action="penjualan_aksi.php">

<table class="table table-bordered">
    <tr>
        <th>Barang</th>
        <th width="20%">Jumlah</th>
    </tr>

    <?php for($i=0;$i<5;$i++){ ?>
    <tr>
        <td>
            <select name="id_barang[]" class="form-control">
                <option value="">-- Pilih Barang --</option>
                <?php
                $barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok > 0");
                while($b=mysqli_fetch_array($barang)){
                ?>
                    <option value="<?= $b['id_barang']; ?>">
                        <?= $b['nama_barang']; ?> (<?= $b['stok']; ?>)
                    </option>
                <?php } ?>
            </select>
        </td>
        <td>
            <input type="number" name="jumlah[]" class="form-control" min="1">
        </td>
    </tr>
    <?php } ?>
</table>

<input type="submit" class="btn btn-primary" value="Simpan Transaksi">

</form>

</div>
</div>
</div>
