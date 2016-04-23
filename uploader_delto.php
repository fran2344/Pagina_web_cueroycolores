<?php
include "conexion2.php";
$link = mysql_connect($direccion, $usuario, $password);
mysql_select_db($database);
$idcat=$_POST['selCombo'];
$idart=$_POST['articulop'];
$query = "CALL Sacar(".$idart.",".$idcat.");";
echo $query;
$result = mysql_query($query);
mysql_free_result($result);
mysql_close($link);
header("Location:delto_categoria.php?dato=".$enlace);
?>