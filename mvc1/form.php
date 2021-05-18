<?php
class Form{
var $fields = array();
var $action;
var $submit = "";
var $jumField=0;

function __construct($action="", $submit="submit"){
$this->action = $action;
$this->submit = $submit;
}

function displayForm(){
echo"<form action='".$this->action."' method='post'>";
echo"<table widht='100%'>";
for($i=0;$i<$this->jumField;$i++)
{
echo"<tr>
	 <td align='right'>".$this->fields[$i]['label']."</td>";
echo"<td><input type='text' name='".$this->fields[$i]['name']."'></td>
     </tr>";
}
echo"<tr><td><input type='submit' name='tombol' 
value='".$this->submit."' ></td></tr>";
echo"</table>";
}

function addField($name,$label){
	$this->fields[$this->jumField]['name']=$name;
	$this->fields[$this->jumField]['label']=$label;
	$this->jumField++;
}

function getForm()
{
	for($i=0;$i<$this->jumField;$i++)
    {
        $this->fields[$i]['value']=$_POST[$this->fields[$i]['name']];
    }
}

function cetakForm()
{
	for($i=0;$i<$this->jumField;$i++)
    {
        echo $this->fields[$i]['label']. " : ".$this->fields[$i]['value']. "<br>";
    }
}

}
?>