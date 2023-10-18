<!DOCTYPE html>
<html lang="es">
<?php require '../../includes/_header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title>Cotizador de Productos - Buscar Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Buscar Productos</h1>

    <!-- Formulario de búsqueda de productos -->
    <div class="form-group">
        <label for="productoBusqueda">Buscar Productos por nombre, descripción, etc.:</label>
        <input type="text" class="form-control" id="productoBusqueda" placeholder="Ejemplo: Producto A, Descripción X, etc.">
    </div>
    <button type="button" class="btn btn-primary" id="buscarProductos">Buscar Productos</button>

    <!-- Tabla para mostrar resultados de la búsqueda de productos -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Seleccionar</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aquí se cargarán los resultados de la búsqueda de productos -->
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="productsearch.js"></script>
</body>
</html>
