<?php
$limite_registros = 2;

$pagina = $_GET['pagina'];
if(isset($_GET['pagina'])){
	$inicio = ($pagina - 1) * $limite_registros;
} else{
	$inicio = 0;
	$pagina = 1;
}

$titulo_pagina = "Mi Música - Administrador";
include_once("includes/conexion.php");

$query_albums = mysql_query("SELECT * FROM albums LIMIT $inicio, $limite_registros");


//
$query_totales = mysql_query("SELECT * FROM albums");
$total_registros = mysql_num_rows($query_totales);
$paginas_totales = ceil($total_registros/$limite_registros);

?>
<!DOCTYPE html>
<html>

<head><meta charset="utf-8"><title><?php echo $titulo_pagina; ?></title></head>
<body>
	<div class="header">
	<h1><?php echo $titulo_pagina; ?></h1>
	<a href="crear_album.php"> + Crear Album</a>
	</div>
	
	<?php include_once("includes/menu.php"); ?>
	<table class="admin_contenido">
		<tr>
		<th>id</th>
		<td>titulo</td>
		<td>fecha de lanzamiento</td>
		<td>Género</td>
		<td>cover</td>
		<td>Eliminar</td>
	</tr>
	<?php while ($row = mysql_fetch_array($query_albums)){
		echo "<tr>";
		echo "<td>". $row['id']. "</td>";
	echo "<td><a href='editar_album.php?id=".$row['id']."'>". $row['titulo']. "</a></td>";
	echo "<td>". $row['fecha_lanzamiento']. "</td>";
	echo "<td>";
	$id_album = $row['id'];
	$query_genero = mysql_query("SELECT generos.id, generos.nombre FROM generos
		INNER JOIN relacion_album_genero ON generos.id=relacion_album_genero.id_genero
		WHERE relacion_album_genero.id_album = '$id_album'");
		while($row2 = mysql_fetch_array($query_genero)){
			echo $row2['nombre'] . "<br>";
		}
	echo "</td>";
	echo "<td><img width='50' src='../images/covers/thumbs/thumb_". $row['cover']. "'></td>";
	echo "<td><a href='includes/eliminar_album.php?id=".$row['id']."'>Eliminar</a></td>";
	echo "</tr>";
} ?>
	</table>
	<?php
	for ($i=1; $i<$paginas_totales+1; $i++){
		if($i == $pagina){
			echo $i;
		} else{
		echo "<a href='?pagina=".$i."'>".$i."</a>";
		}
	}
	
	 ?>
</body>
</html>