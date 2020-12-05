<?php 
//Practica #3 -- Utilizando arreglos de datos --
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
        <li><a href="practica4.php" >Practica #4</a></li>
      </ul>
    </div>
  </div>
</nav>

'; 

//Se imprime mediante las etiquetas de HTML, el titulo de la actividad.
 echo "<h1>Practica basada en el manejo de arreglos de datos</h1>";
 echo "<br/><br/>";

//Se imprime mediante las etiquetas de HTML, la informacion.
 echo '
     <form action="practica3.php" method="post" name="form">    
     <label>Ingresa un número: </label>
     <input type="text" name="numP" size="50" required/> <br/> <br/>

     <input type="submit" name="formSubmit" class="btn btn-default btn-lg" value="Aceptar" /> <br/><br/>
     </form>';

//Variable de tipo objeto de la clase función Numero.
$buscarNumero = new Numero();

//Se invoca a la función de la clase para el metodo de buscarNumero.
     $buscarNumero -> buscarNumero();

//Clase
class Numero{
    public function buscarNumero(){
        if(isset($_POST['formSubmit'])){
            //Asignacion del dato obtenido del fomulario de la pagina web
            $numero = $_POST['numP'];
            //Validacion del dato $numero en caso de ser numerico y mayor a cero prosigue con la ejecución
            if((is_numeric($numero)) && ($numero > 0)){
                //Declaracion de la lista de numeros
                $list = array(3,56,341,534,132,452343,34,123,324,54,123,1,2351,65,90,99,100);
                //Asignacion de variable sobre la informacion de la estructura
                //var_export($list);
                //Se asigna el metodo de busqueda derivado de PHP para validar el dato buscado en el formulario
                //Parametros: (el dato a busca, lista de datos en donde buscar elemento, en caso de ser estricta la busqueda)
                $indice = array_search($numero,$list,false);
                //Validacion del valor de $indice
                if(is_numeric($indice)){
                    //En caso de encontrar el número
                    echo "El número $numero; se encuentra en el indice $indice, ";
                    echo "dentro de la lista (3,56,341,534,132,452343,34,123,324,54,123,1,2351,65,90,99,100)";
                }else{
                      //En caso de no encontrar el número
                echo "El número $numero no existe en nuestro sistema interno";
                }

            }else
            {
                //En caso de que la validacion del dato $numero, no sea verdadera, muestra mensaje de alerta
                print '<script language="JavaScript">';
                print 'alert("Favor de ingresar un valor númerico mayor a cero")';
                print '</script>'; 
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