<?php
include_once("includes/conexion.php");
$palabra_clave = $_POST['titulo'];
$query_busqueda = mysql_query("SELECT titulo FROM albums
	WHERE albums.titulo LIKE '%".$palabra_clave."%'
	UNION SELECT nombre FROM generos
	WHERE generos.nombre LIKE '%".$palabra_clave."%'");
?>

<h3>Resultados de tu búsqueda</h3>

<?php while($row = mysql_fetch_array($query_busqueda)){
	echo "<div>".$row['titulo']."</div><br>";
}
?>