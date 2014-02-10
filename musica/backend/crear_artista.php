<?php
$titulo_pagina = "Crear Artista - Administrador";
?>
<!DOCTYPE html>
<html>
<head>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?php echo $titulo_pagina; ?>
	</title>
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
    selector: "textarea",
    plugins: ["advlist autolink lists link image charmap print preview anchor",
			  "searchreplace visualblocks code fullscreen",
			  "insertdatetime media table contextmenu paste"]
});
	</script>
</head>
<body>
	<div class="header">
	<h1><?php echo $titulo_pagina; ?></h1>
	<a href="crear_album.php"> + Crear Album</a>
	</div>
	
	<?php include_once("includes/menu.php"); ?>
	
	<form action="includes/insertar_artista.php" method="POST" enctype="multipart/form-data">
		<span>Nombre:</span>
		<input type="text" name="nombre">
		<br><br>
		<span>Biografía:</span>
		<textarea name="bio"> </textarea>
		<br><br>
		<span>Foto:</span>
		<input type="file" name="foto">
		<p><input type="submit" value="Agregar Artista"></p>
	</form>
	
</body>
</html>