<?php

require_once('Models/UserModel.php');


class  UserController {
    private $UserModel;

    public function __construct($UserModel) {
        $this->UserModel = $UserModel;
    }

    public function mostrarFormularioInicioSesion() {
        // Aquí cargas la vista del formulario de inicio de sesión
        include 'index.php';
    }

    public function iniciarSesion($correo_electronico, $contrasena) {
        // Verificar si el usuario existe en la base de datos
        $usuarioValido = $this->UserModel->validarCredenciales($correo_electronico, $contrasena);
        if ($usuarioValido) {
            // Iniciar sesión y redirigir al usuario a la página principal
            $_SESSION['usuario'] = $correo_electronico; // Guardamos solo el correo electrónico del usuario en la sesión
            echo json_encode(array("success" => true, "message" => "Inicio de sesión exitoso"));
        } else {
            // Devolver un mensaje de error
            echo json_encode(array("success" => false, "message" => "Error: Credenciales inválidas"));
        }
    }
    
    

    public function mostrarFormularioRegistro() {
        // Aquí cargas la vista del formulario de registro
        include 'index.php?';
    }

    public function registrarUsuario ($nombre_usuario, $contrasena, $correo_electronico, $apellido_usuario,  $tipo_usuario) {
        $resultado = $this->UserModel->registrarUsuario ($nombre_usuario, $contrasena, $correo_electronico, $apellido_usuario,  $tipo_usuario) ;
        if ($resultado) {
            // Mostrar mensaje de éxito en la vista de registro
            //echo "Usuario registrado exitosamente.";
        } else {
            // Mostrar mensaje de error en la vista de registro
            echo "Error al registrar usuario.";
        }    }

    public function mostrarFormularioRecuperacionContrasena() {
        // Aquí cargas la vista del formulario de recuperación de contraseña
     include 'Views/auth/recuperar_contrasena.php';
    }

    public function recuperarContrasena($correo_electronico) {
        $resultado = $this->UserModel->recuperarContrasena($correo_electronico);
        if ($resultado) {
            // Mostrar mensaje de éxito en la vista de recuperación de contraseña
            echo "Se ha enviado un correo electrónico con instrucciones para restablecer tu contraseña.";
        } else {
            // Mostrar mensaje de error en la vista de recuperación de contraseña
            echo "Error al enviar correo electrónico de recuperación de contraseña.";
        }
    }
    

    public function mostrarUsuarios() {
        // Verificar si se ha iniciado sesión
        if (!isset($_SESSION['usuario'])) {
            echo "Debe iniciar sesión para ver esta página.";
            return;
        }
    
        // Aquí podrías obtener los usuarios de la base de datos o de cualquier otra fuente de datos
        // Por ahora, simplemente imprimimos un mensaje de ejemplo
        echo "Mostrando lista de usuarios:";
        echo "<ul>";
        echo "<li>Usuario 1</li>";
        echo "<li>Usuario 2</li>";
        echo "<li>Usuario 3</li>";
        echo "</ul>";
    }
}    

    
?>
