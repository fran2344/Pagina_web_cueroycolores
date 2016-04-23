<?php
include "conexion2.php";
$link = @mysql_connect($direccion, $usuario, $password);
mysql_select_db($database);
$query = 'SELECT * FROM EMPRESA where idEMPRESA=1';
$result = mysql_query($query);
$para=mysql_result($result,0, 'correo');
mysql_free_result($result);
mysql_close($link);
$nombre=$_POST['nombre'];
$correo=$_POST['correo'];
$asunto=$_POST['asunto'];
$cuerpo=$_POST['contenido'];
$oculto=$_POST['oculto'];
$cabeceras = "From: ".$correo . "\r\n" .
    "Reply-To: ".$correo . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
if(($asunto=="")||($correo=="")||($correo=="Your Email here")||($asunto=="Your Subject here"))
{
	header('Location:contact.php?dato=2');
}
else
{
	$datox=$_GET['dato'];
	$oculto="Productos Solicitados:..".$oculto;
	$oculto=str_replace(".","\r\n",$oculto);
	$cuerpo="De parte de: ".$correo."\r\n-------------\r\n".$cuerpo."\r\n\n\n".$oculto;
	echo $cuerpo;
	mail($para, $asunto, $cuerpo,$cabeceras);
	if($datox==3)
	{
		header('Location:ver_tabla_carrito.php?dato=2');
	}else
	{
		header('Location:contact.php?dato=1');
	}
	
}
?>