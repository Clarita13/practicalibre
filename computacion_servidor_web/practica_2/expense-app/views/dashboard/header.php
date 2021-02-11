
<!-- Plantilla de la pagina-->


<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/dashboard.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="shortcut icon" href="https://claritaps.com/img/logo.ico">

<div id="header">
    <ul>
        <li><a href="<?php echo constant('URL'); ?>dashboard">Ver tablero</a></li>
       <li><a href="<?php echo constant('URL'); ?>logout">Cerrar Sesión</a></li>
    </ul>

    <div id="profile-container">
        <a href="<?php echo constant('URL');?>user">
            <div class="name"><?php echo $user->getName(); ?></div>
            <div class="photo">
                <?php  if($user->getPhoto() == ''){?>
                        <i class="material-icons">account_circle</i>
                <?php }else{ ?>
                        <img src="<?php echo constant('URL'); ?>public/img/photos/<?php echo $user->getPhoto() ?>" width="32" />
                <?php }  ?>
            </div>
        </a>
        <div id="submenu">
            <ul>
                <li><a href="<?php echo constant('URL'); ?>user">Ver perfil</a></li>
                <li class='divisor'></li>
                <li><a href="<?php echo constant('URL'); ?>logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</div>
