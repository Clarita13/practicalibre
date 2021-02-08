<?php 
//Practica de la Actividad -- Extra: almacenar datos en base de datos --

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
      </ul>
    </div>
  </div>
</nav>

  <br/><br/>
  
'; 

//Obtencion de los datos alojados en el nombre de los parametros del formulario.php
//Validacion de datos en el formulario y que no se encuentren vacios
if(isset($_POST['nombre']) && !empty($_POST['nombre']) && isset($_POST['apellidoPat']) && !empty($_POST['apellidoPat']) && isset($_POST['apellidoMat']) && !empty($_POST['apellidoMat']) && isset($_POST['email']) && !empty($_POST['email'])  ){
//enlace a base de datos local (localhos), usuarios root, sin contraseña, y nombre de la base
$enlace=mysqli_connect("localhost","root","","bdPractica");
//en caso de error en la conexion muestra el mensaje
mysqli_select_db($enlace,"bdPractica") or die("Problemas al conectar con la bdPractica");

//Asignacion de los valores del formulario
$nombre=$_POST['nombre'];
$apePat=$_POST['apellidoPat'];
$apeMat=$_POST['apellidoMat'];
$email=$_POST['email']; 
//Realizar la inserccion de los datos en la base de datos
mysqli_query($enlace,"INSERT INTO cliente (idCliente,nombre,apePat,apeMat,email) VALUES (null,'$nombre','$apePat','$apeMat','$email')");
//muestra el mensaje de acuerdo a la operacion de exito
print '<script language="JavaScript">';
print 'alert("Cliente agregado correctamente")';
print '</script>'; 
}else{
    //muestra el mensaje de acuerdo a la operacion en caso de algun error o excepcion del proceso de inserccion
echo "Problemas al insertar los datos del cliente";
}

 //Se imprime mediante las etiquetas de HTML, el pie de pagina.
echo '
<br/><br/>
<!--Pie de pagina-->
<footer class="container-fluid text-right">
  <p>@ <a href="https://www.claritaps.com">Luz Clarita Pérez</a></p> 
</footer>
</body>
</html>
';

 ?>
