<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Articulos :: w3layouts</title>
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
			$idart=$_GET['dato'];
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			mysql_select_db($database);
			$query = "select * from ARTICULO WHERE idARTICULO=".$idart.";";
			$articulos = mysql_query($query);
			$img=mysql_result($articulos,0, 'imagen_t');
			$titulo=mysql_result($articulos,0, 'titulo');
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
						<p>Área de administrador agregar articulo a categoria</p>
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
		<div class="logo2">
			<form action="uploader_addto.php?info=1" method="POST">
				<p> <?php echo $titulo; ?></p>
				<img src=<?php echo $img; ?> width='150' height='150' />
				<input type="hidden" name="articulop" value=<?php echo $idart; ?> />
				<?php
					$query = "select count(*) as valor from CATEGORIA C WHERE NOT EXISTS(SELECT * FROM ARTICULO_CATEGORIA WHERE
								CATEGORIA_idCATEGORIA=C.idCATEGORIA AND ARTICULO_idARTICULO=".$idart.");";
					$categoria_total = mysql_query($query);
					$query = "select * from CATEGORIA C WHERE NOT EXISTS(SELECT * FROM ARTICULO_CATEGORIA WHERE
								CATEGORIA_idCATEGORIA=C.idCATEGORIA AND ARTICULO_idARTICULO=".$idart.");";
					$categorias = mysql_query($query);
					$total_c=mysql_result($categoria_total,0, 'valor');
					?>
					<SELECT NAME="selCombo"> 
					<?php
					for($iterador2=0;$iterador2<$total_c;$iterador2++)
					{
						?>
							<OPTION VALUE=<?PHP echo mysql_result($categorias,$iterador2, 'idCATEGORIA'); ?> > <?php echo mysql_result($categorias,$iterador2, 'nombre'); ?></OPTION>
						<?php
					}
				?>
				</SELECT>
				<input type="submit" value="Agregar a categoria" />
			</form>
		</div>
			<?php
			mysql_free_result($articulos);
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