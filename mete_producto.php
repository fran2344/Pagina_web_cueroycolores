<?
include("lib_carrito.php");
$_SESSION["ocarrito"]->introduce_producto($_GET["id"], $_GET["nombre"], $_GET["precio"]);
session_start();
$cat=$_SESSION["catego"];
header("Location:single-page.php?art=".$_GET["id"]."&cat=".$cat."&move=1");
?>

<html>
<head>
	<title>Introduce Producto</title>
</head>

<body>

Producto introducido.
<br>
<br>
<a href="index.php">- Volver</a>
<br>
<br>
<a href="ver_tabla_carrito.php">- Ver carrito</a>

</body>
</html>
