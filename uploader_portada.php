<?php
$target_path = "images/";
$valor=$_GET['dato'];
        if($valor==1)
        {
            $target_path = $target_path . basename( $_FILES['uploadedfile1']['name']);
            $target_path_t="images/img_portada1.jpg";

            if(move_uploaded_file($_FILES['uploadedfile1']['tmp_name'], $target_path)) 
            {     
                chmod($target_path, 0777);
                $miniatura_ancho_maximo = 940;
                $miniatura_alto_maximo = 400;
                $info_imagen = getimagesize($target_path);
                $imagen_ancho = $info_imagen[0];
                $imagen_alto = $info_imagen[1];
                $imagen_tipo = $info_imagen['mime'];
                $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
                switch ( $imagen_tipo ){
                case "image/jpg":
                case "image/jpeg":
                    $imagen = imagecreatefromjpeg( $target_path );
                    break;
                case "image/png":
                    $imagen = imagecreatefrompng( $target_path );
                    break;
                case "image/gif":
                    $imagen = imagecreatefromgif( $target_path );
                    break;
                }
                imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
                imagejpeg( $lienzo, $target_path_t, 90 );
                chmod($target_path_t,0777);
                header("Location:admin_portada.php?dato=1");
            }
            else
            {
                header('Location:admin_portada.php?dato=2');
            }
        }
        else if($valor==2)
        {
            $target_path = $target_path . basename( $_FILES['uploadedfile2']['name']);
            $target_path_t="images/img_portada2.jpg";
            if(move_uploaded_file($_FILES['uploadedfile2']['tmp_name'], $target_path)) 
            {     
                chmod($target_path, 0777);
                $miniatura_ancho_maximo = 940;
                $miniatura_alto_maximo = 400;
                $info_imagen = getimagesize($target_path);
                $imagen_ancho = $info_imagen[0];
                $imagen_alto = $info_imagen[1];
                $imagen_tipo = $info_imagen['mime'];
                $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
                switch ( $imagen_tipo ){
                case "image/jpg":
                case "image/jpeg":
                    $imagen = imagecreatefromjpeg( $target_path );
                    break;
                case "image/png":
                    $imagen = imagecreatefrompng( $target_path );
                    break;
                case "image/gif":
                    $imagen = imagecreatefromgif( $target_path );
                    break;
                }
                imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
                imagejpeg( $lienzo, $target_path_t, 90 );
                chmod($target_path_t,0777);
                header("Location:admin_portada.php?dato=1");
            }
            else
            {
                header('Location:admin_portada.php?dato=2');
            }
        }
        else if($valor==3)
        {
            $target_path = $target_path . basename( $_FILES['uploadedfile3']['name']);
            $target_path_t="images/imgportada.jpg";
            if(move_uploaded_file($_FILES['uploadedfile3']['tmp_name'], $target_path)) 
            {     
                chmod($target_path, 0777);
                $miniatura_ancho_maximo = 940;
                $miniatura_alto_maximo = 400;
                $info_imagen = getimagesize($target_path);
                $imagen_ancho = $info_imagen[0];
                $imagen_alto = $info_imagen[1];
                $imagen_tipo = $info_imagen['mime'];
                $lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
                switch ( $imagen_tipo ){
                case "image/jpg":
                case "image/jpeg":
                    $imagen = imagecreatefromjpeg( $target_path );
                    break;
                case "image/png":
                    $imagen = imagecreatefrompng( $target_path );
                    break;
                case "image/gif":
                    $imagen = imagecreatefromgif( $target_path );
                    break;
                }
                imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
                imagejpeg( $lienzo, $target_path_t, 90 );
                chmod($target_path_t,0777);
                header("Location:admin_portada.php?dato=1");
            }
            else
            {
                header('Location:admin_portada.php?dato=2');
            }

        }
?>