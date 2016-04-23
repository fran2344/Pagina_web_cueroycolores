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
						<a href="index.php"><img src="imgtot/regresar.png"/></a>
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
					?>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $valor ?> title="gaia" width='150' height='150' /></a>
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
			<p> Ingrese sus datos de administrador</p>
			<form action="certificar.php" method="POST">
				<p>Usuario:</p>
				<input name="user" type="text" /><br>
				<p>Password:</p>
				<input name="pass" type="password" /><br>
				<input type="submit" name="cargar" value="ingresar" />
 			</form>
 			<?php
 				$info=$_GET['dato'];
 				if($info==='1')
 				{
 			?>
 			<p> Error el usuario o password es incorrecto</p>
 			<?php
 				}
 			?>
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