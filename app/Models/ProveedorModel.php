<?php
class ProveedorModel {
    private $conexion;

    public function __construct($conexion) {
        $this->conexion = $conexion;
    
    mysqli_select_db($this->conexion, 'modulo_compras');
    }

    public function insertarProveedor($nombre_empresa, $direccion, $correo_electronico, $telefono, $categoria_productos,$descripcion, $precio, $archivo) {
        // Escapar los datos para evitar inyecciones SQL
        $nombre_empresa = mysqli_real_escape_string($this->conexion, $nombre_empresa);
        $direccion = mysqli_real_escape_string($this->conexion, $direccion);
        $correo_electronico = mysqli_real_escape_string($this->conexion, $correo_electronico);
        $telefono = mysqli_real_escape_string($this->conexion, $telefono);
        $categoria_productos = mysqli_real_escape_string($this->conexion, $categoria_productos);
        $descripcion = mysqli_real_escape_string($this->conexion, $descripcion);
        $precio = mysqli_real_escape_string($this->conexion, $precio);

        // Procesar la imagen
        $nombreArchivo = $this->procesarImagen($archivo);

        // Preparar la consulta SQL
        $consulta = "INSERT INTO proveedores (nombre_empresa, direccion, correo_electronico, telefono, categoria_productos,descripcion, precio, archivo) VALUES ('$nombre_empresa', '$direccion', '$correo_electronico', '$telefono', '$categoria_productos','$descripcion', '$precio', '$nombreArchivo')";

        // Ejecutar la consulta
        if (mysqli_query($this->conexion, $consulta)) {
            return true; // La inserción fue exitosa
        } else {
            return false; // Hubo un error en la inserción
        }
    }

    private function procesarImagen($imagen) {
        $destino = __DIR__ . '/../public/img/proveedores/';
        $nombreImagen = basename($imagen['name']);
        $rutaImagen = $destino . $nombreImagen;
        move_uploaded_file($imagen['tmp_name'], $rutaImagen);
        return $nombreImagen;
    }
}
?>
