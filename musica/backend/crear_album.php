<?php
$titulo_pagina = "Crear Albums - Administrador";
?>
<!DOCTYPE html>
<html>

<head>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?php echo $titulo_pagina; ?>
	</title>
</head>
<body>
	<div class="header">
	<h1><?php echo $titulo_pagina; ?></h1>
	<a href="crear_album.php"> + Crear Album</a>
	</div>
	
	<?php include_once("includes/menu.php"); ?>
	
	<form action="includes/insertar_album.php" method="POST" enctype="multipart/form-data">
		<span>Titulo:</span>
		<input type="text" name="titulo">
		<br><br>
		<span>Fecha de lanzamiento:</span>
		<input type="text" name="fecha_lanzamiento">
		<br><br>
		<span>Cover:</span>
		<input type="file" name="cover">
		<p><input type="submit" value="Agregar"></p>
	</form>
	
</body>
</html>