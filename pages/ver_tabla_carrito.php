<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Carrito :: w3layouts</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
   		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   		 <!-- webfonts -->
   		 <link href='http://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
   		  <!-- webfonts -->
	</head>
	<body>
		<!-- container -->
		<?php
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			mysql_select_db($database);
			$query = 'select * from EMPRESA where idEMPRESA=1';
			$result = mysql_query($query);
			$logo2=mysql_result($result,0, 'logo');
		?>
		<!-- header -->
		<div class="header">
			<!-- top-header -->
			<div class="top-header">
				<div class="container">
					<div class="rigister-info">
						<ul>
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- /top-header -->
			<!-- bottom-header -->
			<div class="bottom-header">
				<div class="container">
					<div class="bottom-header-left">
						<p>Carrito de cotización</p>
						<a href="index.php"><img src="imgtot/home.png"/></a>
					</div>
					<?php
						$info1=$_GET['dato'];
						if($info1==1)
						{
							echo "<script>alert('Se ha removido articulo del carrito')</script>";
						}else if($info1==2)
						{
							echo "<script>alert('Se ha enviado su carrito, Enviaremos respuesta pronto')</script>";
						}
						include "lib_carrito.php";
						session_start();
						$valor=$_SESSION["logo"];					
					?>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $logo2; ?> title="gaia" width='150' height='150' /></a>
					</div>
					<div class="bottom-header-right">
						<ul>
						</ul>
					</div>
				</div>
			</div>
			<!-- /bottom-header -->
		</div>

		<div class="logo2">
		<h3>Envianos tu carrito.</h3>
		<?
			$suma = 0;
			echo "<div class='logo2'><table border=0 style='width:100%'  cellpadding='3'>
				<tr>
					<td><b>Imagen</b></td>
					<td><b>Nombre</b></td>
					<td><b>Precio Q.</b></td>
					<td>&nbsp;</td>
			  	</tr>";
			for ($i=0;$i<$_SESSION["ocarrito"]->num_productos;$i++){
				if($_SESSION["ocarrito"]->array_id_prod[$i]!=0){
					$id=$_SESSION["ocarrito"]->array_id_prod[$i];

					$query = "select * from ARTICULO WHERE idARTICULO=".$id.";";
					$articulos = mysql_query($query);
					$img=mysql_result($articulos,0, 'imagen_t');

					echo '<tr>';
					$contenido=$contenido.$id.",".$_SESSION["ocarrito"]->array_nombre_prod[$i].".";
					echo "<td><b><img src=" .$img . " width='150' height='150' /></b></td>";
					echo "<td><b><a href='single-page.php?art=".$id."&cat=0'><font color='blue'>" . $_SESSION["ocarrito"]->array_nombre_prod[$i] . "</font></a></b></td>";
					echo "<td><b>Q." . $_SESSION["ocarrito"]->array_precio_prod[$i] . "</b></td>";
					echo "<td><a href='eliminar_producto.php?linea=$i'><IMG SRC='imgtot/eliminar.png' WIDTH=32 HEIGHT=32></a></td>";
					echo '</tr>';
					$suma += $_SESSION["ocarrito"]->array_precio_prod[$i];
				}
			}
		//muestro el total
		echo "<tr><td><td><b>TOTAL:</b></td><td><b>Q.$suma</b></td><td>&nbsp;</td></td></tr>";
		echo "</table></div>";

		?>
		</div>
		<div class="logo2">
			<form method="POST" action="user_enviar.php">
				<input type="hidden" name="articulop" value=<?php echo $contenido; ?> />
				<input type="submit" value="Enviar carrito">
			</form>
		</div>
		<?
		mysql_close($link);
		?>
		<script>
			$(document).ready(function(){
				$("span.menu").click(function(){
					$(".top-nav ul").slideToggle(500);
				});
			});
		</script>			
		<!-- /script-for-nav -->
		<!-- banner -->
		<div class="banner">
			<div class="container">
				<!--- img-slider --->
				<div class="img-slider">
						<!----start-slider-script---->
					<script src="js/responsiveslides.min.js"></script>
					 <script>
					    // You can also use "$(window).load(function() {"
					    $(function () {
					      // Slideshow 4
					      $("#slider4").responsiveSlides({
					        auto: true,
					        pager: true,
					        nav: true,
					        speed: 500,
					        namespace: "callbacks",
					        before: function () {
					          $('.events').append("<li>before event fired.</li>");
					        },
					        after: function () {
					          $('.events').append("<li>after event fired.</li>");
					        }
					      });
					
					    });
					  </script>
					<!----//End-slider-script---->
					<!-- Slideshow 4 -->

			</div>
		</div>
		<!-- footer -->
		<!-- container -->
	</body>
</html>