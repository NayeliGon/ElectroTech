<!DOCTYPE html>
<html lang="es">
<?php require '../../includes/_header.php' ?>
<head>
    <meta charset="UTF-8">
    <title>Búsqueda y Selección de Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="container-fluid p-0">
    <div class="row">
        <div class="col">
            <h1>Búsqueda de Productos</h1>
            <div class="form-group">
                <input type="text" id="productoBusqueda" class="form-control" placeholder="Ingrese el nombre o descripción del producto">
                <button id="buscarProducto" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2>Resultados:</h2>
            <table id="resultados" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2>Productos Seleccionados:</h2>
            <ul id="productosSeleccionados" class="list-group">
            </ul>
            <button id="guardarSeleccion" class="btn btn-success">Guardar Selección</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
<?php require '../../includes/_footer.php' ?>
</html>
