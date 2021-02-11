<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Claritaps - Canastilla</title>
    <link rel="shortcut icon" href="https://claritaps.com/img/logo.ico">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/login.css">
</head>
<body>
    <?php require 'views/header.php'; ?>
    <?php $this->showMessages();?>
    <div id="login-main">
        <form action="<?php echo constant('URL'); ?>login/authenticate" method="POST">
        <div><?php (isset($this->errorMessage))?  $this->errorMessage : '' ?></div>
            <h2>Iniciar sesión</h2>

            <p>
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" id="username" autocomplete="off">
            </p>
            <p>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" autocomplete="off">
            </p>
            <p>
                <input type="submit" value="Iniciar sesión" />
            </p>

            <p>
                ¿No tienes cuenta? <a href="<?php echo constant('URL'); ?>signup">Registrarse</a>
            </p>
        </form>
    </div>
</body>
</html>