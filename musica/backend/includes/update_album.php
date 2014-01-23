<?php
include_once("conexion.php");
$titulo=$_POST['titulo'];
$fecha=$_POST['fecha_lanzamiento'];
$id=$_POST['id'];
mysql_query("UPDATE albums SET titulo='$titulo', fecha_lanzamiento='$fecha' WHERE id='$id'");
header('Location:../')
?>