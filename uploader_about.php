<?php
$mision=$_POST['mision'];
$vision=$_POST['vision'];
$historia=$_POST['historia'];
include "conexion2.php";
$link = mysql_connect($direccion, $usuario, $password);
mysql_select_db($database);
$query="update EMPRESA SET mision='".$mision."' ,vision='".$vision."',historia='".$historia."' where idEMPRESA=1";
echo $query;
$result = mysql_query($query);
mysql_free_result($result);
mysql_close($link);
header("Location:admin_opciones.php?dato=0");
?>