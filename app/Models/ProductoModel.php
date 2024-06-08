<?php
class ProductoModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    
    mysqli_select_db($this->conexion, 'modulo_compras');
    }

    public function insertarProducto($nombre, $descripcion, $precio, $categoria_productos) {
        // Escapar los datos para evitar inyecciones SQL
        $nombre = mysqli_real_escape_string($this->conexion, $nombre);
        $descripcion = mysqli_real_escape_string($this->conexion, $descripcion);
        $precio = mysqli_real_escape_string($this->conexion, $precio);
        $categoria_productos = mysqli_real_escape_string($this->conexion, $categoria_productos);
    
       // Preparar la consulta SQL
       $consulta = "INSERT INTO productos (nombre, descripcion, precio, categoria_productos) VALUES ('$nombre', '$descripcion', '$precio', '$categoria_productos')";


       // Ejecutar la consulta
       if (mysqli_query($this->conexion, $consulta)) {
           return true; // La inserción fue exitosa
       } else {
           return false; // Hubo un error en la inserción
       }
   }

    public function actualizarProducto($id_producto, $nombre, $descripcion, $precio,$categoria_productos) {
        // Escapar los datos para evitar inyecciones SQL
        $nombre = mysqli_real_escape_string($this->conexion, $nombre);
        $descripcion = mysqli_real_escape_string($this->conexion, $descripcion);
        $precio = mysqli_real_escape_string($this->conexion, $precio);
        $categoria_productos = mysqli_real_escape_string($this->conexion, $categoria_productos);

    
// Consulta de actualización base
$consulta = "UPDATE productos SET nombre = ?,  descripcion = ?, precio = ?, categoria_productos = ";

// Agregar el archivo si está presente
if (!empty($nombreArchivo)) {
    $consulta .= ", archivo = ?";
}
// Consulta de actualización base
$consulta = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, categoria_productos = ?";

// Agregar la condición WHERE
$consulta .= " WHERE id_producto = ?";

// Preparar la consulta
$stmt = mysqli_prepare($this->conexion, $consulta);

// Verificar si la preparación fue exitosa
if ($stmt) {
    // Enlazar parámetros
    mysqli_stmt_bind_param($stmt, "sssssi", $nombre, $descripcion, $precio, $categoria_productos, $id_producto);

    // Ejecutar la consulta preparada
    if (mysqli_stmt_execute($stmt)) {
        return true; // La actualización fue exitosa
    } else {
        return false; // Hubo un error en la actualización
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    // Si la preparación falla, retornar false
    return false;
}

    }
}

?>