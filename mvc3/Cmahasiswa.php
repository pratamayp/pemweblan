<?php
require('form.php');
require('MMahasiswa.php');
class CMahasiswa
{
    private $nim; //MINIMAL PROTECTED utk pewarisan
    private $nama;
    private $tahunlahir; //var itu public
    private $umur;
    //di atas tdk perlu ada

    public function __construct($nim = "M31XXXXX", $nama = "anonim", $tahun = 2000)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->tahunlahir = $tahun;
        $this->umur = $this->hitungUmur();
    }

    final public function isiData($nim, $nama, $tahun)
    { //camel case utk nama method
        $this->nim = $nim; //nim harus sama kek var
        $this->nama = $nama;
        $this->tahunlahir = $tahun; //$tahun itu dari parameter
        //this utk pendefinisian objek  
        $this->umur = $this->hitungUmur();
        //
    }

    public function cetakData()
    {
        echo "--------------------------------------</br>";
        echo "NIM Mahasiswa : " . $this->nim . "</br>";
        echo "Nama Mahasiswa : " . $this->nama . "</br>";
        echo "Tahun Lahir : " . $this->tahunlahir . "</br>";
        echo "Umur Sekarang : " . $this->umur . "</br>";
        echo "--------------------------------------</br>";
    }

    //non-void : punya return
    private function hitungUmur()
    {
        // atribut ada tandanya $this
        $hasil = date('Y') - ($this->tahunlahir); //$hasil bukan atribut, krn masuk di lokal
        return $hasil;
    }

    public function inputForm()
    {
        $formMhs = new Form("", "Input Mahasiswa");
        $formMhs->addField("nim", "NIM Mahasiswa");
        $formMhs->addField("nama", "NAMA Mahasiswa");
        $formMhs->addField("tahun", "TAHUN LAHIR");
        if (isset($_POST['tombol'])) {
            $formMhs->getForm(); //imput data
            $this->nim = $formMhs->fields[0]['value'];
            $this->nama = $formMhs->fields[1]['value'];
            $this->tahunlahir = $formMhs->fields[2]['value'];
            $this->umur = $this->hitungUmur();

            $data = $this;
            // require('Vmhs/VCetakMhs.php'); //mengakses viewnya

            $modelmhs = new MMahasiswa();
            $modelmhs->isiDataDb($this->nim, $this->nama, $this->tahunlahir);

            $this->displayView('Vmhs/VCetakMhs.php', $data);
        } else {
            // $formMhs->displayForm(); //tampil form
            $this->displayView('Vmhs/VInputMhs.php', $formMhs->displayForm());
        }
    }
    public function displayView($namaview, $data = '')
    {
        require('Vtemplate/template.php');
    }
    public function cetakListMhs() //boleh di kasih di view
    {
        $modelmhs = new MMahasiswa();
        $row_data = $modelmhs->listMhsDb();
        $no = 1;
        $data = "<table border='1'>
        <tr>	<th>No</th><th>NIM</th><th>Nama</th><th>Tahun Lahir</th>
        </tr>";
        while ($row = mysqli_fetch_object($row_data)) {
            $data .= "<tr>
        <td>$no</td>
        <td>" . $row->nim . "</td> 
        <td>" . $row->nama . "</td>
        <td>" . $row->tahunlahir . "</td>
            </tr>";
            $no++;
        }
        // $row->nim manut dari nama field
        $data .= "</table>";
        include('Vmhs/VlistMhs.php');
    }
    final public function editDataDb()
    {
        $formMhs = new Form("", "Input Mahasiswa");
        $formMhs->addField("nim", "NIM Mahasiswa");
        $formMhs->addField("nama", "NAMA Mahasiswa");
        $formMhs->addField("tahun", "TAHUN LAHIR");
        if (isset($_POST['tombol'])) {
            $formMhs->getForm(); //imput data
            $this->nim = $formMhs->fields[0]['value'];
            $this->nama = $formMhs->fields[1]['value'];
            $this->tahunlahir = $formMhs->fields[2]['value'];
            $this->umur = $this->hitungUmur();

            $data = $this;
            // require('Vmhs/VCetakMhs.php'); //mengakses viewnya

            $modelmhs = new MMahasiswa();
            $modelmhs->editDataDb($this->nim, $this->nama, $this->tahunlahir);

            $this->displayView('Vmhs/VCetakMhs.php', $data);
        } else {
            // $formMhs->displayForm(); //tampil form
            $this->displayView('Vmhs/VInputMhs.php', $formMhs->displayForm());
        }
    }
    //end class
}
