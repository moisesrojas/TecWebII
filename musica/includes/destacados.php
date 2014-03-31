<?php
include_once("conexion.php");
$albums_destacados = mysql_query("SELECT * FROM albums WHERE destacado = '1'");
while($row=mysql_fetch_array($albums_destacados)){
	echo "<a href='includes/detalle.php?id=".$row['id']."' class='ajax-popup-link'><div>".$row['titulo']."</div></a><br>";
	
}


?>