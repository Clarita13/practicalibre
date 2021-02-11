<?php

class Controller{

    function __construct(){
        $this->view = new View();
    }
/**Carga los archivos de los modelos accedidos mediante el llamado al metodo */
    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require_once $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
/**Controlador para los metodos POST para ejecutar querys de la base de datos */
    function existPOST($params){
        foreach ($params as $param) {
            if(!isset($_POST[$param])){
                error_log("ExistPOST: No existe el parametro $param" );
                return false;
            }
        }
        error_log( "ExistPOST: Existen parámetros" );
        return true;
    }
/**Controlador para los metodos GET de la ejecucion de los metodos hacia la BD */
    function existGET($params){
        foreach ($params as $param) {
            if(!isset($_GET[$param])){
                return false;
            }
        }
        return true;
    }
    /**Controlador para los metodos DELETE de la ejecucion de los metodos hacia la BD */
        function UPDATE($params){
            foreach ($params as $param) {
                if(!isset($_UPDATE[$param])){
                    return false;
                }
            }
            return true;
        }
    /**Controlador para los metodos DELETE de la ejecucion de los metodos hacia la BD */
        function existDELETE($params){
            foreach ($params as $param) {
                if(!isset($_DELETE[$param])){
                    return false;
                }
            }
            return true;
        }


}

?>