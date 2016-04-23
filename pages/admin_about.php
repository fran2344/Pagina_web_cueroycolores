<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Acerca de :: w3layouts</title>
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
			$mision1=mysql_result($result,0,'mision');
			$vision1=mysql_result($result,0,'vision');
			$historia1=mysql_result($result,0,'historia');
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
						<p>Área de administrador</p>
					</div>
					<?php
						session_start();
						$valor=$_SESSION["logo"];					
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
		<div class="contact-bottom-grid-right">
			<form method="POST" action="uploader_about.php">
			<div class="text-fild">
				<span>Misión:</span>
					<? echo "(".$mision1.")"; ?> <input type="text" name="mision" class="text">
			</div><br>
			<div class="text-fild">
				<span>Visión:</span>
					<? echo "(".$vision1.")"; ?> <input type="text" name="vision" class="text">
			</div><br>		
			<div class="text-fild">
				<span>Historia :</span>
				<? echo "(".$historia1.")"; ?> <textarea name="historia"> </textarea>
			</div>
			<input type="submit" value="cambiar">
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