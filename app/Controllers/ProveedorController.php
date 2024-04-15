<?php
require_once __DIR__ . '/../Models/ProveedorModel.php';
require_once __DIR__ . '/../Config/db.php';

// Verifica si se ha presionado el botón de guardar
if(isset($_POST['boton'])) {
    // Configura la conexión a la base de datos (puedes cambiar estos valores según tu configuración)


    $conexion = mysqli_connect($host,$username,$password) ;

    // Verifica si la conexión es exitosa
    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Crea una instancia del modelo
    $modelo = new ProveedorModel($conexion);

    // Captura los datos enviados por el formulario
    $nombre_empresa = $_POST['nombre_empresa'];
    $direccion = $_POST['direccion'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $categoria_productos = $_POST['categoria_productos'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $archivo = $_FILES['archivo'];

    // Inserta el proveedor usando el método correspondiente del modelo
    $resultado = $modelo->insertarProveedor($nombre_empresa, $direccion, $correo_electronico, $telefono, $categoria_productos, $descripcion,$precio, $archivo);

    // Verifica si la inserción fue exitosa
    if ($resultado) {
        // Redirecciona al usuario a la página principal con un mensaje de éxito
        header("Location: create.php?da=2");
    } else {
        // En caso de error, muestra un mensaje al usuario
        echo "Error al insertar el proveedor.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
}
?>
