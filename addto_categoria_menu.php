<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Área de administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
            $categoria_g=$_GET['cat'];
            $link = @mysql_connect($direccion, $usuario, $password);
            mysql_select_db($database);
            //$query = "select * from ARTICULO;";
            $query = "select * from ARTICULO A Where idARTICULO in 
                    (select ARTICULO_idARTICULO FROM ARTICULO_CATEGORIA 
                    where A.idARTICULO=ARTICULO_idARTICULO
                    AND CATEGORIA_idCATEGORIA=".$categoria_g."
                    );";
            $articulos = mysql_query($query);
            $num_total=mysql_num_rows($articulos);
             $query = "select * from ARTICULO A Where idARTICULO in 
                    (select ARTICULO_idARTICULO FROM ARTICULO_CATEGORIA 
                    where A.idARTICULO=ARTICULO_idARTICULO
                    AND CATEGORIA_idCATEGORIA=".$categoria_g."
                    ) limit ".$inicio.",".$TAMANO_PAGINA.";";
            $result2 = mysql_query($query);
            $num_valor=mysql_num_rows($result2);
            $total_paginas=ceil($num_total/$TAMANO_PAGINA);


            $query = "select * from CATEGORIA WHERE idCATEGORIA=".$categoria_g.";";
            $nombre_cat = mysql_query($query);
            $nombre=mysql_result($nombre_cat,0, 'nombre');  

        ?>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Cuero & Colores   | Regresar a pagina principal</a>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="admin_portada.php"><i class="fa fa-dashboard fa-fw"></i>Imágenes de portada</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Red Social<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin_redes.php?dato=0">Agregar</a>
                                </li>
                                <li>
                                    <a href="admin_redes_del.php?dato=0">Eliminar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>Colección<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin_categorias.php?dato=0">Agregar</a>
                                </li>
                                <li>
                                    <a href="admin_cat_del.php?dato=0">Eliminar</a>
                                </li>
                                <li>
                                    <a href="admin_cat_upd.php?dato=0">Modificar</a>
                                </li>
                            </ul>                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Artículo<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin_articulos.php?dato=0">Agregar</a>
                                </li>
                                <li>
                                    <a href="admin_art_del.php?dato=0">Eliminar</a>
                                </li>
                            </ul>                            
                        </li>
                        <li>
                            <a href="admin_page.php"><i class="fa fa-wrench fa-fw"></i> Mensaje de bienvenida, Logo e Ingreso de correo</a>
                        </li>
                        <li>
                            <a href="addto_categoria.php?dato=0"><i class="fa fa-sitemap fa-fw"></i>Agregar artículo a colección</a>
                        </li>
                        <li>
                            <a href="delto_categoria.php?dato=0"><i class="fa fa-files-o fa-fw"></i>Remover artículo de colección</a>
                        </li>
                        <li>
                            <a href="admin_about.php"><i class="fa fa-edit fa-fw"></i>Modificar 'Acerca de'</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $nombre; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        <?php
        if($pagina>1)
        {
            $pag_ant=$pagina-1;
            echo "<a href='addto_categoria_menu.php?dato=0&pagina=".$pag_ant."&cat=".$categoria_g."'>
            <IMG SRC='imgtot/atras.gif'></IMG></a>";
        }
        echo  $pagina . " / " . $total_paginas;
        if($pagina<$total_paginas)
        {
            $pag_sig=$pagina+1;
            echo "<a href='addto_categoria_menu.php?dato=0&pagina=".$pag_sig."&cat=".$categoria_g."'>
            <IMG SRC='imgtot/adelante.gif'></IMG></a>";
        }        
        ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Agregar articulo a categoria
                        </div>
        <?php
        for($iterador=0;$iterador<$num_valor;$iterador++)
        {
            $tempo1=mysql_result($result2,$iterador, 'idARTICULO');
        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form  enctype="multipart/form-data" action="uploader_addto.php" method="POST"  role="form">
                                        <div class="form-group">
                                            <label><?php echo mysql_result($result2,$iterador, 'titulo');?></label></br>
                                        </div>
                                        <div class="form-group">
                                            <img src=<?php echo mysql_result($result2,$iterador, 'imagen_t'); ?> title="gaia" width='150' height='150' />
                                            <input type="hidden" name="articulop" value=<?php echo $tempo1; ?> />
                                        </div>
                <?php
                    $query = "select count(*) as valor from CATEGORIA C WHERE NOT EXISTS(SELECT * FROM ARTICULO_CATEGORIA WHERE
                                CATEGORIA_idCATEGORIA=C.idCATEGORIA AND ARTICULO_idARTICULO=".$tempo1.");";
                    $categoria_total = mysql_query($query);
                    $query = "select * from CATEGORIA C WHERE NOT EXISTS(SELECT * FROM ARTICULO_CATEGORIA WHERE
                                CATEGORIA_idCATEGORIA=C.idCATEGORIA AND ARTICULO_idARTICULO=".$tempo1.");";
                    $categorias = mysql_query($query);
                    $total_c=mysql_result($categoria_total,0, 'valor');
                    ?>
                    <div class="form-group">
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
                    </div>

                                        <input type="submit" value="Agregar" class="btn btn-default"/>
                                    </form>
                                </div>
                            </div>
                        </div>

        <?
        }
        ?>     
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
