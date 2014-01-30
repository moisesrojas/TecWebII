<?php
//Definimos el tipo de archivo que vamos a crear
header("Content-type: image/gif");

//Definimos un canvas con 400 de ancho y 300 de alto
$imagen = imagecreate(400,300);

//definimos un color y donde queremos que se aplique
$verde = imagecolorallocate($imagen, 0,130,0);

//Dibujamos la imagen
imagefilledrectangle($imagen, 50, 50, 145, 250, $verde);

//Mostramos la imagen en el navegador
imagegif($imagen);

?>