<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Área de administrador | Imagen de portada</title>

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
                        $dato=$_GET['dato'];
                        if($dato==1)
                        {
                            echo "<script>alert('Se ha agregado Imagen de portada')</script>";
                        }
                        else if($dato==2)
                        {
                            echo "<script>alert('Ha ocurrido un error intente nuevamente.')</script>";
                        }                   
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
                    <h1 class="page-header">Imagenes de Portada</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Portada
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form  enctype="multipart/form-data" action="uploader_portada.php?dato=1" method="POST"  role="form">
                                        <div class="form-group">
                                            <label>Ruta de imagen portada 1</label>
                                            <input type="file" name="uploadedfile1" >
                                        </div>
                                        <input type="submit" value="cargar" class="btn btn-default"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form  enctype="multipart/form-data" action="uploader_portada.php?dato=2" method="POST"  role="form">
                                        <div class="form-group">
                                            <label>Ruta de imagen portada 2</label>
                                            <input type="file" name="uploadedfile2" >
                                        </div>
                                        <input type="submit" value="cargar" class="btn btn-default"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form  enctype="multipart/form-data" action="uploader_portada.php?dato=3" method="POST"  role="form">
                                        <div class="form-group">
                                            <label>Ruta de imagen portada 3</label>
                                            <input type="file" name="uploadedfile3" >
                                        </div>
                                        <input type="submit" value="cargar" class="btn btn-default"/>
                                    </form>
                                </div>
                            </div>




                            <!-- /.row (nested) -->
                        </div>
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
