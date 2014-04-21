<?php

crypt('123456','$2a$09$unacadenaextradeejemplo$'); 

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Mi Música</title>		
</head>
<body>
<form action="validar_usuario.php" method="POST">
	
<label for="usuario">usuario</label>
<input type="text" name="usuario" id="usuario">
	
<label for="contrasena">constraseña</label>
<input type="password" name="contrasena" id="contrasena">
	
<p><input type="submit" value="Iniciar Sesión"></p>
	</form>
</body>
</html>