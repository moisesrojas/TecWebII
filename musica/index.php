<?php
$titulo_pagina = "Mi Música";
?>
<!DOCTYPE html>
<html>

<head> 
<meta charset="utf-8"> 
<title><?php echo $titulo_pagina; ?></title>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#buscador").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:"buscador.php",
			type: "post",
			data: $("#buscador").serialize(),
			success: function(respuesta){
				$("#resultado").html(respuesta);
				$("#resultado").effect( "bounce", "slow" );
			}
			
		});
		
	});
});
</script>
</head>
<body>

<form id="buscador">
	Escribe el id del Album: <input type="text" name="titulo" id="titulo">

	<p><input type="submit" value="Buscar"></p>
</form>

<div id="resultado"></div>

</body>
</html>