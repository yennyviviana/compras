<?php
require_once('routes.php');
require_once('Models/UserModel.php');
require_once('Controllers/UserController.php');
//require_once(__DIR__ . '/Views/auth/registro_exitoso.php');
require_once('Views/menu.php');
require_once('Views/head.php');
require_once('dashboard.php');

?>


<?php

$dato = isset($_GET['da']) ? $_GET['da'] : null;

switch($dato) {
    case  1:
        require_once('Views/proveedores/create.php');
        break;
    case  2:
        require_once('Views/proveedores/list.php');
        break;
    case  3:
        require_once('Views/proveedores/edit.php');
        break;
    case  4:
        require_once('Views/proveedores/delete.php');
        break;
}

		

?>





