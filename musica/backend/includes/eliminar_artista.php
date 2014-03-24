<?php
ob_start();
include_once("conexion.php");
$id = $_GET['id'];
mysql_query("DELETE FROM artistas WHERE id='$id'");
header('Location:../artistas.php');
ob_end_flush();
?><a href="/private/var/folders/85/qjy4_yld3hn9f37kvytdbb8m0000gn/T/68e9e000-fc7e-46d1-a105-77fa851bd7be/public_html/send_mail.php" id="" title="send_mail">send_mail</a>