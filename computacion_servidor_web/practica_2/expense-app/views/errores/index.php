<!-- Plantilla -->
<!-- En caso de mostrar alguna pagina no encontrada por el control de sesion se muestra la siguiente plantilla-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clarita ps - Página no encontrada</title>
    <link rel="shortcut icon" href="https://claritaps.com/img/logo.ico">
</head>
<body>

<?php require 'views/header.php'; ?>
    <div class="error-container">
        <div class="error-info">
        <h1 class="error404">404</h1> 
        <p>
            La página que estás buscando no existe. <br />
            <a href="<?php echo constant('URL') ?>">Regresar a la página de inicio</a>
        </p>   
        </div>
        
    </div>

</body>
</html>