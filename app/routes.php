<?php
// Incluir el modelo y el controlador de usuario
require_once('models/UserModel.php');
require_once('controllers/UserController.php');


//conexion
require_once('Config/db.php');


// Instanciar el modelo y el controlador
$usuarioModelo = new UserModel($conexion);
$userController = new UserController($usuarioModelo);

// Enrutador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit_login'])) {
        $userController->iniciarSesion($_POST['correo_electronico'], $_POST['contrasena']);
    } elseif (isset($_POST['submit_registro'])) {
        // Aquí es donde se registra el usuario, no debería haber otra llamada a registrarUsuario() después de esta
        $userController->registrarUsuario($_POST['nombre_usuario'], $_POST['contrasena'], $_POST['correo_electronico'], $_POST['apellido_usuario'], $_POST['tipo_usuario']);
    } elseif (isset($_POST['submit_recuperacion'])) {
        $userController->recuperarContrasena($_POST['correo_electronico']);
    } elseif (isset($_POST['submit_cambio_contrasena'])) {
        // Aquí puedes manejar el cambio de contraseña si lo deseas
        // Este formulario probablemente estará en una página separada
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['token'])) {
    $userController->mostrarFormularioRecuperacionContrasena($_GET['token']);
}

// Llamada al método iniciarSesion
else if (isset($_POST['submit_login'])) {
    $nombre_usuario= $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $userController->login($correo_electronico, $contrasena);
}

// Código para mostrar usuarios
$usuarios = $userController->mostrarUsuarios();
echo "<pre>";
print_r($usuarios);
echo "</pre>";














?>