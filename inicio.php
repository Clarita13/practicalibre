
<?php
//Practica de la Actividad 

//Se imprime mediante las etiquetas de HTML, el encabezado de la página web.
echo '<!DOCTYPE html>
  <!-- Practica de la Actividad -->
<html lang="en">
<head>
<meta content="text/html; charset=utf-8"/>
	<title>Claritaps</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
  <!-- Menu lateral -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <!-- Archivo con formulario de registro en base de datos -->
        <li><a href="formulario.php" >Registro</a></li>
        <!-- Archivo con la consulta en general a tabla cliente en base de datos -->
        <li><a href="consultar.php">Consultar</a></li>
        <!-- Practica general de la primera actividad del curso -->
        <li><a href="practica.php">Practica</a></li>
      </ul>
    </div>
  </div>
</nav>

';
 //Se imprime mediante las etiquetas de HTML, el contenido de la página.
 //indicaciones
echo "<div><h2>Pagina creada para la visualización de practicas de la maestria, se tomara en cuenta las practicas para la actividad #1</h2></div>";

//Se imprime mediante las etiquetas de HTML, el pie de la página.
echo '
<!--Pie de pagina-->
<footer class="container-fluid text-right">
  <p>@ <a href="https://www.claritaps.com">Luz Clarita Pérez</a></p> 
</footer>
</body>
</html>';

?>