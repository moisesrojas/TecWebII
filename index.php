<?php $titulo="Hola Mundo"; ?>
<html>
<head></head>
<body><h1 id="titulo"><?php echo $titulo; ?></h1>
	<?php
	
	// El archivo
	$filename = 'imagen3.jpg';
	$thumbname = 'thumb_'.$filename;
	$image = imagecreatefromjpeg($filename);
	
	// Dimensiones y proporciones
	$width = 300;
	$height = 300;
	$width_orig = imagesx($image);
	$height_orig = imagesy($image);


	// Orientación de la imagen
	$ratio_orig = $width_orig/$height_orig;
	if ($width/$height > $ratio_orig) {
	   $width = $height*$ratio_orig;
	} else {
	   $height = $width/$ratio_orig;
	}

	// Define la imagen y sus características
	$image_p = imagecreatetruecolor($width, $height);
	imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

	// 
	imagejpeg($image_p, $thumbname, 90);

	?>
</body>
</html>
