<?php
require_once('routes.php');
require_once('Models/UserModel.php');
require_once('Controllers/UserController.php');
require_once(__DIR__ . '/Views/auth/registro_exitoso.php');
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

        case 'producto':
            switch ($dato) {
                case 1: // Crear producto
                    require_once('Views/productos/create.php');
                    break;
                case 2: // Listar productos
                    require_once('Views/productos/list.php');
                    break;
                case 3: // Editar producto
                    require_once('Views/productos/edit.php');
                    break;
                case 4: // Eliminar producto
                    require_once('Views/productos/delete.php');
                    break;
                default:
                    echo "Acción no reconocida para producto.";
            }
            break;
    
            default:
            //echo "Entidad no reconocida.";
    }
    
    
    mysqli_close($conexion);
    ?>



