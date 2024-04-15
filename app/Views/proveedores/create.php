
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
    
</head>
<body>

<style>
.panel {
            display: flex;
            justify-content: space-between;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .column {
            width: 48%;
        }

        
     
.nav {
    display: flex;
    align-items: center;
    float: left;
    margin-left: 20px; 
    text-align: none;
}

.nav a {
    color: rgb(33, 138, 170);
    text-decoration: none;
    padding: 10px;
    font-size: 16px;
    margin-left: 10px;
}

.nav a:hover {
    background-color: rgb(10, 18, 125);
    color: #f7f0f0;
}

.nav .active {
    color: #0f6146;
}



        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="panel">
        <div class="column">
            <h2>Módulo de Compras</h2>
            <ul class="nav">
                <li><i class="fas fa-plus icon"></i><a href="create.php">Nuevo Proveedor</a></li>
                <li><i class="fas fa-edit icon"></i><a href="list.php">Insertar Proveedor</a></li>
                <li><i class="fas fa-trash-alt icon"></i><a href="delete.php">Eliminar Proveedor</a></li>
            </ul>
        </div>
        <div class="column">
            <button class="btn" name="botonc" type="button" onclick="document.location='list.php?da=2'">
                <i class="fas fa-plus"></i> Ingresar nuevo proveedor
            </button>
        </div>
    </div>

    <table class="table">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre Empresa</th>
      <th>Dirección</th>
      <th>Email</th>
      <th>Teléfono</th>
      <th>Categorías Productos</th>
      <th>Descripción</th>
      <th>Precio</th>
      <th>Archivo </th>
      <th></th>
      <th></th>
    </tr>
		
    </thead>
    <tbody>
        <?php
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'modulo_compras';

        // Crear la conexión a la base de datos
        $conexion = new mysqli($host, $username, $password, $dbname);

        // Verificar si hay errores de conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta utilizando MySQLi
        $consulta = "SELECT * FROM proveedores ORDER BY  id_proveedor";
        $resultados = $conexion->query($consulta);

        // Comprobación de errores en la ejecución de la consulta
        if (!$resultados) {
            die("Error al ejecutar la consulta: " . $conexion->error);
        }

        // Iterar sobre los resultados y mostrarlos
        while ($proveedor = $resultados->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo htmlspecialchars($proveedor['id_proveedor']); ?></td>
                <td><?php echo htmlspecialchars($proveedor['nombre_empresa']); ?></td>
                <td><?php echo htmlspecialchars($proveedor['direccion']); ?></td>
                <td><?php echo htmlspecialchars($proveedor['correo_electronico']); ?></td>
                <td><?php echo htmlspecialchars($proveedor['telefono']); ?></td>
                <td><?php echo htmlspecialchars($proveedor['categoria_productos']); ?></td>
                <td><?php echo htmlspecialchars($proveedor['descripcion']); ?></td>
                <td>$ <?php echo number_format($proveedor['precio'], 2, ',', '.'); ?></td>
                <td><img src="../../public/img/proveedores/<?php echo $proveedor['archivo']; ?>" width="100" alt=""></td>

                <td>
               
                <td>
                <a href="edit.php?da=3&lla=<?php echo $proveedor['id_proveedor']; ?>" class="btn btn-primary">
                          <i class="fas fa-edit"></i> Editar
</a>
<a href="delete.php?da=4&lla=<?php echo $proveedor['id_proveedor']; ?>" class="btn btn-primary">
                          <i class="fas fa-edit"></i> Borrar
</a>



<script>
$(document).ready(function() {
    $(".delete-btn").click(function() {
        var id = $(this).data("id");
        if (confirm("¿Estás seguro de que deseas borrar este elemento?")) {
            $.ajax({
                type: "POST",
                url: "borrar_elemento.php",
                data: { id: id },
                success: function(response) {
                    // Manejar la respuesta del servidor, como actualizar la interfaz de usuario
                    // Puedes eliminar la fila de la tabla correspondiente si se elimina correctamente
                }
            });
        }
    });
});
</script
            </tr>
            <?php
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </tbody>
</table>




</body>
</html>