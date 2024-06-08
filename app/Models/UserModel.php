<?php



class UserModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    }

    // Método para validar las credenciales del usuario al iniciar sesión
    public function validarCredenciales($correo_electronico, $contrasena) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE correo_electronico = ?");
        $stmt->bind_param("s", $correo_electronico);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($resultado && password_verify($contrasena, $resultado['contrasena'])) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function registrarUsuario($nombre_usuario, $contrasena,$correo_electronico, $apellido_usuario,$tipo_usuario) {
        $nombre_usuario = htmlspecialchars($nombre_usuario);
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $correo_electronico = htmlspecialchars($correo_electronico);
        $apellido_usuario = htmlspecialchars($apellido_usuario);
        $tipo_usuario= htmlspecialchars($tipo_usuario);
    
        $sql = "INSERT INTO usuarios (nombre_usuario, contrasena, correo_electronico, apellido_usuario, tipo_usuario) 
        VALUES ('$nombre_usuario', '$contrasena', '$correo_electronico', '$apellido_usuario', '$tipo_usuario')";

         $resultado = mysqli_query($this->conexion, $sql);

return $resultado;
}

    // Método para recuperar la contraseña del usuario (por correo electrónico)
    public function recuperarContrasena($correo_electronico) {
        $token = $this->generarTokenRecuperacion();
        $this->actualizarTokenRecuperacion($correo_electronico, $token);

        $asunto = "Recuperación de contraseña";
        $mensaje = "Haga clic en el siguiente enlace para restablecer su contraseña: https://tudominio.com/restablecer_contrasena.php?token=$token";
        $cabeceras = "From: tuemail@tudominio.com" . "\r\n" .
                     "Reply-To: tuemail@tudominio.com" . "\r\n" .
                     "X-Mailer: PHP/" . phpversion();

        return mail ($asunto, $mensaje, $cabeceras);
    }

    public function generarTokenRecuperacion() {
        return bin2hex(random_bytes(32));
    }

    public function actualizarTokenRecuperacion($correo_electronico, $tokenRecuperacion) {
        $sql = "UPDATE usuarios SET token_recuperacion = :token, fecha_expiracion_token_recuperacion = ADDTIME(NOW(), '1:00:00') WHERE correo_electronico = :correo";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':token', $tokenRecuperacion);
        $stmt->bindParam(':correo', $correo_electronico);
        $stmt->execute();
        $stmt->close();
    }

    public function obtenerUsuarioPorTokenRecuperacion($token) {
        $sql = "SELECT * FROM usuarios WHERE token_recuperacion = :token AND fecha_expiracion_token_recuperacion > NOW()";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $stmt->close();

        return $resultado;
    }
}

?>
