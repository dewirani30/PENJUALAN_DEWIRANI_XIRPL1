<?php
include 'header.php';
include '../koneksi.php';
?>

<div class="container">
<div class="panel">
<div class="panel-heading">
<h4>Tambah Penjualan</h4>
</div>
<div class="panel-body">

<form action="penjualan_aksi.php" method="post">

<table class="table table-bordered">
<tr>
    <th>Barang</th>
    <th>Jumlah</th>
</tr>

<?php 
for($i=0;$i<5;$i++){ 
?>
<tr>
    <td>
        <select name="id_barang[]" class="form-control">
            <option value="">-- Pilih Barang --</option>
            <?php
            $barang = mysqli_query($koneksi,"SELECT * FROM barang WHERE stok > 0");
            while($b=mysqli_fetch_array($barang)){
            ?>
            <option value="<?= $b['id_barang']; ?>">
                <?= $b['nama_barang']; ?> (Stok: <?= $b['stok']; ?>)
            </option>
            <?php } ?>
        </select>
    </td>
    <td>
        <input type="number" name="jumlah[]" class="form-control" min="1">
    </td>
</tr>
<?php 
} 
?>

</table>

<input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
<a href="penjualan.php" class="btn btn-default">Kembali</a>

</form>

</div>
</div>
</div>