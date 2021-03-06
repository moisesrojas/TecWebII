<?php
include_once("conexion.php");
/* Definimos las variables que vamos a insertar en la base de datos */
$titulo= $_POST['titulo'];
$fecha= $_POST['fecha_lanzamiento'];
$genero= $_POST['genero'];
/* Definimos las variables que manipulan el archivo de imagen */
$file_name=$_FILES['cover']['name'];
$file_type=$_FILES['cover']['type'];
$file_tmp=$_FILES['cover']['tmp_name'];

/* Definimos tipo de archivos que permitimos subir */
$tipos_permitidos = array('image/jpeg', 'image/jpg', 'image/gif', 'image/png');

/* Si nuestro tipo de archivo ($file_type) coincide con alguno de los elementos del arreglo ($tipos_permitidos),
subimos la imagen y hacemos el resize */
if(in_array($file_type, $tipos_permitidos)){
	/* Renombramos el archivo que sube el usuario añadiendole la hora, minuto y segundo en que se subio */
	$file_name_final = date("His") . $file_name;
	/* Movemos la imagen del temporal al folder de covers con el nombre nuevo del archivo*/
	move_uploaded_file($file_tmp, "../../images/covers/" . $file_name_final);
	
	/* Definimos el nombre de nuestro Thumb */
	$thumb='../../images/covers/thumbs/thumb_' . $file_name_final;
	/* Definimos la creación de nuestro thumb en formato jpeg a partir del archivo recién subido */
	if($file_type == 'image/png'){
	$imagen= imagecreatefrompng("../../images/covers/" . $file_name_final);
	} else if ($file_type == 'image/jpeg'){
	$imagen= imagecreatefromjpeg("../../images/covers/" . $file_name_final);
	}
	/* Definimos el tamaño de nuestro thumb imagen */
	$width=300;
	$height=300;
	/* Tomamos el ancho y el alto de la imagen original */
	$width_orig= imagesx($imagen);
	$height_orig= imagesy($imagen);
	
	/* Definimos la proporción de la imagen original*/
	$ratio_orig = $width_orig/$height_orig;
	/* Si el resultado de la división del alto y ancho de nuestro thumb es mayor que la proporción de la imagen original*/
	if ($width/$height > $ratio_orig){
		/* Entonces es una imagen vertical, por lo tanto el nuevo ancho es el resultado del alto por la proporción */
		$width = $height*$ratio_orig;
	} else{
		/* Sino entonces es una imagen horizontal, por lo tanto el nuevo alto es el resultado de la división del ancho
		y la proporción de la imagen original*/
		$height= $width/$ratio_orig;
	}
	
	/* Creamos un canvas o lienzo en blanco con las nuevas dimensiones */
	$image_p = imagecreatetruecolor($width, $height);
	/* Creamos una copia de la imagen original indicandole el punto de origen y las nuevas proporciones del thumb.
	Para más información sobre la función visitar http://php.net/imagecopyresampled */
	imagecopyresampled($image_p,$imagen, 0,0,0,0, $width, $height, $width_orig, $height_orig);
	/* Finalmente escribimos la imagen jpeg con la ruta de $thumb con la calidad al 90% */	
	imagejpeg($image_p, $thumb, 90);
	
	
} else{
		/* Si el archivo no esta en el arreglo de formatos permitidos lo mostramos en pantalla */
	echo "el formato no esta permitido <br>";
echo $file_name . "<br>";
echo $file_type . "<br>";
echo $file_tmp . "<br>";
}
	/* Insertamos en la base de datos */
mysql_query("INSERT INTO albums (titulo, fecha_lanzamiento, cover)
			 VALUES ('$titulo', '$fecha', '$file_name_final')");

$id_nuevo_album = mysql_insert_id();
$total_generos = count($genero)-1;

for($i=0; $i<=$total_generos; $i++){
mysql_query("INSERT INTO relacion_album_genero (id_genero,id_album)
			VALUES ('$genero[$i]', '$id_nuevo_album')");
}

//echo $total_generos;
//echo $genero[1/];

//header('Location:../');
?>