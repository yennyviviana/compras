<?php
require_once __DIR__ . '/../Models/ProductoModel.php';
require_once __DIR__ . '/../Config/db.php';

if(isset($_POST['boton'])) {
    $conexion = mysqli_connect($host,$username,$password);

    if (!$conexion) {
        die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    $modelo = new ProductoModel($conexion);

    $nombre = $_POST['nombre'];
    $categoria_productos = $_POST['categoria_productos'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
   

    $resultado = $modelo->insertarProducto($nombre, $descripcion, $precio,$categoria_productos);

    if ($resultado) {
        // Inserción exitosa, redirigir a alguna página o mostrar un mensaje
        header("Location: list.php?da=2");
    } else {
        echo "Error al insertar el producto.";
    }

    mysqli_close($conexion);
}

?>