<?php
$titulo_pagina = "Mi Música";
include_once("includes/conexion.php");
$query_artistas = mysql_query('SELECT nombre FROM artistas')
?>
<!DOCTYPE html>
<html>

<head><meta charset="utf-8"><title><?php echo $titulo_pagina; ?></title></head>
<body><?php while ($row = mysql_fetch_array($query_artistas)){
	echo "<div>". $row['nombre']. "</div>";
} ?></body>
</html>