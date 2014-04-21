<!DOCTYPE html>
<html>
<head>
<title>Login Mi Música</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="utf-8">
</head>
<body>
	
<form action="validar_usuario.php" method="POST">
	
	<div class="caja_login"> 
	<label for="usuario">usuario</label><input type="text" name="usuario" value="" id="usuario"><br>
	<label for="contrasena">contraseña</label><input type="password" name="contrasena" value="" id="contrasena"><br>
	<input type="submit" name="submit" value="Inciar Sesión" id="submit">
	</div>
</form>
</body>
</html>