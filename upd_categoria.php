<?php
include "conexion2.php";
$link = mysql_connect($direccion, $usuario, $password);
mysql_select_db($database);
$target_path = "images/";
$nombre=$_POST['nombre'];
$imagen=$_FILES['uploadedfile']['name'];
$idc=$_POST['articulop'];
if($imagen==="")
{
	$imagen=$_POST['imagine'];
	$query = "CALL Update_c('".$imagen."','".$nombre."',".$idc.")";
	echo $query;
	$result = mysql_query($query);
}else
{
	$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
	{
		echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
	    chmod($target_path, 0777);
	    $query = "CALL Update_c('".$target_path."','".$nombre."',".$idc.")";
	    echo $query;
	    $result = mysql_query($query);
	}
	else
	{
		header('Location:admin_cat_upd.php?dato=2');
	}
}
	mysql_free_result($result);
	mysql_close($link);
	header("Location:admin_cat_upd.php?dato=".$nombre);
?>