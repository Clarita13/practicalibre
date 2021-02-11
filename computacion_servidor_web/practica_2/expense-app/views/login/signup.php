<!-- Plantilla para login-->
<!DOCTYPE html>
<html lang="es
">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
    <title>Claritaps - Practica 2</title>
    <link rel="shortcut icon" href="https://claritaps.com/img/logo.ico">
    
</head>
<body>
    <?php require 'views/header.php'; ?>
    <?php $this->showMessages();?>
    <div id="login-main">
    
        <form action="<?php echo constant('URL'); ?>signup/newUser" method="POST">
        <div></div>
            <h2>Nuevo registro</h2>

            <p>
                <label for="username">Ingresa el nombre de usuario</label>
                <input type="text" name="username" id="username">
            </p>
            <p>
                <label for="password">INgresa la contraseña</label>
                <input type="text" name="password" id="password">
            </p>
            <p>
                <input type="submit" value="Guardar datos" />
            </p>
            <p>
                ¿Tienes una cuenta? <a href="<?php echo constant('URL'); ?>">Iniciar sesion</a>
            </p>
        </form>
    </div>
</body>
</html>