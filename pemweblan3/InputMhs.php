<?php
require('Form.php');
$formMhs=new Form('','Input Data');

$formMhs->addField('nim','NIM ');
$formMhs->addField('name','Nama ');
$formMhs->addPass('pw','Password ');
$formMhs->addTanggal('tanggal','Tanggal Lahir ');
$formMhs->addOption('prodi','Prodi ','D3TI','Informatika ');
$formMhs->addRadio('gender','L','P');
$formMhs->addCheck('warga','WNI');
$formMhs->addBox('ket','<br>Keterangan ');

$formMhs->displayText(); 

if(isset($_POST['tombol'])){
    $formMhs->getForm();
}
   
?>
