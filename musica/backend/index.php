<?php

session_start();
if(!isset($_SESSION['usuario'])){
	header("Location: login.php");
	exit();
}

//Definimos el número de registros para mostrar
$limite_registros = 2;
//Definimos la variable de la página
$pagina = $_GET['pagina'];
//Si esta definida entonces modificamos el valor de $inicio según el valor de la $pagina
if(isset($_GET['pagina'])){
	$inicio = ($pagina - 1) * $limite_registros;
} else {
//Si no entonces definimos $inicio y $página	
	$inicio = 0;
	$pagina = 1;
}

$titulo_pagina = "Mi Música - Administrador";
include_once("includes/conexion.php");
//Mostramos sólo aquellos registros del $inicio al $limite_registros
$query_albums = mysql_query("SELECT * FROM albums LIMIT $inicio, $limite_registros");


//hacemos una segunda consulta para saber el total de registros
$query_totales = mysql_query("SELECT * FROM albums");
//capturamos en una variable el total de registros en base al query
$total_registros = mysql_num_rows($query_totales);
//Definimos el total de paginas en base al total de registros y el limite de registros
$paginas_totales = ceil($total_registros/$limite_registros);

?>
<!DOCTYPE html>
<html>

<head><meta charset="utf-8"><title><?php echo $titulo_pagina; ?></title></head>
<body>
	<div class="header">
	<h1><?php echo $titulo_pagina; ?> Bienvenido <?php echo $_SESSION['nickname']; ?></h1>
	<a href="crear_album.php"> + Crear Album</a>
	<a href="logout.php"> Cerrar Sesión</a>
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
	
	//Hacemos un ciclo for para arrojar los links que pasanla variable $pagina a través de la URL
	for ($i=1; $i<$paginas_totales+1; $i++){
		//Si $pagina es igual al elemento del ciclo, entonces solo mostramos el valor
		if($i == $pagina){
			echo $i;
		} else {
			//Si no, muestro el valor y lo mando al index con un link
		echo "<a href='?pagina=".$i."'>".$i."</a>";
		}
	}
	
	 ?>
</body>
</html>