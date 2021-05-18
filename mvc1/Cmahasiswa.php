<?php
require ('form.php');

class CMahasiswa {
    var $nim;
    var $nama;
    var $tahunlahir;
    public $umur;

    public function __construct($nim="M3XXXXXX",$nama="anonim",$tahun=0)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->tahunlahir = $tahun;
        $this->umur = $this->hitungUmur();
    }
    final public function isiData($nim,$nama,$tahun)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->tahunlahir = $tahun;
        $this->umur = $this->hitungUmur();
    }
    public function cetakData()
    {
        echo "----------------------------------------"."</br>";
        echo "Nim Mahasiswa ".$this->nim."</br>";
        echo "Nama Mahasiswa ".$this->nama."</br>";
        echo "Tahun Lahir ".$this->tahunlahir."</br>";
        echo "Umur Sekarang  ".$this->umur."</br>";
        echo "----------------------------------------"."</br>";
    }
    public function hitungUmur()
    {
        $hasil=date('Y')-($this->tahunlahir);
        return $hasil;
    }

    public function inputForm()
    {
        $formMhs = new Form("", "Input Mahasiswa");
        $formMhs-> addField("nim","NIM Mahasiswa");
        $formMhs-> addField("nama","Nama Mahasiswa");
        $formMhs-> addField("tahun","Tahun Lahir");
        if(isset($_POST['tombol'])){
            $formMhs->getForm();//input data
            $this->nim = $formMhs->fields[0]['value'];
            $this->nama = $formMhs->fields[1]['value'];
            $this->tahunlahir = $formMhs->fields[2]['value'];
            $this->umur = $this->hitungUmur();
            $data=$this;
            $this->displayView('Vmhs/VcetakMhs.php', $data);
        }else{
            // $formMhs->displayForm();//tampil form
            $this->displayView('Vmhs/VinputMhs.php', $formMhs->displayForm());
        }
        
    }
    
    public function displayView($namaView, $data = ''){
        require($namaView);
    }

} //end class

?>