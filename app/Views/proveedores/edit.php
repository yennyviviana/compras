<?php

require_once("../../Controllers/ProveedorController.php");
require_once("../../Models/ProveedorModel.php");

// Validar y obtener el valor de 'da' y 'lla' de $_GET
$llave = isset($_GET['lla']) ? intval($_GET['lla']) : 0; 
if ($llave <= 0) {
    exit("Error: 'lla' debe ser un valor numérico válido.");
}

// Conexión a la base de datos (asumiendo que ya está configurada)
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

// Verificar si se ha enviado un formulario para actualizar el proveedor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre_empresa = $_POST['nombre_empresa'];
    $direccion = $_POST['direccion'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $categoria_productos = $_POST['categoria_productos'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $archivo = $_FILES['archivo'];

    // Crear una instancia del modelo de proveedor
    $proveedorModel = new ProveedorModel($conexion);

    try {
        // Actualizar el proveedor en la base de datos
        $resultado = $proveedorModel->actualizarProveedor($llave, $nombre_empresa, $direccion, $correo_electronico, $telefono, $categoria_productos, $descripcion, $precio, $archivo);
        
        if ($resultado) {
            echo "Proveedor actualizado correctamente.";
        } else {
            echo "Error al actualizar el proveedor.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Obtener los datos del proveedor para mostrar en el formulario
$query = "SELECT * FROM proveedores WHERE id_proveedor = ?";
$stmt = $conexion->prepare($query);

if ($stmt) {
    // Vincular el parámetro de 'id_proveedor' a la consulta preparada
    $stmt->bind_param("i", $llave);

    // Ejecutar la consulta preparada
    $stmt->execute();

    // Obtener el resultado de la consulta
    $result = $stmt->get_result();

    if ($result) {
        // Recuperar los datos del proveedor como un array asociativo
        $proveedor = $result->fetch_assoc();

        // Cerrar la consulta preparada
        $stmt->close();
    } else {
        // Manejar el caso en que no se pudo obtener el resultado de la consulta
        exit("Error al ejecutar la consulta.");
    }
} else {
    // Manejar el caso en que la consulta preparada no se pudo preparar
    exit("Error al preparar la consulta.");
}

// No necesitamos manejar el archivo aquí, ya que lo estamos actualizando por separado en el bloque POST
?>


<!-- Código HTML del formulario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar a Compras</title>
    <!-- Agregamos los estilos de Bootstrap para los iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Incluimos el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Incluimos el CSS de CKEditor -->
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <style>
        #form-background {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        /* Ajuste de estilos para el editor CKEditor */
        .ck-editor__editable {
            min-height: 150px;
        }
    </style>
</head>
<body>

<div class="container">
    <div id="form-background">
        <form action="edit.php?lla=<?php echo $llave; ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="nombre_empresa">Nombre de la empresa</label>
                <input type="text" id="nombre_empresa" name="nombre_empresa" value="<?php echo $proveedor['nombre_empresa']; ?>" class="form-control" placeholder="Ingresar nombre proveedor" required>
                <div class="invalid-feedback">Por favor ingrese el nombre del proveedor.</div>
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $proveedor['direccion']; ?>" class="form-control" placeholder="Ingresar direccion" required>
                <div class="invalid-feedback">Por favor ingrese la direccion.</div>
            </div>

            <div class="form-group">
                <label for="correo_electronico">Correo electrónico</label>
                <input type="email" id="correo_electronico" name="correo_electronico" value="<?php echo $proveedor['correo_electronico']; ?>" class="form-control" placeholder="Ingresar email" required>
                <div class="invalid-feedback">Por favor ingrese el email.</div>
            </div>

            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $proveedor['telefono']; ?>" class="form-control" placeholder="Ingresar telefono" required>
                <div class="invalid-feedback">Por favor ingrese el telefono.</div>
            </div>

            <label for="categoria_productos"><i class="fas fa-users"></i> Categoria:</label>
            <select id="categoria_productos" name="categoria_productos" required class="form-control">
                <option value="producto 1" <?php if ($proveedor['categoria_productos'] == 'producto 1') echo 'selected'; ?>>Electrodomesticos</option>
                <option value="producto 2" <?php if ($proveedor['categoria_productos'] == 'producto 2') echo 'selected'; ?>>Tecnologia</option>
                <option value="producto 3" <?php if ($proveedor['categoria_productos'] == 'producto 3') echo 'selected'; ?>>Hogar</option>
                <option value="producto 4" <?php if ($proveedor['categoria_productos'] == 'producto 4') echo 'selected'; ?>>Oficina</option>
                <option value="producto 5" <?php if ($proveedor['categoria_productos'] == 'producto 5') echo 'selected'; ?>>Otros</option>
            </select>

            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <textarea id="descripcion" name="descripcion" class="form-control" placeholder="Descripcion" required><?php echo $proveedor['descripcion']; ?></textarea>
                <div class="invalid-feedback">Por favor ingrese la descripcion.</div>
            </div>

            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" value="<?php echo $proveedor['precio']; ?>" class="form-control" placeholder="Precio" required>
                <div class="invalid-feedback">Por favor ingrese el precio</div>
            </div>

            <div class="form-group">
                <label for="archivo">Archivo</label>
                <input type="file" id="archivo" name="archivo" class="form-control-file">
                <div class="invalid-feedback">Por favor seleccione el archivo.</div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>

<script>
    // Inicializamos CKEditor en el textarea con ID "descripcion"
    CKEDITOR.replace('descripcion');
</script>
</body>
</html>