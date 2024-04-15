
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Página</title>
    <link href="public/css/style.css" rel="stylesheet"> 
    <style>
        /* Estilos CSS adicionales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .title {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="title">¡Registro exitoso!</h2>
        <p>Se ha enviado un mensaje de confirmación a tu correo electrónico. Por favor, verifica tu correo para completar el registro.</p>
        <a href="/modulo_compras/app/index.php" class="button">Volver a Inicio</a>
    </div>
</body>
</html>
