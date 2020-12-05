<?php 
//Practica #2 -- Utilizando funciones --
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
        <li><a href="practica3.php" >Practica #3</a></li>
        <li><a href="practica4.php" >Practica #4</a></li>
      </ul>
    </div>
  </div>
</nav>

'; 

//Se imprime mediante las etiquetas de HTML, el titulo de la actividad.
 echo "<h1>Practica basada en la creación de una función</h1>";
 echo "<p>Se realiza el juego del lanzado de dados virtuales</p>";
 echo "<br/><br/>";

//Se imprime mediante las etiquetas de HTML, el formulario para los datos del juego.
 echo '
     <form action="practica2.php" method="post" name="form">    
     <input type="submit" name="formSubmit" class="btn btn-default btn-lg" value="Jugar" /> <br/><br/>
     </form>';

//Variable de tipo objeto de la clase función Dados.
     $dado = new Dados();

//Se invoca a la función de la clase para el metodo de tirarDados.
     $dado -> tirarDados();

//Se imprime mediante las etiquetas de HTML, el pie de página.
echo '
<!--Pie de pagina-->
<footer class="container-fluid text-right">
  <p>@ <a href="https://www.claritaps.com">Luz Clarita Pérez</a></p> 
</footer>
</body>
</html>
';

//Clase.
class Dados{

//Metodo.
    public function tirarDados(){

//Se valida si se ha presionado el boton
if(isset($_POST["formSubmit"])){
    //Se asigna a la variable el valor obtenido del metodo de los datos aleatorios entre los parametros ingresados del 1 al 6.
    $numAle = rand(1,6);
        /*Como se debe interactuar en cada dato obtenido del metodo anterior, se utiliza el metodo de switch que a su vez puede
        ser sustituido por las condicionelales de if-else, pero para mas eficaz se utiliza el switch*/
        
        switch($numAle){
            //De cada caso se mostrara una ventana emergente en la página web con el mensaje incluyendo el número obtenido
            case 1:
                print '<script language="JavaScript">';
                print 'alert("¡El dado se ha lanzado, y el número obtenido es 1!")';
                print '</script>'; 
                //break para un cierre del caso
            break;
            case 2:
                print '<script language="JavaScript">';
                print 'alert("¡El dado se ha lanzado, y el número obtenido es 2!")';
                print '</script>'; 
            break;
            case 3:
                print '<script language="JavaScript">';
                print 'alert("¡El dado se ha lanzado, y el número obtenido es 3!")';
                print '</script>'; 
            break;
            case 4:
                print '<script language="JavaScript">';
                print 'alert("¡El dado se ha lanzado, y el número obtenido es 4!")';
                print '</script>'; 
            break;
            case 5:
                print '<script language="JavaScript">';
                print 'alert("¡El dado se ha lanzado, y el número obtenido es 5!")';
                print '</script>'; 
            break;
            case 6:
                print '<script language="JavaScript">';
                print 'alert("¡El dado se ha lanzado, y el número obtenido es 6!")';
                print '</script>'; 
            break;
           
                    
        }
}
        
    }
}
?>