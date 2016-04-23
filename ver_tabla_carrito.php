<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Carrito | Cuero & Colores</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">

		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <link href='http://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>


</head><!--/head-->

		<?php
			include "lib_carrito.php";
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			@mysql_select_db($database);
			session_start();

			$query = 'select * from EMPRESA WHERE idEMPRESA=1';
			$result2 = mysql_query($query);
			$valor2=mysql_result($result2,0,'descripcion');
			$historia1=mysql_result($result2,0,'historia');
			$valor=mysql_result($result2,0, 'logo');
			$mensaje=mysql_result($result2,0, 'mensaje');

		?>



<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">

						</div>
					</div>
					<div class="col-sm-6">

					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src=<?php echo $valor; ?> title="CC" width='150' height='150' /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="ver_tabla_carrito.php">Carrito</a></li>
								<li><a href="index.php">Inicio</a></li>
								<li><a href="paginacion_cat.php">Colección</a></li> 
								<li><a href="about.php">Nosotros</a></li> 
								<li><a href="contact.php">Contáctenos</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Articulo</td>
							<td class="description"></td>
							<td class="price">Precio</td>
							<td class="quantity"></td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?
					$suma = 0;
					for ($i=0;$i<$_SESSION["ocarrito"]->num_productos;$i++){
						if($_SESSION["ocarrito"]->array_id_prod[$i]!=0){
							$id=$_SESSION["ocarrito"]->array_id_prod[$i];
							$query = "select * from ARTICULO WHERE idARTICULO=".$id.";";
							$articulos = mysql_query($query);
							$numero=mysql_num_rows($articulos);
							if($numero!=0){
								$img=mysql_result($articulos,0, 'imagen_t');
							}
							//$contenido=$contenido.$id.",".$_SESSION["ocarrito"]->array_nombre_prod[$i].".";
							$contenido=$contenido."-".$_SESSION["ocarrito"]->array_nombre_prod[$i].".";
							$suma += $_SESSION["ocarrito"]->array_precio_prod[$i];
					?>
						<tr>
							<td class="cart_product">
								<a href=""><img src=<?php echo $img; ?> alt="" ></a>
							</td>
							<td class="cart_description">
								<h4><?php echo $_SESSION["ocarrito"]->array_nombre_prod[$i]; ?></h4>
								<p></p>
							</td>
							<td class="cart_price">
								<p><? echo "Q.".$_SESSION["ocarrito"]->array_precio_prod[$i]; ?></p>
							</td>
							<td class="cart_quantity">
							</td>
							<td class="cart_total">
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" <? echo "href='eliminar_producto.php?linea=".$i."'"; ?> ><IMG SRC='imgtot/eliminar.jpg' WIDTH=32 HEIGHT=32></a>
							</td>
						</tr>
					<?
						}
					}
					?>

						<tr>
							<td class="cart_product">
							</td>
							<td class="cart_description">
								<p>Total</p>
							</td>
							<td class="cart_price">
								<p></p>
							</td>
							<td class="cart_quantity"></td>
							<td class="cart_total">
								<p><? echo "Q.".$suma; ?></p>
							</td>
							<td class="cart_delete">
								<form method="POST" action="contact.php?id=1">
									<input type="hidden" name="articulop" value=<?php echo $contenido; ?> />
									<input type="submit" value="Enviar">
								</form>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->


	<footer id="footer"><!--Footer-->

		<!-- footer -->
		<div class="footer">
			<div class="container">
				<div class="footer-grids">
					<div class="col-md-3 footer-grid">
						<h3>Navegación</h3>
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="paginacion_cat.php">Colección</a></li>
							<li><a href="about.php">Nosotros</a></li>
							<li><a href="contact.php">Contáctanos</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid">
						<h3>Colección</h3>
						<ul>
						<?php
							include "conexion2.php";
							$link = @mysql_connect($direccion, $usuario, $password);
							mysql_select_db($database);
							$query = 'select * from CATEGORIA ORDER BY (NOMBRE) LIMIT 6;';
							$result = mysql_query($query);
							for($iterador=0;$iterador<mysql_num_rows($result);$iterador++){
								$idcat=mysql_result($result,$iterador,'idCATEGORIA');
								$nombre=mysql_result($result,$iterador,'nombre');
								echo "<li><a href='collections.php?cat=".$idcat."'>".$nombre."</a></li>";
							}
							mysql_free_result($result);
							mysql_close($link);							
						?>
						</ul>
					</div>
					<div class="col-md-3 footer-grid testmonial">
						<h3>Nosotros</h3>
						<div class="testmonial-grid">
							<?php echo "<p>".$valor2."</p>"?>
						</div>
					</div>
					<div class="col-md-3 footer-grid about-grid">
						<h3>Historia</h3>
						<p><?php echo $historia1;  ?></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- social-icons -->
				<div class="social-icons text-center">
					<ul>
						<?php
						include "conexion2.php";
						$link = @mysql_connect($direccion, $usuario, $password);
						mysql_select_db($database);
						$query = 'select count(*) AS redes from REDES where EMPRESA_idEMPRESA=1';
						$result = mysql_query($query);
						$query2 = 'select * from REDES where EMPRESA_idEMPRESA=1';
						$result2 = mysql_query($query2);
						$total=mysql_result($result,0,'redes');
						for($iterador=0;$iterador<$total;$iterador++){
							$enla=mysql_result($result2,$iterador,'enlace');
							$ico=mysql_result($result2,$iterador,'icono');
							echo "<li><a href=".$enla." target='_blank'><img src=".$ico." title=".$enla." width='70' height='70'/></a></li>";
						}
						mysql_free_result($result);
						mysql_free_result($result2);
						mysql_close($link);
						?>
					</ul>
				</div>
				<!-- social-icons -->
						<div class="social-icons text-center">
				<p>Copyright Cuero & Colores</p>
				<p>Developed by <a href="http://rsolutions.comyr.com/" target='_blank'><font color="blue">Rsolutions</font></a></p> 
				<p>Design by <a href="http://w3layouts.com/" target='_blank'><font color="blue">w3layouts</font></a></p>
		</div>
				<!-- footer-bottom -->
			</div>
		</div>
		<!-- footer -->
		
	</footer><!--/Footer-->
	


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>