<?php 
//Practica de la Actividad -- Extra: almacenar datos en base de datos --
//Se imprime mediante las etiquetas de HTML, el encabezado de la página web.

//enlace a base de datos local (localhos), usuarios root, sin contraseña, y nombre de la base
$enlace=mysqli_connect("localhost","root","","bdPractica");
//en caso de error en la conexion muestra el mensaje
mysqli_select_db($enlace,"bdPractica") or die("Problemas al conectar con la bd");
//Realizar la extraccion de los datos en la base de datos en la tabla cliente
$registro = mysqli_query($enlace,"SELECT * FROM cliente") ;

 ?>
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

  <!-- Primer contenedor -->
  <div class="container text-center"> 
  <h2>Listado de clientes</h2>
</div>

    <table class="table table-hover"  width="50%" border="1px" >
    <tr align="center">
        <td style="font-weight:bold">--</td>
        <td style="font-weight:bold">Nombre(s)</td>
        <td style="font-weight:bold">Apellidos</td>
        <td style="font-weight:bold">Correo electronico</td>
    </tr>

<?php
//Realizar la extraccion de los datos en la base de datos en la tabla cliente
while($reg=mysqli_fetch_array($registro)){
	?>
	<tr align="center">
<td><?php echo $reg['idCliente']." ";?></td>
<td><?php echo $reg['nombre']." "; ?></td>
<td><?php echo $reg['apePat']." ".$reg['apeMat']." "; ?></td>
<td><?php echo $reg['email']." "; ?></td>
</tr>
<?php
}
?>

</table>
<!--Pie de pagina-->
<footer class="container-fluid text-right">
  <p>@ <a href="https://www.claritaps.com">Luz Clarita Pérez</a></p> 
</footer>
</body>
</html>