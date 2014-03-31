<?php
include_once("conexion.php");
$albums_recientes = mysql_query("SELECT * FROM albums WHERE year(fecha_lanzamiento) = 2014");
while($row=mysql_fetch_array($albums_recientes)){
	echo "<div>".$row['titulo']."</div><br>";
}
?>