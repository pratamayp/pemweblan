<?php
require('Controller/CAnggota.php');

$Anggota = new CAnggota();

require ('view/display.php');
require ('view/Header.php');

if(isset($_GET['target']))
{
	if($_GET['target']=='input')
	{
		$Anggota->inputForm(); 
	}
	else if($_GET['target']=='list')
	{
		$Anggota->cetakdata(); 
	}
	else if($_GET['target']=='edit')
	{
		$Anggota->updateForm();
	}
	else if($_GET['target']=='delete')
	{
		$Anggota->deleteForm($_GET['no']);
	}
	else if($_GET['target']=='detail')
	{
		$Anggota->detailData($_GET['no']);
	}

}
else{
	$Anggota->cetakdata();
}
?>
