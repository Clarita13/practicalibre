<?php 
//Practica de la Actividad --  --
//Se imprime mediante las etiquetas de HTML, el encabezado de la página web.
echo '
<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8"/>
	<title>Claritaps</title>
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
        <li><a href="inicio.php" >INICIO</a></li>
        <li><a href="" >       </a></li>
        <li><a href="practica1.php" >Practica #1</a></li>
        <li><a href="practica2.php" >Practica #2</a></li>
        <li><a href="practica3.php" >Practica #3</a></li>
        <li><a href="practica4.php" >Practica #4</a></li>
      </ul>
    </div>
  </div>
</nav>
'; 
//Se imprime mediante las etiquetas de HTML, el titulo de la actividad.
 echo "<h2>Tomando en cuenta el desarrollo de las actividades en el curso de la maestría, se tomara en cuenta las practicas para la actividad #1</h2>";

 //Se imprime mediante las etiquetas de HTML, el pie de pagina.
echo '
<!--Pie de pagina-->
<footer class="container-fluid text-right">
  <p>@ <a href="https://www.claritaps.com">Luz Clarita Pérez</a></p> 
</footer>
</body>
</html>
';
?>