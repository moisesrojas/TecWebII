<?php
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

include_once("includes/conexion.php");
$query_usuario = mysql_query("SELECT * FROM usuarios
	WHERE usuario = '$usuario'
	AND password = '$contrasena'");
$resultado = mysql_num_rows($query_usuario);
$row = mysql_fetch_array($query_usuario);

if($resultado > 0){
	session_start();
	$_SESSION['usuario'] = $usuario;
	$_SESSION['nickname'] = $row['nickname'];
	header("Location: index.php");
} else{
	?>
	<script>
	alert("Usuario ó Contraseña Incorrecta");
	location.href = "login.php";
	</script>
<?php
}

?>

