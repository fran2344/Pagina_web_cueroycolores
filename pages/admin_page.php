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
		<?php
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			mysql_select_db($database);
			$query = 'SELECT * FROM EMPRESA where idEMPRESA=1';
			$result = mysql_query($query);
			$msj=mysql_result($result,0, 'mensaje');
			$desc=mysql_result($result,0, 'descripcion');
			$correo=mysql_result($result,0, 'correo');
			mysql_free_result($result);
			mysql_close($link);
			
			function mysk()
			{
				$msj2=$_POST['mensaje'];
				$desc2=$_POST['descripcion'];
				$correo=$_POST['correo'];
				include "conexion2.php";
				$link = mysql_connect($direccion, $usuario, $password);
				mysql_select_db($database);
				$query = "update EMPRESA set mensaje='".$msj2."', descripcion='".$desc2."', correo='".$correo."' where idEMPRESA=1;";
				$result=mysql_query($query);
				#mysql_free_result($result);
				mysql_close($link);
			}
			if(isset($_POST['probar'])){
				mysk();
			}
		?>
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
						<p>Área de administrador </p>
					</div>
					<?php
						session_start();
						$valor=$_SESSION["logo"];
						if($_SESSION['usuario']===0)
						{
							header('Location:index.php');
						}						
					?>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $valor ?> title="gaia" width='150' height='150' /></a>
					</div>
					<div class="bottom-header-right">
						<ul>
						</ul>
							<a href="admin_opciones.php" class="logo2">Regresar</a>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- /bottom-header -->
		</div>
		<div class="logo2">
			<p><b> Área para cargar la imagen de logo </b></p>
			<form enctype="multipart/form-data" action="uploader_logo.php" method="POST">
				<t><input name="uploadedfile2" type="file" class="browse" /></br>
				<input type="submit" value="Cambiar imagen de logo">
			</form>
		</div>

		<div class="logo2">
			<p><b> Área para cambiar mensaje y descripcion </b></p>
			<form method="POST" action="">
				<p> Mensaje: </p>
				<input type="text" name="mensaje" value="<?php echo $msj ?>" /></br>
				<p> Descripcion: </p>
				<input type="text" name="descripcion" value="<?php echo $desc ?>" /></br>
				<p> Cuenta de correo:</p>
				<input type="text" name="correo" value="<?php echo $correo ?>" /></br>
				<input type="submit" value="Aplicar cambios" name="probar"/>
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