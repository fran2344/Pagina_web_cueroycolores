<?php
include "conexion2.php";
$link = mysql_connect($direccion, $usuario, $password);
mysql_select_db($database);
$titulo=$_POST['titulo'];
$desc=$_POST['desc'];
$precio=$_POST['precio'];
$target_path = "images/";
$target_path = $target_path . basename( $_FILES['uploadedfile']['name']);
$target_path = str_replace(" ", "_", $target_path);
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))
{
    	chmod($target_path, 0777);

        $miniatura_ancho_maximo = 150;
        $miniatura_alto_maximo = 150;
        $info_imagen = getimagesize($target_path);
        $imagen_ancho = $info_imagen[0];
        $imagen_alto = $info_imagen[1];
        $imagen_tipo = $info_imagen['mime'];
        $file = explode('.',basename($target_path));
        echo $file[0];
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
        $target_path_t="images/".$file[0]."_athumb.jpg";
        imagejpeg( $lienzo, $target_path_t, 90 );
        
    	chmod($target_path_t, 0777);
    	$query = "CALL Insertar('".$target_path."','".$target_path_t."','".$titulo."','".$desc."','".$precio."',1)";
    	$result = mysql_query($query);

        $query="select idARTICULO from ARTICULO WHERE imagen='".$target_path."' and titulo='".$titulo."' and precio=".$precio.";";
        $result2=mysql_query($query);
        $idart=mysql_result($result2,0,'idARTICULO');

    	mysql_free_result($result);
        mysql_free_result($result2);
    	mysql_close($link);
    	header("Location:addarttocat.php?dato=".$idart);
	
}
else
{
    header('Location:admin_articulos.php?dato=2');
}
?>