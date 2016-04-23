<?php
include "conexion2.php";
$link = mysql_connect($direccion, $usuario, $password);
mysql_select_db($database);
$valor=$_POST['articulop'];
$query = "CALL Borrar_a(".$valor.");";
#echo $query;
$result = mysql_query($query);
mysql_free_result($result);
mysql_close($link);
header("Location:admin_art_del.php?dato=".$valor);
?>