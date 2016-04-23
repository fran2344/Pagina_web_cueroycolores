<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Administrador :: w3layouts</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   		 <link href='http://fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Rochester' rel='stylesheet' type='text/css'>
   		 <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			mysql_select_db($database);
			$query = "select * from CATEGORIA;";
			$articulos = mysql_query($query);
			$query = "select count(*) as valor from CATEGORIA;";
			$articulos_tot = mysql_query($query);
			$total=mysql_result($articulos_tot,0, 'valor');
		?>
		<div class="header">
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
			<div class="bottom-header">
				<div class="container">
					<div class="bottom-header-left">
						<p>Área de administrador </p>
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
		</div>
		<?php
		for($iterador=0;$iterador<$total;$iterador++)
		{
			$tempo1=mysql_result($articulos,$iterador, 'idCATEGORIA');
		?>
		<div class="logo2">
			<form action="upd_categoria.php" method="POST" enctype="multipart/form-data">
				<input type="text" name="nombre" value=<?php echo mysql_result($articulos,$iterador, 'nombre'); ?> />
				<img src=<?php echo mysql_result($articulos,$iterador, 'imagen'); ?> title="gaia" width='150' height='150' />
				<input type="hidden" name="articulop" value=<?php echo $tempo1; ?> />
				<input type="hidden" name="imagine" value=<?php echo mysql_result($articulos,$iterador, 'imagen'); ?> />
				Icono categoria <input name="uploadedfile" type="file" class="browse"/><br>
				<input type="submit" value="Modificar Categoria" />
			</form>
		</div>
		<?php
		}
		?>
			<?php
			$dato=$_GET['dato'];
			if($dato==='2')
			{
			?>
			<p><b>Error en agregacion a categoria</b></p>
			<?php	
			}else if($dato==='0')
			{}
			else
			{
			echo "<script>alert('Se ha modificado la categoria correctamente')</script>";
			}
			mysql_free_result($articulos);
			mysql_free_result($articulos_tot);
			mysql_close($link);
			?>
		<script>
			$(document).ready(function(){
				$("span.menu").click(function(){
					$(".top-nav ul").slideToggle(500);
				});
			});
		</script>			

		<div class="banner">
			<div class="container">
					<script src="js/responsiveslides.min.js"></script>
					 <script>
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
			</div>
		</div>
	</body>
</html>