
<?php

require_once ("../../Controllers/ProveedorController.php");
require_once("../../Models/ProveedorModel.php");

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD para Módulo de Compras</title>
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
            <form action="list.php?da=2" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="nombre_empresa">Nombre de la empresa</label>
                    <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control" required placeholder="Ingresar nombre proveedor">
                    <div class="invalid-feedback">Por favor ingrese el nombre del proveedor.</div>
                </div>

                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" required placeholder="Ingresar direccion">
                    <div class="invalid-feedback">Por favor ingrese la direccion.</div>
                </div>

                <div class="form-group">
                    <label for="correo_electronico">Correo electrónico</label>
                    <input type="email" id="correo_electronico" name="correo_electronico" class="form-control" required placeholder="Ingresar email">
                    <div class="invalid-feedback">Por favor ingrese el email.</div>
                </div>

                <div class="form-group">
                    <label for="tel">Telefono</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" required placeholder="Ingresar telefono">
                    <div class="invalid-feedback">Por favor ingrese telefono.</div>
                </div>

                <label for="categoria_productos"><i class="fas fa-users"></i> Categoria:</label>
                <select id="categoria_productos" name="categoria_productos" required class="form-control">
                    <option value="producto 1">Electrodomesticos</option>
                    <option value="producto 2">Tecnologia</option>
                    <option value="producto 3">Hogar</option>
                    <option value="producto 2">Oficina</option>
                    <option value="producto 3">Otros</option>
                  <!--- mas opciones -->
                </select>

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea id="descripcion" name="descripcion" class="form-control" required placeholder="Descripcion"></textarea>
                    <div class="invalid-feedback">Por favor ingrese la descripcion.</div>
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" class="form-control" required placeholder="Precio">
                    <div class="invalid-feedback">Por favor ingrese el precio</div>
                </div>

                <div class="form-group">
                    <label for="archivo">Archivo</label>
                    <input type="file" id="archivo" name="archivo" class="form-control-file" required>
                    <div class="invalid-feedback">Por favor seleccione el archivo.</div>
                </div>

                <button type="submit" name="boton" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>

    <script>
        // Inicializamos CKEditor en el textarea con ID "descripcion"
        CKEDITOR.replace('descripcion');
    </script>
</body>
</html>
