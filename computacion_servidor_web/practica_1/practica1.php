<?php 
//Practica #1 -- Una estructura de control de cada tipo de datos --
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
        <li><a href="practica2.php" >Practica #2</a></li>
        <li><a href="practica3.php" >Practica #3</a></li>
        <li><a href="practica4.php" >Practica #4</a></li>
      </ul>
    </div>
  </div>
</nav>

'; 

//Se imprime mediante las etiquetas de HTML, el titulo de la actividad.
 echo "<h1>Practica basada en la estructura de control de cada tipo de datos</h1>";
 echo "<p>Se realiza el juego de adivinanza de tu número de la suerte según tus preferencias</p>";
 echo "<br/><br/>";

//Se imprime mediante las etiquetas de HTML, el formulario para los datos del juego.
 echo '
     <form action="practica1.php" method="post" name="form">    
   <label>Ingresa tu color favorito: </label>
   <input type="text" name="colorP" size="50" required/> <br/> <br/>
   <label>Prefieres pizza o tacos: </label>
   <input type="text" name="comidaP" size="50" required/> <br/> <br/>
   <label>Prefieres café o jugo de sabor: </label>
   <input type="text" name="bebidaP" size="50" required/> <br/> <br/>

     <input type="submit"  name="formSubmit"  class="btn btn-default btn-lg" value="Jugar" /> <br/><br/>
     </form>';

//Variable de tipo objeto de la clase función DameNumero.
     $dSuerte = new DameNumero();

//Se invoca a la función de la clase para el metodo de obtenerNumero.
     $dSuerte -> obtenerNumero();

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
class DameNumero{

//Metodo.
    public function obtenerNumero(){

        if(isset($_POST['formSubmit'])){
            //Se asigna a la variable el valor obtenido del metodo de los datos aleatorios entre los parametros ingresados del 1 al 10.
        $numAle = rand(1,10);

        /*Como se debe interactuar en cada dato obtenido del metodo anterior, se utiliza el metodo de switch que a su vez puede
        ser sustituido por las condicionelales de if-else, pero para mas eficaz se utiliza el switch*/
        
                switch($numAle){
                    //De cada caso se mostrara una ventana emergente en la página web con el mensaje incluyendo el número obtenido
                    case 1:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO UNO, siempre debes ser tu primera prioridad en tu vida!")';
                        print '</script>'; 
                        //break para un cierre del caso
                    break;
                    case 2:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO DOS, tienes dos razones para sonreir, por que te encuentras aquí y por que eres una super persona!")';
                        print '</script>'; 
                    break;
                    case 3:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO TRES, debes sonreir tres veces al día o te quedaras chimuelo!")';
                        print '</script>'; 
                    break;
                    case 4:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO CUATRO, el cuarto mandamiento es agradecer!")';
                        print '</script>'; 
                    break;
                    case 5:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO CINCO, eres único(a) en este maravilloso mundo!")';
                        print '</script>'; 
                    break;
                    case 6:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO SEIS, vale la pena esperar los grandes logros!")';
                        print '</script>'; 
                    break;
                    case 7:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO SIETE, de poco en poco se llena la vida!")';
                        print '</script>'; 
                    break;
                    case 8:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO OCHO, PINOCHO! (Cuidado con tus mentiras)")';
                        print '</script>'; 
                    break;
                    case 9:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO NUEVE, Viva el amor individual!")';
                        print '</script>'; 
                    break;
                    case 10:
                        print '<script language="JavaScript">';
                        print 'alert("¡NÚMERO DIEZ, siempre lo primero y eso es tu salud!")';
                        print '</script>'; 
                    break;
                            
                }
        }
    }
}
?>