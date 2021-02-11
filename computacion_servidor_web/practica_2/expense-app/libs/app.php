<?php
require_once 'controllers/errores.php';

class App{

    function __construct(){
/**Obtener variantes de nuestra barra de direcciones en el navegador web */
        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        //var_dump($url);
        /*
            controlador->[0]
            metodo->[1]
            parameter->[2]
        */
        $url = explode('/', $url);

     /** Cuando se ingresa sin definir controlador, se mandara en automatico a la vista del login*/
        if(empty($url[0])){
            $archivoController = 'controllers/login.php';
            require_once $archivoController;
            $controller = new Login();
            $controller->loadModel('login');
            $controller->render();
            return false;
        }
        /**De lo contrario retorna al acceso de los controlers */
        $archivoController = 'controllers/' . $url[0] . '.php';

        if(file_exists($archivoController)){
            require_once $archivoController;

            /* inicializar controlador*/
            $controller = new $url[0];
            $controller->loadModel($url[0]);

            /* si hay un método que se requiere cargar*/
            if(isset($url[1])){
                if(method_exists($controller, $url[1])){
                    if(isset($url[2])){
                        /*el método tiene parámetros obtenemos los # de parametros*/
                        $nparam = sizeof($url) - 2;
                        /*crear un arreglo con los parametros*/
                        $params = [];
                        
                        for($i = 0; $i < $nparam; $i++){
                            array_push($params, $url[$i + 2]);
                        }
                        /*pasarlos al metodo */  
                        $controller->{$url[1]}($params);
                    }else{
                        $controller->{$url[1]}();    
                    }
                }else{
                    $controller = new Errores(); 
                }
            }else{
                $controller->render();
            }
        }else{
            $controller = new Errores();
        }
    }
}

?>