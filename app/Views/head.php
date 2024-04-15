<?php

require_once('Config/db.php');
require_once('Controllers/SentenciaController.php');


//echo $_SESSION['usuario'];
if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
    $con_usuario = "SELECT * FROM usuarios WHERE id_usuario = ".$_SESSION['usuario'];
    $resultado = new Sentencia($con_usuario, $conexion, $sentencia, $resultado,'usuarios');
    $resultado->ejecutarConsulta();
    
    $usuario = mysqli_fetch_array($resultado->resultado);
} else {
   //header("Location: index.php?da=1");
}
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
    <link href="public/css/style.css" type="text/css" rel="stylesheet">
   <!-- Agrega este script en el encabezado de tu página -->
<!-- Incluimos el CSS de CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

</head>
<body>


    <div id="cerrar">
        <h3>Bienvenido: <?php echo $username; ?></h3>
        <!-- Enlace para cerrar sesión -->
        <a href="Config/cerrar_session.php">Cerrar Sesión</a>
    </div>
    <!-- Aquí puedes incluir tu menú de navegación si lo deseas -->
</div>

<!-- Otro contenido de tu página aquí -->

</body>
</html>