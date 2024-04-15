<?php
require_once('Config/db.php');
require_once('routes.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Modulo de AUGE compras.</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="Public/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>


<div class="container">
   
<!-- Logo o nuestra Imagen -->
<div class="logo-container">
        <img src="public/img/auge2.jpeg" width="500" alt="Logo del auge_compras.">
    </div>

   
<!-- Formulario de Login -->
<form action="main.php" method="POST" class="form-background" id="loginForm">
    <h2><i class="fas fa-key"></i> Modulo  compras.</h2> 
    <label for="correo_electronico"><i class="fa fa-envelope"></i>Correo Electrónico:</label>
        <input type="email" id="correo_electronico" name="correo_electronico" required>


    <label for="contrasena"><i class="fas fa-lock"></i> Contraseña:</label>
    <input type="password" id="contrasena" name="contrasena" required>

    <input type="submit" name="submit_login" value="Iniciar Sesión">

    <!-- Enlace para recuperar contraseña -->
    <a href="Views/auth/recuperacion_contraseña.php"><i class="fas fa-question-circle"></i> ¿Olvidaste tu contraseña?</a>

    <!-- Enlace para mostrar el formulario de registro -->
    <p>¿No tienes una cuenta? <a href="#" id="showRegister"><i class="fas fa-user-plus"></i> Regístrate aquí</a></p>
</form>



<!-- Formulario de Registro -->
<form action="main.php" method="POST" id="registerForm" style="display: none;" class="form-background">
    <h2><i class="fas fa-user-plus"></i> Registrarse</h2>
    <label for="nombre_usuario"><i class="fas fa-user"></i> Nombre:</label>
    <input type="text" id="nombre_usuario" name="nombre_usuario" required>

    <label for="apellido_usuario"><i class="fas fa-user"></i> Apellido:</label>
    <input type="text" id="apellido_usuario" name="apellido_usuario" required>

    <label for="correo_electronico_registro"><i class="fas fa-envelope"></i> Correo Electrónico:</label>
    <input type="email" id="correo_electronico" name="correo_electronico" required>

    <label for="contrasena_registro">
    <i class="fas fa-lock"></i> Contraseña:
</label>
<div class="password-input-container">
    <input type="password" id="contrasena" name="contrasena" required>
    <i class="fas fa-eye-slash password-toggle-icon" onclick="togglePasswordVisibility(this)"></i>
</div>

    <label for="tipo_usuario"><i class="fas fa-users"></i> Tipo de Usuario:</label>
    <select id="tipo_usuario" name="tipo_usuario" required>
        <option value="administrador">Administrador</option>
        <option value="cliente">Cliente</option>
        <option value="cliente">Usuario</option>
    </select>

    <input type="submit" name="submit_registro" value="Registrarse">

     <!-- Enlace para regresar al formulario de inicio de sesión -->
    <a href="index.php">Regresar al inicio de sesión</a>

</form>

      

<script src="public/js/script.js"></script>


</body>
</html>


