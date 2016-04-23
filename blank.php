<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Cuero y Colores- Area de administrador</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Cuero y colores</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                </ul>
                <!--  notification end -->
            </div>
        </header>
					<?php

						include "conexion2.php";
						$link = @mysql_connect($direccion, $usuario, $password);
						mysql_select_db($database);
						$query = 'select * from EMPRESA where idEMPRESA=1';
						$result = mysql_query($query);
						$valor=mysql_result($result,0, 'logo');
						session_start();
						$_SESSION["logo"]=$valor;
						mysql_free_result($result);
						mysql_close($link);	
						session_start();
						$valor=$_SESSION["logo"];
					?>        
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="index.php"><img src=<?php echo $valor; ?> class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Cuero y Colores</h5>
              	  	
                  <li class="mt">
                      <a href="admin_portada.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Imagenes de portada</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="admin_redes.php?dato=0" >
                          <i class="fa fa-desktop"></i>
                          <span>Redes sociales</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="admin_categorias.php?dato=0" >
                          <i class="fa fa-cogs"></i>
                          <span>Categorías</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="admin_articulos.php?dato=0" >
                          <i class="fa fa-book"></i>
                          <span>Articulos</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="admin_page.php" >
                          <i class="fa fa-dashboard"></i>
                          <span>Mensaje de bienvenida, Logo e ingreso de correo</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="addto_categoria.php?dato=0" >
                          <i class="fa fa-desktop"></i>
                          <span>Agregar articulos a categorias</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="delto_categoria.php?dato=0" >
                          <i class="fa fa-cogs"></i>
                          <span>Remover articulos a categorias</span>
                      </a>
                  </li>      

                  <li class="sub-menu">
                      <a href="admin_about.php" >
                          <i class="fa fa-book"></i>
                          <span>Modificar el acerca de</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
			
		</section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              	<p>Copyright Cuero y Colores</p>
				<p>Developed by Rsolutions</p> 
				<p>http://rsolutions.comyr.com/</p>
				<p>Developed by Francisco René Ardón</p>
				<p>Design by w3layouts</p>
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
