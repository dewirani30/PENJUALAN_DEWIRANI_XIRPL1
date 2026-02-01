<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Barang</h4>
            </div>
            <div class="panel-body">

                <?php
                    include '../koneksi.php';
                    $id = $_GET['id_barang'];
                    $data = mysqli_query($koneksi, "select * from barang where id_barang='$id'");
                    while($d=mysqli_fetch_array($data)){
                ?>

                <form method="POST" action="barang_update.php">
                    <div class="form-group">
                        <input type="hidden" name="id_barang" value="<?php echo $d['id_barang']; ?>">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_barang" placeholder="Masukkan nama.." value="<?php echo $d['nama_barang']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" name="harga_beli" placeholder="Masukkan harga" value="<?php echo $d['harga_beli']; ?>">
                    </div>
                     <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" class="form-control" name="harga_jual" placeholder="Masukkan harga" value="<?php echo $d['harga_jual']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="number" class="form-control" name="stok" placeholder="Masukkan stok" value="<?php echo $d['stok']; ?>">
                    </div>
                    
                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div