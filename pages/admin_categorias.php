<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Home :: w3layouts</title>
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
	</head>
	<body>	
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
					</div>
				</div>
			</div>
		</div>
		<div class="logo2">
			<p><b> Área para cargar categorias</p></b>
			<form enctype="multipart/form-data" action="uploader_cat.php" method="POST">
				Nombre de la categoria<input name="nombre" type="text" /><br>
				Imagen <input name="uploadedfile" type="file" class="browse"/><br>
				<input type="submit" value="Agregar Categoria" />
			</form>
			<?php
			$dato=$_GET['dato'];
			if($dato==='2')
			{
			?>
			<p><b>Error no puede cargarse la imagen</b></p>
			<?php	
			}else if($dato==='0')
			{}
			else
			{
			echo "<script>alert('Se ha agregado nueva categoria')</script>";	
			}
			?>
		</div>
		<div class="logo2">
			<a href="admin_cat_del.php?dato=0">Eliminar categorias</a>
		</div>
		<div class="logo2">
			<a href="admin_cat_upd.php?dato=0">Modificar categorias</a>
		</div>		
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