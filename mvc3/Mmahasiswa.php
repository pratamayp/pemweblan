<?php
class MMahasiswa
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'tes';
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (mysqli_connect_errno()) {
            echo 'Gagal melakukan koneksi ke Database : ' . mysqli_connect_error();
        } else {
            echo 'Koneksi berhasil ^_^ </br>';
        }
    }

    final public function isiDataDb($nim, $nama, $tahun)
    {
        $sql = "INSERT INTO mahasiswa (nim, nama, tahunlahir)
VALUES ('$nim', '$nama', '$tahun')";

        if (mysqli_query($this->koneksi, $sql)) {
            echo "New record created successfully </br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->koneksi);
        }
    }
    public function listMhsDb()
    {
        $query = "SELECT * FROM mahasiswa";
        $result = mysqli_query($this->koneksi, $query);

        return $result;
    }
    final public function editDataDb($nim, $nama, $tahun)
    {
        $sql = "UPDATE mahasiswa (nim, nama, tahunlahir) SET ('$nim','$nama','$tahun')";
        if (mysqli_query($this->koneksi, $sql)) {
            echo "New Record Updated Successfuly </br>";
        } else {
            echo "Error : " . $sql . "<br>" . mysqli_error($this->koneksi);
        }
    }
    final public function hapusDataDb()
    {
    }

    //end class
}
