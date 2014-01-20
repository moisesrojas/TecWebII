<?php
$conexion = mysql_connect("localhost","root","root");
if (!$conexion){
	die ('No se puede conectar a la base:' . mysql_error());
}
$bd = mysql_select_db('Musica', $conexion);
mysql_set_charset('utf8', $conexion);
?>m