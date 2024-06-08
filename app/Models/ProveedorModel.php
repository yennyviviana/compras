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

    public function actualizarProveedor($id_proveedor, $nombre_empresa, $direccion, $correo_electronico, $telefono, $categoria_productos, $descripcion, $precio, $archivo) {
        // Escapar los datos para evitar inyecciones SQL
        $nombre_empresa = mysqli_real_escape_string($this->conexion, $nombre_empresa);
        $direccion = mysqli_real_escape_string($this->conexion, $direccion);
        $correo_electronico = mysqli_real_escape_string($this->conexion, $correo_electronico);
        $telefono = mysqli_real_escape_string($this->conexion, $telefono);
        $categoria_productos = mysqli_real_escape_string($this->conexion, $categoria_productos);
        $descripcion = mysqli_real_escape_string($this->conexion, $descripcion);
        $precio = mysqli_real_escape_string($this->conexion, $precio);

        // Procesar la nueva imagen si se proporciona
        if ($archivo['error'] === UPLOAD_ERR_OK) {
            $nombreArchivo = $this->procesarImagen($archivo);
            $consulta = "UPDATE proveedores SET nombre_empresa = '$nombre_empresa', direccion = '$direccion', correo_electronico = '$correo_electronico', telefono = '$telefono', categoria_productos = '$categoria_productos', descripcion = '$descripcion', precio = '$precio', archivo = '$nombreArchivo' WHERE id_proveedor = $id_proveedor";
        } else {
            $consulta = "UPDATE proveedores SET nombre_empresa = '$nombre_empresa', direccion = '$direccion', correo_electronico = '$correo_electronico', telefono = '$telefono', categoria_productos = '$categoria_productos', descripcion = '$descripcion', precio = '$precio' WHERE id_proveedor = $id_proveedor";
        }

        // Ejecutar la consulta
        if (mysqli_query($this->conexion, $consulta)) {
            return true; // La actualización fue exitosa
        } else {
            return false; // Hubo un error en la actualización
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