<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | coleccion :: w3layouts</title>
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
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- /top-header -->
			<?php
				session_start();
				include "lib_carrito.php";
				include "conexion2.php";
				$cat=$_GET['cat'];
				$dir=$_GET['dir'];
				$link = @mysql_connect($direccion, $usuario, $password);
				mysql_select_db($database);

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
			$query = "select * FROM ARTICULO WHERE idARTICULO IN
						(SELECT ARTICULO_idARTICULO FROM ARTICULO_CATEGORIA WHERE CATEGORIA_idCATEGORIA=".$cat.")";
			$result = mysql_query($query);
			$num_total=mysql_num_rows($result);
			$query = $query." limit ".$inicio.",".$TAMANO_PAGINA.";";
			$result2 = mysql_query($query);
			$num_valor=mysql_num_rows($result2);
			$total_paginas=ceil($num_total/$TAMANO_PAGINA);

				$query = 'select * from EMPRESA where idEMPRESA=1';
				$result = mysql_query($query);
				$logo2=mysql_result($result,0, 'logo');
				$historia1=mysql_result($result,0, 'historia');
				$mensaje=mysql_result($result,0,'mensaje');

				$query = "select count(*) as valor from CATEGORIA;";
				$categorias_t = mysql_query($query);
				$query = "select * from CATEGORIA ORDER BY (NOMBRE) LIMIT 9;";
				$categorias = mysql_query($query);
				$total=mysql_result($categorias_t,0,'valor');
				if($total>9)
				{
					$total=9;
				}
				$query='select * from CATEGORIA where idCATEGORIA='.$cat.";";
				$result3=mysql_query($query);
				$nombre=mysql_result($result3,0, 'nombre');

				mysql_close($link);
			?>
			<!-- bottom-header -->
			<div class="bottom-header">
				<div class="container">
					<div class="bottom-header-left">
						<!--<?	if($dir!=1)
							{
						?>
							<a href="paginacion_cat.php"><img src="imgtot/regresar.png"/></a>
						<?
							}
						else
							{
						?>
							<a href="index.php"><img src="imgtot/regresar.png"/></a>
						<?
							}
						?>-->
						<p> <?php echo $mensaje; ?></p>
					</div>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $logo2; ?> title="gaia" /></a>
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
					<li><a href="index.php">Inicio<span> </span></a></li>
					<li><a href="paginacion_cat.php">Colección<span> </span></a></li>
					<li><a href="about.php">Nosotros<span> </span></a></li>
					<li><a href="contact.php">Contáctanos<span> </span></a></li>
					<li class="active"><a href=<?php echo "collections.php?cat=".$cat."&dir=".$dir; ?> ><?php echo $nombre; ?><span> </span></a></li>
					<div class="clearfix"> </div>
				</ul>
			</div>		
		</div>
		<!-- top-nav -->
		<!-- script-for-nav -->
		<script>
			$(document).ready(function(){
				$("span.menu").click(function(){
					$(".top-nav ul").slideToggle(500);
				});
			});
		</script>
		<!-- /script-for-nav -->
		<!-- bottom-grids -->
	

		<!-- bottom-grids -->
		<div class="bottom-grids">
			<div class="container">
				<div class="col-md-9 bottom-grids-left">
					<div class="f-products">
						<h2><?php echo $nombre; ?></h2>
							<!--sreen-gallery-cursual-->
						<div class="sreen-gallery-cursual">
							 <!-- requried-jsfiles-for owl -->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo").owlCarousel({
									        items : 3,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  false,
									        pagination : false,
									      });
									    });
									   </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						       <div id="owl-demo" class="owl-carousel text-center">
						       		<?php
						       			if($num_valor>4)
						       			{
						       				$num_medio=5;
						       			}else
						       			{
						       				$num_medio=$num_valor;
						       			}
						    			for($iterador=0;$iterador<$num_medio;$iterador++)
						    			{
						    				$imagen=mysql_result($result2,$iterador,'imagen_t');
						    				$titulo=mysql_result($result2,$iterador,'titulo');
						    				$precio=mysql_result($result2,$iterador,'precio');
						    				$idval=mysql_result($result2,$iterador,'idARTICULO');
						       		?>
					                <div class="item">
					                	<div onclick=<?php echo "location.href='single-page.php?art=".$idval."&cat=".$cat."'" ?>  class="product-grid">
											<div class="product-pic">
												<img src=<? echo $imagen; ?> width='150' height='150' title=<? echo $titulo; ?> />
											</div>
											<div class="product-pic-info">
												<h3><a href=<?echo "'single-page.php?art=".$idval."&cat=".$cat."'";?> ><? echo $titulo; ?></a></h3>
												<div class="product-pic-info-price-cart">
													<div class="product-pic-info-price">
														<span><? echo "Q.".$precio; ?></span>
													</div>
													<div class="product-pic-info-cart">
														<a class="p-btn" href=<?echo "'single-page.php?art=".$idval."&cat=".$cat."'";?> >Ver</a>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
					                </div>
					                <?php
					            		}
					                ?>
				              </div>
						<!--//sreen-gallery-cursual-->
							
					</div>
				</div>
				<?
					if($num_valor>4){
				?>
				<div class="d-products f-products">
						<h2><?php echo $nombre; ?></h2>
							<!--sreen-gallery-cursual-->
						<div class="sreen-gallery-cursual">
							 <!-- requried-jsfiles-for owl -->
							<link href="css/owl.carousel.css" rel="stylesheet">
							    <script src="js/owl.carousel.js"></script>
							        <script>
									    $(document).ready(function() {
									      $("#owl-demo1").owlCarousel({
									        items : 3,
									        lazyLoad : true,
									        autoPlay : true,
									        navigation : true,
									        navigationText :  false,
									        pagination : false,
									      });
									    });
									   </script>
							 <!-- //requried-jsfiles-for owl -->
							 <!-- start content_slider -->
						       <div id="owl-demo1" class="owl-carousel text-center">
						       <?
						    			for($iterador=5;$iterador<$num_valor;$iterador++)
						    			{
						    				$imagen=mysql_result($result2,$iterador,'imagen_t');
						    				$titulo=mysql_result($result2,$iterador,'titulo');
						    				$precio=mysql_result($result2,$iterador,'precio');
						    				$idval=mysql_result($result2,$iterador,'idARTICULO');
						    	?>
					                <div class="item">
					                	<div onclick=<?php echo "location.href='single-page.php?art=".$idval."&cat=".$cat."'" ?>  class="product-grid">
											<div class="product-pic">
												<img src=<? echo $imagen; ?> width='150' height='150' title=<? echo $titulo; ?> />
											</div>
											<div class="product-pic-info">
												<h3><a href=<?echo "'single-page.php?art=".$idval."&cat=".$cat."'";?> ><? echo $titulo; ?></a></h3>
												<div class="product-pic-info-price-cart">
													<div class="product-pic-info-price">
														<span><? echo "Q.".$precio; ?></span>
													</div>
													<div class="product-pic-info-cart">
														<a class="p-btn" href=<?echo "'single-page.php?art=".$idval."&cat=".$cat."'";?> >Ver</a>
													</div>
													<div class="clearfix"> </div>
												</div>
											</div>
										</div>
					                </div>
					                <?}?>
				              </div>
						<!--//sreen-gallery-cursual-->
							
					</div>
					<?
						}
					?>
				</div>
				</div>




		<!--paginacion-->
		<div class="logo2">
		<div class="callbacks_container" id="top">
		<?php
		if($pagina>1){
			$pag_ant=$pagina-1;
			echo "<a href='collections.php?cat=".$cat."&pagina=".$pag_ant."'><IMG SRC='imgtot/atras.gif'></IMG></a>";
		?>
		<?php
			}
			mysql_free_result($result);
			echo  $pagina . " / " . $total_paginas;
			if($pagina<$total_paginas)
			{
			$pag_sig=$pagina+1;
			echo "<a href='collections.php?cat=".$cat."&pagina=".$pag_sig."'><IMG SRC='imgtot/adelante.gif'></IMG></a>";
			}
		?>
		</div>
		</div>
		<!--paginacion-->



				<div class="clearfix"> </div>
			</div>
		</div>
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
							$query = 'select * from EMPRESA WHERE idEMPRESA=1;';
							$result2 = mysql_query($query);
							$valor2=mysql_result($result2,0,'descripcion');
							for($iterador=0;$iterador<mysql_num_rows($result);$iterador++){
								$idcat=mysql_result($result,$iterador,'idCATEGORIA');
								$nombre=mysql_result($result,$iterador,'nombre');
								echo "<li><a href='collections.php?cat=".$idcat."'>".$nombre."</a></li>";
							}
							mysql_free_result($result2);
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

