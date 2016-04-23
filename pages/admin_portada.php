<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Administrador :: w3layouts</title>
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
						
					</div>
					<?php
						include "conexion2.php";
						$link = @mysql_connect($direccion, $usuario, $password);
						mysql_select_db($database);
						$query = 'select * from EMPRESA where idEMPRESA=1';
						$result = mysql_query($query);
						$valor=mysql_result($result,0, 'logo');
						session_start();
						$_SESSION["logo"]=$valor;
						mysql_free_result($result);
						mysql_close($link);
						$dato=$_GET['dato'];
						if($dato==1)
						{
							echo "<script>alert('Se ha agregado Imagen de portada')</script>";
						}
						else if($dato==2)
						{
							echo "<script>alert('Ha ocurrido un error intente nuevamente.')</script>";
						}					
					?>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $valor ?> title="gaia" width='150' height='150' /></a>
					</div>
					<div class="bottom-header-right">
						<ul>
						</ul>
						<a href="admin_opciones.php" class="logo2">Regresar</a>
					</div>
				</div>
			</div>
			<!-- /bottom-header -->
		</div>
		<div class="logo2">
			<p> Maneje sus imagenes de portada </p>
			<form enctype="multipart/form-data" action="uploader_portada.php?dato=1" method="POST">
				<input name="uploadedfile1" type="file" class="browse"/><br>
				<input type="submit" value="Imagen de portada 1" />
			</form>
		</div>

		<div class="logo2">
			<form enctype="multipart/form-data" action="uploader_portada.php?dato=2" method="POST">
				<input name="uploadedfile2" type="file" class="browse"/><br>
				<input type="submit" value="Imagen de portada 2" />
			</form>
		</div>

		<div class="logo2">
			<form enctype="multipart/form-data" action="uploader_portada.php?dato=3" method="POST">
				<input name="uploadedfile3" type="file" class="browse"/><br>
				<input type="submit" value="Imagen de portada 3" />
			</form>
		</div>

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