
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

<!-- Contenido de la página -->
<div class="contenido">
    <h1>Página Actual</h1>
    <!-- Tu contenido aquí -->
    <p>Saliste del Modulo auge</p>
    
    <!-- Botón para volver al índice -->
<a href="/modulo_compras/app" class="boton-volver">Volver al Índice</a>

</div>

</body>
</html>


<?php


session_start();

$_SESSION['usuario']="";
session_destroy();

header("Location../index.php");

?>
