<?php
$titulo_pagina = "Editar Album - Administrador";
include_once("includes/conexion.php");
$id = $_GET['id'];
$query_album = mysql_query("SELECT * FROM albums WHERE id=$id");
while($row = mysql_fetch_array($query_album)){
	$titulo_album = $row['titulo'];
	$fecha = $row['fecha_lanzamiento'];
	$cover = $row['cover'];
}
?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?php echo $titulo_pagina;?>
	</title>
</head>
<body>
	<div class="header">
	<h1><?php echo $titulo_pagina; ?></h1>
	<a href="crear_album.php"> + Crear Album</a>
	</div>
	
	<?php include_once("includes/menu.php"); ?>
	
	<form action="includes/update_album.php" method="POST">
		<span>Titulo:</span>
		<input type="text" name="titulo" value="<?php echo $titulo_album; ?>">
		<br><br>
		<span>Fecha de lanzamiento:</span>
		<input type="text" name="fecha_lanzamiento" value="<?php echo $fecha; ?>">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		
		<p><input type="submit" value="Editar"></p>
	</form>
	
</body>
</html>