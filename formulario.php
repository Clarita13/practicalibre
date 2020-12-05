<?php
//Practica de la Actividad -- Extra: almacenar datos en base de datos --
//Se imprime mediante las etiquetas de HTML, el encabezado de la página web.
echo'<!DOCTYPE html>
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
      </ul>
    </div>
  </div>
</nav>
';
 //Se imprime mediante las etiquetas de HTML, el contenido de la página.
 //Formulario para registrar los datos de los nuevos usuarios para enlanzarlo mediante le metodo POST al archivo de insertar.php
 //en la base de datos local
echo '
	<!-- Primer contenedor -->
	<div class="container text-center"> 
  <h2>Registro</h2>
</div>
<!-- Segundo contenedor -->
<div class="container-fluid bg-3 text-center">

<label>*Todos los campos son de carácter obligatorio </label>
	<form action="insertar.php" method="post" name="form">    
  <label>*Nombre(s): </label>
  <input type="text" name="nombre" size="50" required/> <br/> <br/>
  <label>*Apellido paterno: </label>
  <input type="text" name="apellidoPat" size="50" required/> <br/> <br/>
  <label>*Apellido materno: </label>
  <input type="text" name="apellidoMat" size="50" required/> <br/> <br/>
<label>*Correo electronico: </label>
  <input type="text" name="email" size="50" required/> <br/> <br/>
	<input type="submit"  class="btn btn-default btn-lg" value="Aceptar" /> <br/><br/>
	</form>
 
</div>
';

 //Se imprime mediante las etiquetas de HTML, el pie de pagina.
echo '
<!--Pie de pagina-->
<footer class="container-fluid text-right">
  <p>@ <a href="https://www.claritaps.com">Luz Clarita Pérez</a></p> 
</footer>
</body>
</html>';
?>