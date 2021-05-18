<?php

require_once('Model/Model_anggota.php');
require_once('Template/form.php');
require ('view/display.php');

class CAnggota
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

    public function inputForm(){

        echo "<div class='section-title'><center class='form'>";
        $formAnggota = new Form("", "Tambah Anggota");
        $formAnggota->addField("nis", "NIS Siswa");
        $formAnggota->addField("nama", "Nama Siswa");
        $formAnggota->addField("tp_lahir", "Tempat Lahir");
        $formAnggota->addDate("tgl_lahir", "Tamggal Lahir");

        $formAnggota->addRadio("jk", "Jenis Kelamin", "radio", array(
            array("indeks" => 0, "value" => "&nbsp; Laki-Laki"),
            array("indeks" => 1, "value" => "&nbsp; Perempuan")
        ));

        $formAnggota->addField("no_hp", "No. HP");
        $formAnggota->addField("email", "Email");

        $formAnggota->addSelect(
            "kelas",
            "Kelas",
            "select",
            array(
                array('indeks' => ' ', 'value' => ' '),
                array('indeks' => 'MIPA', 'value' => 'MIPA'),
                array('indeks' => 'Sosial', 'value' => 'Sosial'),
                array('indeks' => 'Bahasa', 'value' => 'Bahasa')
            ),
            array('indeks' => 'selected')
        );

        $formAnggota->addField("alamat", "Alamat");

        if (isset($_POST['tombol'])) {
            $formAnggota->getForm();
            $data['nis'] = $_POST['nis'];
            $data['nama'] = $_POST['nama'];
            $data['tp_lahir'] = $_POST['tp_lahir'];
            $data['tgl_lahir'] = $_POST['tgl_lahir'];
            $data['jk'] = $_POST['jk'];
            $data['no_hp'] = $_POST['no_hp'];
            $data['email'] = $_POST['email'];
            $data['kelas'] = $_POST['kelas'];
            $data['alamat'] = $_POST['alamat'];
            
            $Model_anggota = new Model_anggota();
            $Model_anggota->add_data($data);

            $this->cetakdata();

            echo "</center></div>";
        } else {
            $data = $formAnggota->displayForm();

            require('view/Anggota_input.php');
            
        }
    }

    public function updateForm()
    {
        require('koneksi.php');
        require('view/display.php');

        $no = $_GET['no'];
        $result = mysqli_query($koneksi, "SELECT * FROM anggota WHERE no='$no'");
        while ($res = mysqli_fetch_array($result)) :

            echo "<div class='section-title'><center class='form'>";
            $formAnggota = new Form("", "Update Data");
            $formAnggota->addField("nis", "NIS Siswa", "text", $res['nis']);
            $formAnggota->addField("nama", "Nama Siswa", "text", $res['nama']);
            $formAnggota->addField("tp_lahir", "Tempat Lahir", "text", $res['tp_lahir']);
            $formAnggota->addDate("tgl_lahir", "Tamggal Lahir", "date", $res['tgl_lahir']);

            $formAnggota->addRadio("jk", "Jenis Kelamin", "radio", array(
                array("indeks" => 0, "value" => "&nbsp;Laki-Laki"),
                array("indeks" => 1, "value" => "&nbsp;Perempuan")),
                array(array($res['jk'] => 'selected'))
            );

            $formAnggota->addField("no_hp", "No. HP", "text", $res['no_hp']);
            $formAnggota->addField("email", "Email", "text", $res['email']);

            $formAnggota->addSelect(
                "kelas",
                "Kelas",
                "select",
                array(
                    array('indeks' => ' ', 'value' => ' '),
                    array('indeks' => 'MIPA', 'value' => 'MIPA'),
                    array('indeks' => 'Sosial', 'value' => 'Sosial'),
                    array('indeks' => 'Bahasa', 'value' => 'Bahasa')),
                    array(array($res['kelas'] => 'selected'))
                
            );

            $formAnggota->addField("alamat", "Alamat", "text", $res['alamat']);

        endwhile;

        if (isset($_POST['tombol'])) {
            $formAnggota->getForm();

            $data['nis'] = $_POST['nis'];
            $data['nama'] = $_POST['nama'];
            $data['tp_lahir'] = $_POST['tp_lahir'];
            $data['tgl_lahir'] = $_POST['tgl_lahir'];
            $data['jk'] = $_POST['jk'];
            $data['no_hp'] = $_POST['no_hp'];
            $data['email'] = $_POST['email'];
            $data['kelas'] = $_POST['kelas'];
            $data['alamat'] = $_POST['alamat'];

            $Model_anggota = new Model_anggota();
            $Model_anggota->updatedata($no);

            $this->cetakdata();
            echo "</div>";
        } else {
            $data = $formAnggota->displayForm();

            require('view/Anggota_edit.php');
            
        }
    }

    public function cetakdata()
    {
        require('koneksi.php');
        require('view/display.php');

        $Model_anggota = new Model_anggota();

        $data =
            "
            <div class='section-title'><center class='form'><div class='wrapper'>
            <h2>Data Anggota Perpustakaan</h2>
    
            <table class ='table table table-striped '>
                <tr>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Email</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th><center>Aksi</center></th>
                </tr>
        ";

        $sql = mysqli_query($koneksi,"SELECT * from anggota ORDER BY NO ASC");
        while ($z = mysqli_fetch_array($sql)) {
            $data .= "<tr>";
            $data .= "<td>" . $z['nis'] . "</td>";
            $data .= "<td>" . $z['nama'] . "</td>";
            $data .= "<td>" . $z['tp_lahir'] . "</td>";
            $data .= "<td>" . date('d-m-Y', strtotime($z["tgl_lahir"])) . "</td>";
            $data .= "<td>" . $z['jk'] . "</td>";
            $data .= "<td>" . $z['no_hp'] . "</td>";
            $data .= "<td>" . $z['email'] . "</td>";
            $data .= "<td>" . $z['kelas'] . "</td>";
            $data .= "<td>" . $z['alamat'] . "</td>";

            $data .= "<td>
                        <a href='anggota.php?target=detail&no=" . $z['no'] . "' class='btn-sm btn-secondary'>Detail</a>	
						<a href='anggota.php?target=edit&no=" . $z['no'] . "' class='btn-sm btn-primary'>Edit</a></button>
						<a href='anggota.php?target=delete&no=" . $z['no'] . "' class='btn-sm btn-danger'>Delete</a>
					</td>";

            $data .= "</tr>";
        }
        $data.="</div></center></div>"; 

        require('view/Anggota_detail.php');
    }

    function deleteForm($no)
    {
        $deleteAgt = new Model_anggota();
        $deleteAgt->deleteAgt($no);
        $this->cetakdata();
    }

    function detailData($no)
    {
        require('koneksi.php');
        require('view/display.php');

        $sql = mysqli_query($koneksi,"SELECT * from anggota WHERE no='$no'");
        $result = mysqli_fetch_assoc($sql);
        $data =
            "
            <div class='section-title'>
                <div class='detail'>
                <div class='detail-wrap'>
                    <h2>Detail Anggota</h2>
            ";
        $data.="<h4>NIS : ".$result['nis']."</h4>";
        $data.="<h4>Nama : ".$result['nama']."</h4>";
        $data.="<h4>Tempat Lahir : ".$result['tp_lahir']."</h4>";   
        $data.="<h4>Tanggal Lahir : ".date('d-m-Y', strtotime($result["tgl_lahir"]))."</h4>";
        $data.="<h4>Jenis Kelamin : ".$result['jk']."</h4>"; 
        $data.="<h4>No. HP : ".$result['no_hp']."</h4>"; 
        $data.="<h4>Email : ".$result['email']."</h4>"; 
        $data.="<h4>Kelas : ".$result['kelas']."</h4>"; 
        $data.="<h4>Alamat : ".$result['alamat']."</h4>"; 
        $data.="<a href='anggota.php?target=list' class='btn btn-warning'>KEMBALI</a></div></div></div>";

        
        require('view/Anggota_detail.php');
    }

}
?>