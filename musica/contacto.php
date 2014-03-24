<?php 
$nombreErr = "";
$nombre = ""; 

if (isset($_POST["submit"])){
	
	function validar_campo($datos)
	{
	     $datos = trim($datos);
	     $datos = stripslashes($datos);
	     $datos = htmlspecialchars($datos);
	     return $datos;
	}
	
	$nombre = $_POST["nombre"];
	$asunto = $_POST["asunto"];
	$correo = $_POST["correo"];
	$comentarios = $_POST["comentarios"];
	
	if (empty($_POST["nombre"]))
	     {$nombreErr = "El Nombre es obligatorio";}
	   else
	     {
	     $nombre = validar_campo($_POST["nombre"]);
	     if (!preg_match("/^[a-zA-Z ]*$/",$nombre))
	       {
	       $nombreErr = "Sólo se admiten letras y espacios"; 
	       }
	     }

	$comentarios = wordwrap($comentario, 70, "\r\n");
	
	$cabeceras = "MIME-Version: 1.0" . "\r\n";
	$cabeceras .= "Content-type:text/html; charset=UTF-8" . "\r\n";
	$cabeceras .= "From: $nombre <$correo>";
	
	mail("Contacto <contacto@moisesrojas.name>",$asunto,$comentarios,$cabeceras);
} ?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
	<label for="Nombre"> Nombre </label>
	<input type="text" name="nombre" value=""> <br>
	<span class="error">* <?php echo $nombreErr;?></span>
	   <br><br>
	<label for="correo"> Asunto</label>
	<input type="text" name="asunto" value=""> <br>
	<label for="correo"> Correo</label>
	<input type="text" name="correo" value=""> <br>
	<label for="comentarios"> Comentarios </label>
	<textarea name="comentarios"> </textarea>
	<br><br>	
	<input type="submit" name="submit" value="Enviar Formulario">
</form>