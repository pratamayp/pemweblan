<?php

class Model_anggota
{
    public $nis;
    public $nama;
    public $tp_lahir;
    public $tgl_lahir;
    public $jk;
    public $no_hp;
    public $email;
    public $kelas;
    public $alamat;

    public function add_data($data)
    {
        require('koneksi.php');
        if (isset($_POST['tombol'])) {
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $tp_lahir = $_POST['tp_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jk = $_POST['jk'];
            $no_hp = $_POST['no_hp'];
            $email = $_POST['email'];
            $kelas = $_POST['kelas'];
            $alamat = $_POST['alamat'];

            $sql = "INSERT INTO anggota 
                    VALUES 
                    ('no','$nis','$nama','$tp_lahir','$tgl_lahir','$jk','$no_hp','$email','$kelas','$alamat')";

            $query = mysqli_query($koneksi, $sql);
            if ($query == 1) {
                echo "<script>Swal.fire('Data Berhasil Ditambahkan!')</script>";
            }
             else {
                echo "<script>Swal.fire('Data Gagal Diinput Ke Database')</script>";
                echo mysqli_error($koneksi);
            }
        }
    }

    public function deleteAgt()
    {
        require('koneksi.php');
        $no = $_GET['no'];
        $query = "DELETE FROM anggota WHERE no = '$no'";
        $sql = mysqli_query($koneksi, $query);
        echo "<script>Swal.fire('Data Berhasil Dihapus!')</script>";
        
    }

    public function updatedata($no)
    {
        require('koneksi.php');
        if (isset($_POST['tombol'])) {

            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $tp_lahir = $_POST['tp_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $jk = $_POST['jk'];
            $no_hp = $_POST['no_hp'];
            $email = $_POST['email'];
            $kelas = $_POST['kelas'];
            $alamat = $_POST['alamat'];

            $sql = mysqli_query($koneksi, "UPDATE anggota SET
                                            nis = '$nis',
                                            nama = '$nama',
                                            tp_lahir = '$tp_lahir',
                                            tgl_lahir = '$tgl_lahir',
                                            jk = '$jk',
                                            no_hp = '$no_hp',
                                            email = '$email',
                                            kelas = '$kelas',
                                            alamat = '$alamat'
                                        WHERE no = '$no'");

            if ($sql == 1) {
                echo "<script>Swal.fire('Data Berhasil Diubah!')</script>";
            }
        }
    }
}
echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
