<?php
require_once __DIR__ . '/../Models/ProveedorModel.php';
require_once __DIR__ . '/../Config/db.php';

if(isset($_POST['boton'])) {
    $conexion = mysqli_connect($host,$username,$password);

    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    $modelo = new ProveedorModel($conexion);

    $nombre_empresa = $_POST['nombre_empresa'];
    $direccion = $_POST['direccion'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono = $_POST['telefono'];
    $categoria_productos = $_POST['categoria_productos'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $archivo = $_FILES['archivo'];

    $resultado = $modelo->insertarProveedor($nombre_empresa, $direccion, $correo_electronico, $telefono, $categoria_productos, $descripcion, $precio, $archivo);

    if ($resultado) {
        // Inserción exitosa, redirigir a alguna página o mostrar un mensaje
        header("Location: list.php?da=2");
    } else {
        echo "Error al insertar el proveedor.";
    }

    mysqli_close($conexion);
}

?>