<?php
$titulo_pagina = "Mi Música";
include_once("includes/conexion.php");
$query_artistas = mysql_query('SELECT nombre FROM artistas')
?>
<!DOCTYPE html>
<html>

<head> 
<meta charset="utf-8"> 
<title><?php echo $titulo_pagina; ?></title>
<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#miBoton").click(function(){
    $("#div1").load("cargame.php");
  });
  
  $("#miBoton2").click(function(){
	  $.get("Get.php", {id: 1}, function(respuesta){
		  $("#div2").html(respuesta);
	  })
  });
  
  $("#miBoton3").click(function(){
	  $.post("Post.php", {nombre: "Juan"}, function(respuesta){
		  $("#div3").html(respuesta);
	  })
  });
  
  $("#formulario").submit(function(e){
	  e.preventDefault();
	$.ajax({
		url: "formulario.php",
		type: "post",
		data: $("#formulario").serialize(),
		success: function(respuesta){
			$("#div4").html(respuesta);
		}
	});
	
  });
  
	
});
</script>
</head>
<body><?php while ($row = mysql_fetch_array($query_artistas)){
	echo "<div>". $row['nombre']. "</div>";
} ?>

<h3>CARGANDO CON LA FUNCIÓN LOAD</h3>
<div id="div1">
	<h2> Aquí va cargame.php </h2>
	<a href="#" id="miBoton"> Cargar contenido externo </a>
</div>
<hr>
<br>
<h3>CARGANDO CON LA FUNCIÓN GET</h3>
<div id="div2">
	Aquí cargo con GET
</div>
<input type="button" id="miBoton2" value="Carga con GET">
<hr>
<br>
<h3>CARGANDO CON LA FUNCIÓN POST</h3>
<div id="div3">
	Aquí cargo con POST
</div>
<input type="button" id="miBoton3" value="Carga con POST">

<br>
<h3>CARGANDO NOMBRE</h3>
<form id="formulario">
    Nombre: <input type="text" name="nombre" /> <br/>
   <br>
   <input type="submit">
</form>
<div id="div4">
	
</div>

</body>
</html>

