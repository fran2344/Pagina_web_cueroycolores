<?
include("lib_carrito.php");
$_SESSION["ocarrito"]->elimina_producto($_GET["linea"]);
header('Location:ver_tabla_carrito.php?dato=1');
?>

<html>
<head>
	<title>Introduce Producto</title>
</head>

<body>

Producto eliminado.
<br>
<br>
<br>
<a href="index.php">- Volver</a>
<br>
<br>
<a href="ver_carrito.php">- Ver carrito</a>

</body>
</html>
