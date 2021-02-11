
<?php
class Signup extends SessionController{
/**Controlador para la creacion de un nuevo usuario desde el portal */
    function __construct(){
        parent::__construct();
    }

    function render(){
        $this->view->errorMessage = '';
        $this->view->render('login/signup');
    }

    function newUser(){
        if($this->existPOST(['username', 'password'])){
            
            $username = $this->getPost('username');
            $password = $this->getPost('password');
            
            if($username == '' || empty($username) || $password == '' || empty($password)){
                /* error al validar datos*/
                $this->redirect('signup', ['error' => Errors::'Se encontraron multiples datos con el usuario a registrar']);
            }

            $user = new UserModel();
            $user->setUsername($username);
            $user->setPassword($password);
            $user->setRole("user");
            
            if($user->exists($username)){
                $this->redirect('signup', ['error' => Errors::'Se encontraron multiples datos con el usuario a registrar']);
     
            }else if($user->save()){
                $this->redirect('', ['success' => Success::'Se agrego un usuario correctamente']);
            }else{
                $this->redirect('signup', ['error' => Errors::'Error al acceder']);
            }
        }else{
            /*error, cargar vista con errores*/
            $this->redirect('signup', ['error' => Errors::'Se encontraron multiples datos con el usuario a registrar']);
        }
    }
}

?>