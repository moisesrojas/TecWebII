<?php
$titulo_pagina = "Mi Música";
include_once("includes/conexion.php");
$albums_disponibles = mysql_query("SELECT titulo FROM albums GROUP BY titulo");
$arreglo = array();
$total_resultados =  mysql_num_rows($albums_disponibles);
if(mysql_num_rows($albums_disponibles)==0){
	array_push($arreglo, "No hay datos");
} else{
	while($row = mysql_fetch_array($albums_disponibles)){
		array_push($arreglo, $row['titulo']);
	}
}
//echo $arreglo[];

for($i = 0;$i < $total_resultados; $i++){
	if($i == $total_resultados-1){
      $sugerencias = $sugerencias . "'". $arreglo[$i] . "'";
	} else{
	  $sugerencias = $sugerencias . "'". $arreglo[$i] . "',";
	}
}

//echo $sugerencias;
//echo $total_resultados;

?>
<!DOCTYPE html>
<html>

<head> 
<meta charset="utf-8"> 
<title><?php echo $titulo_pagina; ?></title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
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
				$("#resultado").effect( "bounce", "3000" );
			}
			
		});
		
	});
});

$(function() {
    var availableTags = [
	<?php echo $sugerencias; ?>
    ];
    $( "#titulo" ).autocomplete({
      source: availableTags
    });
  });


</script>
</head>
<body>

<form id="buscador">
	Escribe el título del Album: <input type="text" name="titulo" id="titulo">

	<p><input type="submit" value="Buscar"></p>
</form>

<div id="resultado"></div>

</body>
</html>