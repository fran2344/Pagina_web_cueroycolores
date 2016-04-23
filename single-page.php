<!DOCTYPE HTML>
<html>
	<head>
		<title>Cuero y colores | Detalle producto :: w3layouts</title>

		<!--informacion nueva-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="bmm/css/bootstrap-magnify.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="bmm/js/bootstrap-magnify.min.js"></script>
		<!--fin informacion nueva-->


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
			<!-- bottom-header -->
			<?php
				include "lib_carrito.php";
				include "conexion2.php";
				$link = @mysql_connect($direccion, $usuario, $password);
				mysql_select_db($database);
				$art=$_GET['art'];
				$cat=$_GET['cat'];
				$move=$_GET['move'];
				if($move==1)
				{
					echo "<script>alert('Agregado!')</script>";
				}
				session_start();
				$_SESSION["catego"]=$cat;
				$query = "select * from ARTICULO where idARTICULO=".$art." and EMPRESA_idEMPRESA=1;";
				$result = mysql_query($query);
				$img=mysql_result($result,0,'imagen');
				$imgt=mysql_result($result,0,'imagen_t');
				$titulo=mysql_result($result,0,'titulo');
				$desc=mysql_result($result,0,'descripcion');
				$precio=mysql_result($result,0,'precio');

				$query = 'select * from EMPRESA where idEMPRESA=1';
				$result = mysql_query($query);
				$magen=mysql_result($result,0, 'logo');
				$mensaje=mysql_result($result,0, 'mensaje');
				$historia1=mysql_result($result,0, 'historia');

				$query = "select count(*) as valor from CATEGORIA;";
				$categorias_t = mysql_query($query);
				$query = "select * from CATEGORIA ORDER BY (NOMBRE) LIMIT 9;";
				$categorias = mysql_query($query);
				$total=mysql_result($categorias_t,0,'valor');
				if($total>9)
				{
					$total=9;
				}
				mysql_free_result($categorias_t);
				mysql_free_result($result);
				mysql_close($link);
			?>
			<div class="bottom-header">
				<div class="container">
					<div class="bottom-header-left">
						<!--<a href="collections.php?cat=<?php echo $cat; ?>"><img src="imgtot/regresar.png"/></a>-->
						<p> <?php echo $mensaje; ?></p>
					</div>
					<div class="logo">
						<a href="index.php"><img src=<?php echo $magen; ?> title="gaia" /></a>
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
					<li class="active"><a href=<?echo "'single-page.php?art=".$art."&cat=".$cat."'";?>><?php echo $titulo; ?><span> </span></a></li>
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
		<!-- Product-Details-page -->
		<div class="logo">
			<a href="collections.php?cat=<?php echo $cat; ?>"><img src="imgtot/regresar.png"/></a>
		</div>
		<div class="details-page">
			<div class="content details-page">
			<div class="product-details">
				<div class="container">
					<link rel="stylesheet" href="css/etalage.css">
					<script src="js/jquery.etalage.min.js"></script>
				<script>
						jQuery(document).ready(function($){

							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								source_image_width: 900,
								source_image_height: 1000,
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
				<!--//details-product-slider-->
				<div class="details-left">
					<div class="details-left-slider">
						<div class="top-md-4 top-grid text-center">
							<div class="top-grid-pic">
				        <img data-toggle="magnify" width="347" height="500" alt="" src=<?php echo $img; ?>>
							</div>
							</div>
					</div>
					<div class="details-left-info">
						<div class="details-right-head">
						<h1><?php echo $titulo; ?></h1>
						<p class="product-detail-info"> <?php echo $desc; ?></p>
						<a class="learn-more" href="#"><h3>Precio</h3></a>
						<div class="product-more-details">
							<ul class="price-avl">
								<li class="price"><label><?php echo "Q.".$precio; ?></label></li>
								<div class="clearfix"> </div>
							</ul>
							<?php
								$titulo=str_replace(" ", "_", $titulo);
							?>
							<li><a href=<?php echo "mete_producto.php?id=".$art."&nombre=".$titulo."&precio=".$precio ?> ><img src="imgtot/agregar_carro.png"/></a></li>
						</div>
					</div>
					</div>
					<div class="clearfix"> </div>
					</div>
					<div class="details-right">
						<img class="" src="images/styleder.png" style="">
					</div>
					<div class="clearfix"> </div>
				</div>>
				<div class="clearfix"> </div>
			</div>
			<!--//End-product-details-->
			</div>
		</div>
		</div>
		<!-- /Product-Details-page -->
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
							session_start();
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
						<p> <?php echo $historia1; ?> </p>
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
				<p>Developed by Francisco René Ardón</p>
		</div>
				<!-- footer-bottom -->
			</div>
		</div>
		<!-- footer -->
		<!-- container -->
	</body>
</html>
