<!DOCTYPE HTML>
<html>
	<head>
		<title>Cueros y colores | Acerca de :: w3layouts</title>
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
				$valor=mysql_result($result,0, 'logo');
				$mensaje=mysql_result($result,0, 'mensaje');
				$valor2=mysql_result($result,0,'descripcion');
				$mision1=mysql_result($result,0,'mision');
				$vision1=mysql_result($result,0,'vision');
				$historia1=mysql_result($result,0,'historia');

			$query = "select count(*) as valor from CATEGORIA;";
			$categorias_t = mysql_query($query);
			$query = "select * from CATEGORIA ORDER BY (NOMBRE) LIMIT 9;";
			$categorias_s = mysql_query($query);
			$total6=mysql_result($categorias_t,0,'valor');
			if($total6>9)
			{
				$total6=9;
			}				

				mysql_free_result($result);
				mysql_close($link);
				session_start();
				$_SESSION["logo"]=$valor;
				$_SESSION['usuario']=0;
			?>
		<!-- header -->
		<div class="header">
			<!-- top-header -->
			<div class="top-header">
				<div class="container">
					<div class="rigister-info">
						<ul>
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
						<p><?php echo $mensaje ?></p>
					</div>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $valor ?> title="CC" width='150' height='150' /></a>
					</div>
					<div class="bottom-header-right">
						<ul>
							<li><a href="ver_tabla_carrito.php">Ver carrito</a></li>
						</ul>
						<div class="search-cart">
							<div class="cart-box">
								<select name="categorias" onchange="location=this.value">
								<option>Colección</option> 
								<?php
									for($iterador=0;$iterador<$total6;$iterador++)
									{
								?>
									<OPTION VALUE=<?PHP echo "collections.php?cat=".mysql_result($categorias_s,$iterador, 'idCATEGORIA'); ?> >
									 <?php echo mysql_result($categorias_s,$iterador, 'nombre'); ?></OPTION>
								<?php
									}
								?>
								</select>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
			<!-- /bottom-header -->
		</div>
		<!-- header -->
		<!--- top-nav -->
		<div class="top-nav">
			<div class="container">
				<span class="menu"> </span>
				<ul>
					<li><a href="index.php">Inicio<span> </span></a></li>
					<li><a href="paginacion_cat.php">Colección<span> </span></a></li>
					<li class="active"><a href="about.php">Nosotros<span> </span></a></li>
					<li><a href="contact.php">Contáctanos<span> </span></a></li>
					<div class="clearfix"> </div>
				</ul>
			</div>
		</div>
		<!--- top-nav -->
		<!-- script-for-nav -->
		<script>
			$(document).ready(function(){
				$("span.menu").click(function(){
					$(".top-nav ul").slideToggle(500);
				});
			});
		</script>
		<!-- /script-for-nav -->
		<!-- About -->
		<div class="about">
				<!-- header-section -->
				<div class="header-section">
					<div class="container">
						<h1>Acerca de</h1>
					</div>
				</div>
				<?php
				session_start();
				?>
				<!-- aboutgrids -->
				<div class="about-grids">
					<div class="container">
						<div class="about-left-grids">
							<h2>Misión</h2>
							<p><?php echo $mision1; ?></p>
							<h3>Visión</h3>
							<p><?php echo $vision1; ?></p>
							<h4>Historia</h4>
							<p><?php echo $historia1; ?></p>							
						</div>
						<div class="about-right-grids">
							<!-- latest-news -->
							<!-- latest-news -->
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- aboutgrids -->
				<!-- header-section -->
			</div>
		<!-- About -->
		<!-- footer -->
		<div class="footer">
			<div class="container">
				<div class="footer-grids">
					<div class="col-md-3 footer-grid">
						<h3>Navegación</h3>
						<ul>
							<li><a href="index.php">Inicio</a></li>
							<li><a href="paginacion_cat.php">Colección</a></li>
							<li><a href="about.php">Nosotros</a></li>
							<li><a href="contact.php">Contáctanos</a></li>
						</ul>
					</div>
					<div class="col-md-3 footer-grid">
						<h3>Colección</h3>
						<ul>
						<?php
							include "conexion2.php";
							$link = @mysql_connect($direccion, $usuario, $password);
							mysql_select_db($database);
							$query = 'select * from CATEGORIA ORDER BY (NOMBRE) LIMIT 6;';
							$result = mysql_query($query);
							for($iterador=0;$iterador<mysql_num_rows($result);$iterador++){
								$idcat=mysql_result($result,$iterador,'idCATEGORIA');
								$nombre=mysql_result($result,$iterador,'nombre');
								echo "<li><a href='collections.php?cat=".$idcat."'>".$nombre."</a></li>";
							}
							mysql_free_result($result);
							mysql_close($link);							
						?>
						</ul>
					</div>
					<div class="col-md-3 footer-grid testmonial">
						<h3>Nosotros</h3>
						<div class="testmonial-grid">
							<?php echo "<p>".$valor2."</p>"?>
						</div>
					</div>
					<div class="col-md-3 footer-grid about-grid">
						<h3>Historia</h3>
						<p> <?php echo $historia1; ?></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- social-icons -->
				<div class="social-icons text-center">
					<ul>
						<?php
						include "conexion2.php";
						$link = @mysql_connect($direccion, $usuario, $password);
						mysql_select_db($database);
						$query = 'select count(*) AS redes from REDES where EMPRESA_idEMPRESA=1';
						$result = mysql_query($query);
						$query2 = 'select * from REDES where EMPRESA_idEMPRESA=1';
						$result2 = mysql_query($query2);
						$total=mysql_result($result,0,'redes');
						for($iterador=0;$iterador<$total;$iterador++){
							$enla=mysql_result($result2,$iterador,'enlace');
							$ico=mysql_result($result2,$iterador,'icono');
							echo "<li><a href=".$enla." target='_blank'><img src=".$ico." title=".$enla." width='100' height='100' /></a></li>";
						}
						mysql_free_result($result);
						mysql_free_result($result2);
						mysql_close($link);
						?>
					</ul>
				</div>
				<!-- social-icons -->
		<div class="social-icons text-center">
				<p>Copyright Cuero & Colores</p>
				<p>Developed by <a href="http://rsolutions.comyr.com/" target='_blank'><font color="blue">Rsolutions</font></a></p> 
				<p>Design by <a href="http://w3layouts.com/" target='_blank'><font color="blue">w3layouts</font></a></p>
				<p>Developed by Francisco René Ardón</p>
		</div>
				<!-- footer-bottom -->
			</div>
		</div>
		<!-- footer -->
				</div>
			</div>
		</div>
		<!-- footer -->
		<!-- container -->
	</body>
</html>

