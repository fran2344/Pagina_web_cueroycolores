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
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			mysql_select_db($database);
			$query = "select count(*) as valor from ARTICULO;";
			$articulos_tot = mysql_query($query);
			$total=mysql_result($articulos_tot,0, 'valor');
		?>

		<?php
			$TAMANO_PAGINA = 10;
			//examino la página a mostrar y el inicio del registro a mostrar
			$pagina = $_GET["pagina"];
			if (!$pagina) {
    			$inicio = 0;
    			$pagina=1;
			}
			else {
    			$inicio = ($pagina - 1) * $TAMANO_PAGINA;
			}
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			mysql_select_db($database);
			$query = "select * from ARTICULO;";
			$articulos = mysql_query($query);
			$num_total=mysql_num_rows($articulos);
			$query = "select * from ARTICULO limit ".$inicio.",".$TAMANO_PAGINA.";";
			$result2 = mysql_query($query);
			$num_valor=mysql_num_rows($result2);
			$total_paginas=ceil($num_total/$TAMANO_PAGINA);
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
						<select name="categorias" onchange="location=this.value">
							<option>Página</option> 
							<?php
								for($iterador=0;$iterador<$total_paginas;$iterador++)
								{
									$iterador2=$iterador+1;
							?>
								<OPTION VALUE=<?PHP echo "admin_art_del.php?dato=0&pagina=".$iterador2 ?> >
								 <?php echo $iterador2 ?></OPTION>
							<?php
								}
							?>
							</select>

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
		for($iterador=0;$iterador<$num_valor;$iterador++)
		{
			$tempo1=mysql_result($result2,$iterador, 'idARTICULO');
		?>
		<div class="logo2">
			<form action="del_articulo.php" method="POST">
				<p><b><?php echo mysql_result($result2,$iterador, 'titulo'); ?></p>
				<img src=<?php echo mysql_result($result2,$iterador, 'imagen_t'); ?> title="gaia" width='150' height='150' />
				<input type="hidden" name="articulop" value=<?php echo $tempo1; ?> />
				<input type="submit" value="Eliminar Articulo" />
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
			echo "<script>alert('Se ha eliminado el articulo correctamente')</script>";
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