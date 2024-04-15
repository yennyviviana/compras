<div class="form-container">
    <h2>Recuperar Contraseña</h2>
    <form action="" method="POST" class="form">
        <div class="form-group">
            <label for="token">Token:</label>
            <input type="text" id="token" name="token" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nueva_contrasena">Nueva Contraseña:</label>
            <input type="password" id="nueva_contrasena" name="nueva_contrasena" class="form-control" required>
        </div>
        <button type="submit" name="submit_recuperacion" class="btn btn-primary">Cambiar Contraseña</button>
        <div class="container">
        <h2 class="title">¡Cambio exitoso!</h2>
        <p>Se ha cambiado correctamente, inicie session.</p>
        <a href="/modulo_compras/app/index.php" class="button">Volver a Inicio</a>
    </div>
    </form>
</div>
