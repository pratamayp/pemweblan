<?php

class Form{
    var $fields = array();
    var $opsi=array();
    var $radio=array();
    var $check=array();
    var $tanggal=array();
    var $box=array();
    var $pass=array();

    var $action;
    var $submit = "";
    var $jumField=0;
    var $jumOpsi=0;
    var $jumRadio=0;
    var $jumCheck=0;
    var $jumPass=0;
    var $jumBox=0;
    var $jumTanggal=0;

    function __construct($action, $submit){
        $this->action = $action;
        $this->submit = $submit;
    }

    function displayText(){
        echo"<form action='".$this->action."' method='post'>";
        for($i=0;$i<$this->jumField;$i++)
        {
            echo "<label for='".$this->fields[$i]['name']."'>".$this->fields[$i]['label']."</label>";
            echo"<input type='text' name='".$this->fields[$i]['name']."'>";
            echo"<br/>";
        }

        for($i=0;$i<$this->jumPass;$i++)
        {
            echo "<label for='".$this->pass[$i]['name']."'>".$this->pass[$i]['label']."</label>";
            echo"<input type='password' name='".$this->pass[$i]['name']."'>";
            echo"<br/>";
        }

        for($i=0;$i<$this->jumTanggal;$i++)
        {
            echo "<label for='".$this->tanggal[$i]['name']."'>".$this->tanggal[$i]['label']."</label>";
            echo"<input type='date' name='".$this->tanggal[$i]['name']."' min='"."2000-01-01"."' max='"."2025-12-31".">";
            echo"<br/>";
        }

        for($i=0;$i<$this->jumBox;$i++)
        {
            echo "<label for='".$this->box[$i]['name']."'>".$this->box[$i]['label']."</label>";
            echo"<input type='textarea' name='".$this->box[$i]['name']."'>";
            echo"<br/>";
        }

        for($i=0;$i<$this->jumOpsi;$i++)
        {
            echo "<label for='".$this->opsi[$i]['name']."'>".$this->opsi[$i]['label']."</label>";
            echo"<td><select name='".$this->opsi[$i]['name']."' id='".$this->opsi[$i]['name']."'>";
            echo"<option value='".$this->opsi[$i]['value1']."'>".$this->opsi[$i]['value1']."</option>";
            echo"<option value='".$this->opsi[$i]['value2']."'>".$this->opsi[$i]['value2']."</option>";
            echo"</select>";
            echo"<br/>";
        }

        for($i=0;$i<$this->jumRadio;$i++)
        {
            echo "<label for='".$this->radio[$i]['name']."'>".$this->radio[$i]['label']."</label>";
            echo"<input type='radio' name='".$this->radio[$i]['name']."' value='".$this->radio[$i]['label']."'>";
            echo "<label for='".$this->radio[$i]['name']."'>".$this->radio[$i]['label2']."</label>";
            echo"<input type='radio' name='".$this->radio[$i]['name']."' value='".$this->radio[$i]['label2']."'>";
            echo"<br/>";
        }

        for($i=0;$i<$this->jumCheck;$i++)
        {
            echo "<label for='".$this->check[$i]['name']."'>".$this->check[$i]['label']."</label>";
            echo"<input type='checkbox' name='".$this->check[$i]['name']."' value='".$this->check[$i]['label']."'>";
            echo"<br/>";
        }

        echo"<br/><br/>";
        echo"<input type='submit' name='tombol' value='".$this->submit."'>";
        echo"<br/>";
        ?>
        <button type="button" class="btn btn-primary" onclick="document.location='tampil.php'">Database</button>
        
        <?php
        echo"</form>";
    }

    function addField($name,$label){
        $this->fields[$this->jumField]['name']=$name;
        $this->fields[$this->jumField]['label']=$label;
        $this->jumField++;
    }
    function addPass($name,$label){
        $this->pass[$this->jumPass]['name']=$name;
        $this->pass[$this->jumPass]['label']=$label;
        $this->jumPass++;
    }
    function addBox($name,$label){
        $this->box[$this->jumBox]['name']=$name;
        $this->box[$this->jumBox]['label']=$label;
        $this->jumBox++;
    }
    function addOption($name,$label,$opsi1,$opsi2){
        $this->opsi[$this->jumOpsi]['name']=$name;
        $this->opsi[$this->jumOpsi]['label']=$label;
        $this->opsi[$this->jumOpsi]['value1']=$opsi1;
        $this->opsi[$this->jumOpsi]['value2']=$opsi2;
        $this->jumOpsi++;
    }
    function addRadio($name,$label,$label2){
        $this->radio[$this->jumRadio]['name']=$name;
        $this->radio[$this->jumRadio]['label']=$label;
        $this->radio[$this->jumRadio]['label2']=$label2;
        $this->jumRadio++;
    }
    function addCheck($name,$label){
        $this->check[$this->jumCheck]['name']=$name;
        $this->check[$this->jumCheck]['label']=$label;
        $this->jumCheck++;
    }
    function addTanggal($name,$label){
        $this->tanggal[$this->jumTanggal]['name']=$name;
        $this->tanggal[$this->jumTanggal]['label']=$label;
        $this->jumTanggal++;
    }

