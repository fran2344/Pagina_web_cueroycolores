<?php
$info=$_GET['info'];
include "conexion2.php";
$link = mysql_connect($direccion, $usuario, $password);
mysql_select_db($database);
$idcat=$_POST['selCombo'];
$idart=$_POST['articulop'];
$query = "CALL Agregar(".$idart.",".$idcat.")";
$result = mysql_query($query);
mysql_free_result($result);
mysql_close($link);
if($info==1)
{
header("Location:admin_opciones.php");
}else
{
header("Location:addto_categoria.php?dato=".$enlace);
}
?>