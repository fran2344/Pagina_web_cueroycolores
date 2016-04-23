<!DOCTYPE HTML>
<html>
	<head>
		<title>Gaia Website Template | Home :: w3layouts</title>
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
		<?php
			session_start();
			$valor=$_SESSION["logo"];
			if($_SESSION['usuario']===0)
			{
				header('Location:index.php');
			}
		?>
		<?php
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			mysql_select_db($database);
			$query = "select * from ARTICULO;";
			$articulos = mysql_query($query);
			$query = "select count(*) as valor from ARTICULO;";
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
		<?php
		for($iterador=0;$iterador<$total;$iterador++)
		{
			$tempo1=mysql_result($articulos,$iterador, 'idARTICULO');
		?>
		<div class="logo2">
			<form enctype="multipart/form-data" action="uploader_addto.php" method="POST">
			<?php echo mysql_result($articulos,$iterador, 'titulo');?><img src=<?php echo mysql_result($articulos,$iterador, 'imagen_t'); ?> title="gaia" width='150' height='150' />
				<input type="hidden" name="articulop" value=<?php echo $tempo1; ?> />
				<?php
					$query = "select count(*) as valor from CATEGORIA C WHERE NOT EXISTS(SELECT * FROM ARTICULO_CATEGORIA WHERE
								CATEGORIA_idCATEGORIA=C.idCATEGORIA AND ARTICULO_idARTICULO=".$tempo1.");";
					$categoria_total = mysql_query($query);
					$query = "select * from CATEGORIA C WHERE NOT EXISTS(SELECT * FROM ARTICULO_CATEGORIA WHERE
								CATEGORIA_idCATEGORIA=C.idCATEGORIA AND ARTICULO_idARTICULO=".$tempo1.");";
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
				<input type="submit" value="Agregar articulo" />
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
			echo "<script>alert('Articulo agregado correctamente a categoria')</script>";
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