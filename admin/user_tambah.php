<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Tambah User Baru</h4>
            </div>
            <div class="panel-body">
                <form method="POST" action="user_aksi.php">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Masukkan password">
                    </div>
                     <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="user_nama" class="form-control" placeholder="Masukkan nama">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="number" name="user_status" class="form-control" placeholder="Masukkan status">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">
                </form>
            </div>
        </div>
    </div>
</div