<?php
$user=$_POST['user'];
$pass=$_POST['pass'];
if(($user==='admin')&&($pass==='admincc'))
{
	session_start();
	$_SESSION["usuario"]=1;
	header('Location:admin_opciones.php?dato=0');

}else
{
	header('Location:admin.php?dato=1');
}

?>