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
			mysql_close($link);	
			$contenido=$_POST['articulop'];		
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
						<a href="ver_tabla_carrito.php"><img src="imgtot/regresar.png"/></a>
					</div>
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
		<p>Enviamos tu información y nos comunicaremos contigo lo mas pronto posible.</p>
		<div class="logo2">
		<b><p>Llena los datos</p></b></br>

		<form action="Enviar.php?dato=3" method="POST">
			Ingresa tu nombre:<input type="text" name="nombre"></br>
			Ingresa tu correo:<input type="text" name="correo"></br>
			<input type="hidden" name="asunto" value="carrito">
			<input type="hidden" name="contenido" value=<?echo $contenido ?> >
			<input type="submit" value="Enviar carro"/>
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