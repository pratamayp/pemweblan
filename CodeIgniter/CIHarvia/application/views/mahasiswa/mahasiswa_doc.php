<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Mahasiswa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nim</th>
		<th>Nama</th>
		<th>Jurusan</th>
		<th>Jk</th>
		<th>Alamat</th>
		<th>Username</th>
		<th>Pw</th>
		
            </tr><?php
            foreach ($mahasiswa_data as $mahasiswa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mahasiswa->nim ?></td>
		      <td><?php echo $mahasiswa->nama ?></td>
		      <td><?php echo $mahasiswa->jurusan ?></td>
		      <td><?php echo $mahasiswa->jk ?></td>
		      <td><?php echo $mahasiswa->alamat ?></td>
		      <td><?php echo $mahasiswa->username ?></td>
		      <td><?php echo $mahasiswa->pw ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>