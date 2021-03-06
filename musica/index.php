<?php
$titulo_pagina = "Mi Música";
include_once("includes/conexion.php");
$albums_disponibles = mysql_query("SELECT titulo FROM albums GROUP BY titulo");
$generos_disponibles = mysql_query("SELECT nombre FROM generos GROUP BY nombre");

$arreglo = array();

$total_albums =  mysql_num_rows($albums_disponibles);
$total_generos = mysql_num_rows($generos_disponibles);

$total_resultados = $total_albums + $total_generos;

while($row = mysql_fetch_array($albums_disponibles)){
		array_push($arreglo, $row['titulo']);
}

while($row2 = mysql_fetch_array($generos_disponibles)){
		array_push($arreglo, $row2['nombre']);
}

//echo $arreglo[];

for($i = 0;$i < $total_resultados; $i++){
	if($i < $total_albums){
	  $sugerencias = $sugerencias . "{ label:'". $arreglo[$i] . "', category:'albums'},";
	  } else if ($i >= $total_albums && $i < ($total_albums + $total_generos)){
		  $sugerencias = $sugerencias . "{ label:'". $arreglo[$i] . "', category:'generos'},"; 	
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
<link rel="stylesheet" href="css/magnific-popup.css"> 
<script src="js/jquery.magnific-popup.js"></script> 

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
	
	$('.ajax-popup-link').magnificPopup({
	  type: 'ajax'
	});
	
});

</script>

	<style>
	  .ui-autocomplete-category {
	    font-weight: bold;
	    padding: .2em .4em;
	    margin: .8em 0 .2em;
	    line-height: 1.5;
	  }
	  </style>
	  <script>
	  $.widget( "custom.catcomplete", $.ui.autocomplete, {
	    _renderMenu: function( ul, items ) {
	      var that = this,
	        currentCategory = "";
	      $.each( items, function( index, item ) {
	        if ( item.category != currentCategory ) {
	          ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
	          currentCategory = item.category;
	        }
	        that._renderItemData( ul, item );
	      });
	    }
	  });
	  </script>
	  <script>
	  $(function() {
	    var availableTags = [
		<?php echo $sugerencias; ?>
	    ];
 
	    $( "#titulo" ).catcomplete({
	      delay: 500,
	      source: 
		  availableTags
	    });
	  });
	  </script>

</head>
<body>
	
	<?php
	session_start();
	if(!isset($_SESSION['usuario'])){
		echo "<a href='login.php' class='ajax-popup-link'>Iniciar Sesión</a>";
	} else{
		
		if($_SESSION['tipo_usuario'] == 1){
			echo "<a href='backend/index.php'>Administrar sitio</a>";
		}
		
		echo "Bienvenido " . $_SESSION['nickname'];
		echo "<a href='includes/logout.php'>Cerrar Sesión</a>";
	}
	?>

<form id="buscador">
	Escribe el título del Album: <input type="text" name="titulo" id="titulo">

	<p><input type="submit" value="Buscar"></p>
</form>

<div id="resultado"></div>

<div class="destacados">
	<h3>Albums Destacados</h3>
	<?php include_once("includes/destacados.php"); ?>
</div>

<div class="recientes">
	<h3>Albums Recientes</h3>
	<?php include_once("includes/recientes.php"); ?>
</div>

</body>
</html>