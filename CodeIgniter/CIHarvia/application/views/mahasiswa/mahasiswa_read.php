<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Mahasiswa Read</h2>
        <table class="table">
	    <tr><td>Nim</td><td><?php echo $nim; ?></td></tr>
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Jurusan</td><td><?php echo $jurusan; ?></td></tr>
	    <tr><td>Jk</td><td><?php echo $jk; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Username</td><td><?php echo $username; ?></td></tr>
	    <tr><td>Pw</td><td><?php echo $pw; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mahasiswa') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>