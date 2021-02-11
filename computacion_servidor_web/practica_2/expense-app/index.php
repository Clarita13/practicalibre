<?php
/*Proyecto de Canastilla de gastos en productos: Planteamiento de los presupuestos gastados en la compra de productos de la canasta basica */
/*Importacion de librerias*/
require_once 'libs/database.php';
require_once 'libs/messages.php';
require_once 'libs/controller.php';
require_once 'libs/view.php';
require_once 'libs/model.php';
require_once 'libs/app.php';
/*Importacion de clases de objeto*/
require_once 'classes/session.php';
require_once 'classes/sessionController.php';
require_once 'config/config.php';
/*Importacion de modelos de los controladores*/
include_once 'models/usermodel.php';
include_once 'models/expensesmodel.php';
include_once "models/categoriesmodel.php";
include_once "models/joinexpensescategoriesmodel.php";
/* Creacion de objeto de App, para el manejo del flujo */
$app = new App();

?>