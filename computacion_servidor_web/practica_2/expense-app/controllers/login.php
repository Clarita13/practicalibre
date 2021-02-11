
<?php

class Login extends SessionController{
/**Controlador para el login del portal */
    function __construct(){
        parent::__construct();
    }

    function render(){
        $actual_link = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actual_link);
        $this->view->errorMessage = '';
        $this->view->render('login/index');
    }

    function authenticate(){
        if( $this->existPOST(['username', 'password']) ){
            $username = $this->getPost('username');
            $password = $this->getPost('password');

            /*validacion de los datos */
            if($username == '' || empty($username) || $password == '' || empty($password)){
                $this->redirect('', ['error' => Errors::'Fallo en la autenticacion']);
                return;
            }
            /**En caso de acceder muestra el nombre del usuario al inicio del portal */
            
            $user = $this->model->login($username, $password);

            if($user != NULL){
                /* inicializa el proceso de las sesiones*/  
                $this->initialize($user);
            }else{
                /* muestra el error al registrar, que intente de nuevo*/
                $this->redirect('', ['error' => Errors::'Fallo en la autenticacion']);
                return;
            }
        }else{
            $this->redirect('', ['error' => Errors::'Fallo en la autenticacion']);
        }
    }
}

?>