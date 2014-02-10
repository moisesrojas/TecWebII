<?php
ob_start();
include_once("conexion.php");
$id = $_GET['id'];
mysql_query("DELETE FROM artistas WHERE id='$id'");
header('Location:../artistas.php');
ob_end_flush();
?>