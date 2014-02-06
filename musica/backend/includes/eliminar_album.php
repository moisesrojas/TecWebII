<?php
ob_start();
include_once("conexion.php");
$id = $_GET['id'];
mysql_query("DELETE FROM albums WHERE id='$id'");
header('Location:../');
ob_end_flush();
?>