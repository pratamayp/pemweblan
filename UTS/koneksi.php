<?php

$host = "localhost";
$user = "root";
$pass = "";
$name = "db_perpustakaan";

$koneksi = mysqli_connect($host,$user,$pass,$name);
 
//memeriksa koneksi, jika gagal akan muncul pesan gagal
if(!$koneksi){
     die ("Koneksi database gagal: ".mysqli_connect_errno().
     " - ".mysqli_connect_error());
     }

?>