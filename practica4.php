<?php 
//Practica #4 -- Utilizando funciones de cadenas --
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
        <li><a href="practica.php" >Practica</a></li>
        <li><a href="practica1.php" >Practica #1</a></li>
        <li><a href="practica2.php" >Practica #2</a></li>
        <li><a href="practica3.php" >Practica #3</a></li>
      </ul>
    </div>
  </div>
</nav>


'; 

//Se imprime mediante las etiquetas de HTML, el titulo de la actividad.
 echo "<h1>Practica basada en el manejo de arreglos de los datos de tipo cadena o string</h1>";
 echo "<br/><br/>";

//Se imprime mediante las etiquetas de HTML, la informacion.
 echo '
     <form action="practica4.php" method="post" name="form">    
     <label>Ingresa el valor de la cadena 1: </label>
     <input type="text" name="cad1" size="100" required/> <br/> <br/>

     <label>Ingresa el valor de la cadena 2: </label>
     <input type="text" name="cad2" size="100" required/> <br/> <br/>

     <input type="submit" name="formSubmit" class="btn btn-default btn-lg" value="Aceptar" /> <br/><br/>
     </form>';

//Variable de tipo objeto de la clase función Cadena.
$compararCadena = new Cadena();

//Se invoca a la función de la clase para el metodo de compararCadena.
     $compararCadena -> compararCadena();

//Clase
class Cadena{
    public function compararCadena(){
        if(isset($_POST['formSubmit'])){
            //Asignacion del dato obtenido del fomulario de la pagina web
            $cad1 = $_POST['cad1'];
            $cad2 = $_POST['cad2'];
            //Validacion de los datos de las cadenas

            //Las dos cadenas tienen el mismo valor
            if($cad1 == $cad2){
                echo 'Las cadenas ingresadas contienen los mismos caracteres';
            }else{
                echo "Los datos ingresados son $cad1 $cad2";
            }
            
        }
    }
}

//Se imprime mediante las etiquetas de HTML, el pie de página.
echo '
<!--Pie de pagina-->
<footer class="container-fluid text-right">
  <p>@ <a href="https://www.claritaps.com">Luz Clarita Pérez</a></p> 
</footer>
</body>
</html>
';

?>