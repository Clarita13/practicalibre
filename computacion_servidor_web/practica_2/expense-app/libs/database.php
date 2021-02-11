<?php

class Database{

    function connect(){
        try{
            //enlace a base de datos local (localhost), usuarios root, sin contraseña, y nombre de la BD
            $pdo=mysqli_connect("localhost","root","","expenseapp");
            return $pdo;
        }catch(PDOException $e){
            //en caso de error en la conexion muestra el mensaje
            mysqli_select_db($enlace,"expenseapp") or die("Problemas al conectar con la expenseapp");
        }
    }

}

?>