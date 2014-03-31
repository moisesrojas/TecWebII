<?php
include_once("conexion.php");
$id = $_GET['id'];
$detalle_album = mysql_query("SELECT * FROM albums WHERE id = $id");

while($row = mysql_fetch_array($detalle_album)){
	echo "<div>".$row['titulo']."</div><br>";
}

?>