<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Inicio :: w3layouts</title>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<script src="js/jquery.min.js"></script>
		 <!-- Custom Theme files -->
		<link href="css/style.css" rel='stylesheet' type='text/css' />
   		 <!-- Custom Theme files -->
   		 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   		 <meta http-equiv="Expires" content="0">
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
		<?php
			include "lib_carrito.php";
			include "conexion2.php";
			$link = @mysql_connect($direccion, $usuario, $password);
			@mysql_select_db($database);

			$query = 'select count(*) as dato from EMPRESA WHERE idEMPRESA=1;';
			$result = mysql_query($query);
			$valor=mysql_result($result,0,'dato');

			$query = 'select * from EMPRESA WHERE idEMPRESA=1';
			$result2 = mysql_query($query);
			$valor2=mysql_result($result2,0,'descripcion');
			$historia1=mysql_result($result2,0,'historia');
			if($valor==='1')
			{}
			else
			{
				$query="INSERT INTO EMPRESA (idEMPRESA,mensaje,descripcion)VALUES (1,'cueros y colores','cueros')";
				$result = mysql_query($query);
			}
			mysql_free_result($result2);
			mysql_free_result($result);
			mysql_close($link);
		?>
		<div class="header">
			<!-- top-header -->
			<div class="top-header">
				<div class="container">
					<div class="rigister-info">
						<ul>
							<!--<li><a href="admin.php?dato=0">Login</a></li>-->
							<div class="clearfix"> </div>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- /top-header -->
			<!-- bottom-header -->
			<?php
				include "conexion2.php";
				$link = @mysql_connect($direccion, $usuario, $password);
				mysql_select_db($database);
				$query = 'select * from EMPRESA where idEMPRESA=1';
				$result = mysql_query($query);
				$valor=mysql_result($result,0, 'logo');
				$mensaje=mysql_result($result,0, 'mensaje');

				$query = "select count(*) as valor from CATEGORIA;";
				$categorias_t = mysql_query($query);
				$query = "select * from CATEGORIA ORDER BY (NOMBRE) LIMIT 9;";
				$categorias = mysql_query($query);
				$total=mysql_result($categorias_t,0,'valor');
				if($total>9)
				{
					$total=9;
				}
				mysql_free_result($result);
				mysql_close($link);
				session_start();
				$_SESSION["logo"]=$valor;
				$_SESSION['usuario']=0;
				$aleatorio=time();
				$strnocache="?nocache=$aleatorio";
			?>
			<div class="bottom-header">
				<div class="container">
					<div class="bottom-header-left">
						<p> <?php echo $mensaje; ?></p>
					</div>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $valor."?".$strnocache ?> title="CC" width='150' height='150'/></a>
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
									for($iterador=0;$iterador<$total;$iterador++)
									{
								?>
									<OPTION VALUE=<?PHP echo "collections.php?cat=".mysql_result($categorias,$iterador, 'idCATEGORIA'); ?> >
									 <?php echo mysql_result($categorias,$iterador, 'nombre'); ?></OPTION>
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
					<li class="active"><a href="index.php">Inicio<span> </span></a></li>
					<li><a href="paginacion_cat.php">Colección<span> </span></a></li>
					<li><a href="about.php">Nosotros<span> </span></a></li>
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
		<!-- banner -->
		<div class="banner">
			<div class="container">
				<!-- img-slider -->
				<div class="img-slider">
						<!--start-slider-script-->
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
					<!--//End-slider-script-->
					<?php
					$aleatorio=time();
					$strnocache="?nocache=$aleatorio";
					?>
					<!-- Slideshow 4 -->
					    <div  id="top" class="callbacks_container">
					      <ul class="rslides" id="slider4">
					        <li>
					          <img class="img-responsive" src=<?php echo "images/img_portada1.jpg".$strnocache; ?> >
					          <div class="slider-caption">
					          	<h1>Cuero & Colores</h1>
					          	<?php
					          	echo "<p>".$valor2."</p>";
					          	?>
					          </div>
					        </li>
					        <li>
					          <img src= <?php echo "images/img_portada2.jpg".$strnocache; ?> >
					           <div class="slider-caption">
					          	<h1>Cuero & Colores</h1>
					          	<?php
					          	echo "<p>".$valor2."</p>";
					          	?>					          	
					          </div>
					        </li>
					        <li>
					          <img src=<?php echo "images/imgportada.jpg".$strnocache; ?> >
					           <div class="slider-caption">
					          	<h1>Cuero & Colores</h1>
					          	<?php
					          	echo "<p>".$valor2."</p>";
					          	?>					          	
					          </div>
					        </li>
					      </ul>
					    </div>
					    <div class="clearfix"> </div>
					</div>
						<!-- slider -->
			</div>
		</div>
		<!-- banner -->

				<?php
					for($iterador=0;$iterador<$total;$iterador++)
					{
				?>
		<!-- top-grids -->
		<div class="top-grids">
			<div class="container">
			<?php
				for($iterador2=0;$iterador2<3;$iterador2++)
				{
					$objeto=$iterador2+$iterador;
					if($objeto<$total){
						$info=mysql_result($categorias,$objeto, 'idCATEGORIA');
			?>
				<div class="col-md-4 top-grid text-center">
					<div class="top-grid-pic">
						<img src=<?php echo mysql_result($categorias,$objeto, 'imagen');?> />
						<br><span><?php echo mysql_result($categorias,$objeto, 'nombre'); ?></span>
					</div>
					<div class="top-grid-pic-info">
						<?php echo "<a href='collections.php?cat=".$info."&dir=1'>"; ?>Ver</a>
					</div>
				</div>

			<?php
					}
				}
				$iterador=$iterador+2;
			?>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- top-grids -->
				<?php
					}
				?>



		<!-- bottom-grids -->

		<!-- bottom-grids -->
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
						<p><?php echo $historia1 ?></p>
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
							echo "<li><a href=".$enla." target='_blank'><img src=".$ico." title=".$enla." width='70' height='70'/></a></li>";
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
		</div>
				<!-- footer-bottom -->
			</div>
		</div>
		<!-- footer -->
		<!-- container -->
	</body>
</html>