    function getForm(){
        include('Database.php');
        for($i=0; $i<$this->jumField;$i++){
            $this->fields[$i]['value'] = $_POST[$this->fields[$i]['name']];
        }
        $nim=$this->fields[0]['value'];
        $nama=$this->fields[1]['value'];
        $query="INSERT INTO datamhs (nim, nama) VALUES ('$nim','$nama')";
        $sql=mysqli_query($database,$query);

        for($i=0; $i<$this->jumPass;$i++){
            $this->pass[$i]['value'] = $_POST[$this->pass[$i]['name']];
            $passwd=$this->pass[$i]['value'];
            $query="UPDATE `datamhs` SET `passwd` = '$passwd' WHERE `datamhs`.`nim` = '$nim'";
            $sql=mysqli_query($database,$query);
        }

        for($i=0; $i<$this->jumTanggal;$i++){
            $this->tanggal[$i]['value'] = $_POST[$this->tanggal[$i]['name']];
            $tlahir=$this->tanggal[$i]['value'];
            $query="UPDATE `datamhs` SET `tgl` = '$tlahir' WHERE `datamhs`.`nim` = '$nim'";
            $sql=mysqli_query($database,$query);
        }
        
        for($i=0; $i<$this->jumBox;$i++){
            $this->box[$i]['value'] = $_POST[$this->box[$i]['name']];
            $boxx=$this->box[$i]['value'];
            $query="UPDATE `datamhs` SET `ket` = '$boxx' WHERE `datamhs`.`nim` = '$nim'";
            $sql=mysqli_query($database,$query);
        }

        for($i=0; $i<$this->jumOpsi;$i++){
            $this->opsi[$i]['value'] = $_POST[$this->opsi[$i]['name']];
            $option=$this->opsi[$i]['value'];
            $query="UPDATE `datamhs` SET `prodi` = '$option' WHERE `datamhs`.`nim` = '$nim'";
            $sql=mysqli_query($database,$query);
        }

        for($i=0; $i<$this->jumRadio;$i++){
            $this->radio[$i]['value'] = $_POST[$this->radio[$i]['name']];
            $pilih=$this->radio[$i]['value'];
            $query="UPDATE `datamhs` SET `gender` = '$pilih' WHERE `datamhs`.`nim` = '$nim'";
            $sql=mysqli_query($database,$query);
        }

        for($i=0; $i<$this->jumCheck;$i++){
            $this->check[$i]['value'] = $_POST[$this->check[$i]['name']];
            $warga=$this->check[$i]['value'];
            if(!empty($warga)){
                $negara='WNI';
            }else{
                $negara='WNA';
            }
            $query="UPDATE `datamhs` SET `warga` = '$negara' WHERE `datamhs`.`nim` = '$nim'";
            $sql=mysqli_query($database,$query);
        }
        echo
        "<script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'tampil.php';
        </script>
        ";
    }

    function cetakForm(){
    ?>

    <div class="container-fluid">
        <h1 style="text-align:center;">Daftar Mahasiswa</h1>
        <button type="button" class="btn btn-primary" onclick="document.location='InputMhs.php'">KEMBALI</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Password</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Kewarganegaraan</th>
                </tr>
            </thead>
        <tbody>
        
    <?php
    include('Database.php');
    $no=1;
    $query="SELECT * FROM datamhs";
    $sql=mysqli_query($database,$query);
    foreach ($sql as $row){
        echo "<tr>";
        echo "<th>".$no++."</th>";
        echo "<th>".$row['nim']."</th>";
        echo "<th>".$row['nama']."</th>";
        echo "<th>".$row['passwd']."</th>";
        echo "<th>".$row['tgl']."</th>";
        echo "<th>".$row['ket']."</th>";
        echo "<th>".$row['prodi']."</th>";
        echo "<th>".$row['gender']."</th>";
        echo "<th>".$row['warga']."</th>";
        echo "</tr>";
    }
    ?>
        </tbody>
    </table>
    </div>
    <?php
    }

}//end of class
?>