<?php
include_once("includes/conexion.php");
$titulo_pagina = "Crear Album - Administrador";
$query_generos = mysql_query("SELECT * FROM generos");
?>
<!DOCTYPE html>
<html>

<head>	
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?php echo $titulo_pagina; ?>
	</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script>
	$(function() {
		  $( "#fecha" ).datepicker({
	  showOn: "both",
	  buttonText: "Calendario",
	  dateFormat: "yy-mm-dd",
	  showOtherMonths: true,
	  changeMonth: true,
	  changeYear: true,
	  yearRange: "1945:2014",
	  dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
	  monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ]
	});
	});
	  </script>
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
		<input type="text" name="fecha_lanzamiento" id="fecha">
		<br><br>
		<span>Género:</span>
		<select name="genero">
			<?php while($row=mysql_fetch_array($query_generos)){
				echo "<option value='".$row['id']."'>".$row['nombre']." </option>";
			} ?>
		</select>
		<br><br>
		<span>Cover:</span>
		<input type="file" name="cover">
		<p><input type="submit" value="Agregar"></p>
	</form>
	
</body>
</html>