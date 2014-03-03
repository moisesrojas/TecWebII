<?php
include_once("includes/conexion.php");
$palabra_clave = $_POST['titulo'];
$query_busqueda = mysql_query("SELECT * FROM albums WHERE titulo LIKE '%".$palabra_clave."%'");
?>

<h3>Resultados de tu búsqueda</h3>

<?php while($row = mysql_fetch_array($query_busqueda)){
	echo "<div>".$row['titulo']."</div><br>";
}
?>