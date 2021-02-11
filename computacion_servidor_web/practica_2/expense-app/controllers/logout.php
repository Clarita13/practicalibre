
<?php

class Logout extends SessionController{
/**Controlador para el cierre de sesión */
    function __construct(){
        parent::__construct();
    }

    public function render(){
        $this->logout();

        $this->redirect('');
    }
}

?>