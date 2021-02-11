
<?php

class User extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();

        $this->user = $this->getUserSessionData();
    }

    function render(){
        $this->view->render('user/index', [
            "user" => $this->user
        ]);
    }

    function updateBudget(){
        if(!$this->existPOST('budget')){
            $this->redirect('user', ['error' => Errors::'Error al registrar datos del usuario']);
            return;
        }

        $budget = $this->getPost('budget');

        if(empty($budget) || $budget === 0 || $budget < 0){
            $this->redirect('user', ['error' => Errors::'Error al registrar datos del usuario'_EMPTY]);
            return;
        }
    
        $this->user->setBudget($budget);
        if($this->user->update()){
            $this->redirect('user', ['success' => Success::'Se actualizo el dato del usuario']);
        }else{
            //error
        }
    }

    function updateName(){
        if(!$this->existPOST('name')){
            $this->redirect('user', ['error' => Errors::'Error al registrar datos del usuario']);
            return;
        }

        $name = $this->getPost('name');

        if(empty($name)){
            $this->redirect('user', ['error' => Errors::'Error al registrar datos del usuario']);
            return;
        }
        
        $this->user->setName($name);
        if($this->user->update()){
            $this->redirect('user', ['success' => Success::'Se actualizo el dato del usuario']);
        }else{
            //error
        }
    }

    function updatePassword(){
        if(!$this->existPOST(['current_password', 'new_password'])){
            $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la contraseña']);
            return;
        }

        $current = $this->getPost('current_password');
        $new     = $this->getPost('new_password');

        if(empty($current) || empty($new)){
            $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la contraseña']);
            return;
        }

        if($current === $new){
            $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la contraseña']);
            return;
        }

        //validar que el current es el mismo que el guardado
        $newHash = $this->model->comparePasswords($current, $this->user->getId());
        if($newHash != NULL){
            //si lo es actualizar con el nuevo
            $this->user->setPassword($new, true);
            
            if($this->user->update()){
                $this->redirect('user', ['success' => Success::'Se actualizo la contraseña']);
            }else{
                //error
                $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la contraseña']);
            }
        }else{
            $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la contraseña']);
            return;
        }
    }

    function updatePhoto(){
        if(!isset($_FILES['photo'])){
            $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la foto de perfil']);
            return;
        }
        $photo = $_FILES['photo'];

        $target_dir = "public/img/photos/";
        $extarr = explode('.',$photo["name"]);
        $filename = $extarr[sizeof($extarr)-2];
        $ext = $extarr[sizeof($extarr)-1];
        $hash = md5(Date('Ymdgi') . $filename) . '.' . $ext;
        $target_file = $target_dir . $hash;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        $check = getimagesize($photo["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
            $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la foto de perfil']);
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($photo["tmp_name"], $target_file)) {
                $this->model->updatePhoto($hash, $this->user->getId());
                $this->redirect('user', ['success' => Success::'Se actualizo la foto de perfil con exito']);
            } else {
                $this->redirect('user', ['error' => Errors::'Error durante la actualizacion de la foto de perfil']);
            }
        }
        
    }
}

?>