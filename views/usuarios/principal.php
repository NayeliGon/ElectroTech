<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cotizador de Productos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<?php require '../../includes/_header.php' ?>
<body>
    <h1>Cotizador de Productos</h1>

    <!-- Formulario de Datos del Cliente -->
    <form action="generar_cotizacion.php" method="post">
        <h2>Datos del Cliente</h2>
        <label for="nombre">Represetante:</label>
        <input type="text" name="nombre" required> 
        
		<label for="nit">Empresa:</label>
        <input type="email" name="correo" required><br>


        <label for="correo">Correo Electrónico:</label>
        <input type="email" name="correo" required><br>

        <!-- Agrega más campos para los datos del cliente si es necesario -->

        <h2>Seleccionar Productos</h2>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productoModal">Seleccionar Productos</button>

        <!-- Campo oculto para almacenar los productos seleccionados -->
        <input type="hidden" name="productosSeleccionados" id="productosSeleccionados">

        <input type="submit" value="Generar Cotización">
    </form>

    <!-- Ventana modal para seleccionar productos -->
    <div class="modal fade" id="productoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccionar Productos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Buscador de productos -->
                    <input type="text" id="searchProduct" class="form-control" placeholder="Buscar productos">

                    <!-- Tabla para mostrar productos -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Seleccionar</th>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <!-- Agrega más columnas según tu base de datos -->
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se cargarán los productos desde la base de datos -->
                            <?php
                            $conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");
                            if ($conexion) {
                                $query = "SELECT id, nombre, precio FROM productos";
                                $result = mysqli_query($conexion, $query);

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo '<td><input type="checkbox" value="' . $row['id'] . '"></td>';
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['nombre'] . "</td>";
                                    echo "<td>" . $row['precio'] . "</td>";
                                    // Agrega más columnas según tu base de datos
                                    echo "</tr>";
                                }

                                mysqli_close($conexion);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="agregarProductos">Agregar Productos</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Buscar productos en tiempo real
            $("#searchProduct").on("input", function() {
                var searchText = $(this).val();
                searchProducts(searchText);
            });

            // Manejar el botón "Agregar Productos" en la ventana modal
            $("#agregarProductos").click(function() {
                // Recopilar los productos seleccionados en la ventana modal
                var productosSeleccionados = [];
                $("#productoModal input[type=checkbox]:checked").each(function() {
                    productosSeleccionados.push($(this).val());
                });
                // Actualizar el campo oculto con los productos seleccionados
                $("#productosSeleccionados").val(productosSeleccionados.join(', '));
                // Cerrar la ventana modal
                $("#productoModal").modal('hide');
            });
        });

        // Función para buscar productos en tiempo real
        function searchProducts(searchText) {
            $.ajax({
                url: 'buscar_productos.php', // Ruta a tu script PHP para buscar productos
                method: 'POST',
                data: { searchText: searchText },
                success: function(data) {
                    // Actualizar la tabla con los resultados de la búsqueda
                    $("table tbody").html(data);
                }
            });
        }
    </script>
  


</body>

<br>
<br>
<?php require '../../includes/_footer.php' ?>
</html>
