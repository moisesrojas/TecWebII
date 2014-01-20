<?php
include_once("conexion.php");
$titulo= $_POST['titulo'];
$fecha= $_POST['fecha_lanzamiento'];
mysql_query("INSERT INTO albums (titulo, fecha_lanzamiento)
			 VALUES ('$titulo', '$fecha')");
?>