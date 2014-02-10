<?php
$titulo_pagina = "Mi Música - Administrador";
include_once("includes/conexion.php");
$query_artistas = mysql_query('SELECT * FROM artistas')
?>
<!DOCTYPE html>
<html>

<head><meta charset="utf-8"><title><?php echo $titulo_pagina; ?></title></head>
<body>
	<div class="header">
	<h1><?php echo $titulo_pagina; ?></h1>
	<a href="crear_artista.php"> + Crear Artista</a>
	</div>
	
	<?php include_once("includes/menu.php"); ?>
	<table class="admin_contenido">
		<tr>
		<th>id</th>
		<td>nombre</td>
		<td>biografia</td>
		<td>foto</td>
		<td>Eliminar</td>
	</tr>
	<?php while ($row = mysql_fetch_array($query_artistas)){
		echo "<tr>";
		echo "<td>". $row['id']. "</td>";
	echo "<td><a href='editar_artista.php?id=".$row['id']."'>". $row['nombre']. "</a></td>";
	echo "<td>". $row['bio']. "</td>";
	echo "<td><img width='50' src='../images/artistas/thumbs/thumb_". $row['foto']. "'></td>";
	echo "<td><a href='includes/eliminar_artista.php?id=".$row['id']."'>Eliminar</a></td>";
	echo "</tr>";
} ?>
	</table>
</body>
</html>