<!DOCTYPE html>
<html lang="es">
<?php require '../../includes/_header.php'; ?>
<head>
    <meta charset="UTF-8">
    <title>Cotizador de Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Cotizador de Productos</h1>

        <div class="container">
            <form action="sproductos.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Datos Cliente</h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#clienteModal">
                            <i class="fas fa-search"></i> Buscar Cliente
                        </button>
                    </div>
                     <div class="col-md-6 text-right">
                            <button id="siguiente" class="btn btn-primary">
                              <i class="fas fa-arrow-right"></i> Siguiente
                            </button>
                        </div>

                </div>

                <div class="form-group">
                    <label for="nombre">Representante:</label>
                    <input type="text" class="form-control" name="nombre" id="clienteNombre" required>
                </div>

                <div class="form-group">
                    <label for="empresa">Empresa:</label>
                    <input type="text" class="form-control" name="empresa" id="clienteEmpresa" required>
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" class="form-control" name="correo" id="clienteCorreo" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" id="clienteTelefono" required>
                </div>
            </form>
        </div>
    </div>

   <!-- Ventana modal para buscar y seleccionar al cliente -->
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="clienteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="clienteModalLabel">Buscar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario para buscar al cliente -->
                <div class="form-group">
                    <label for="clienteBusqueda">Buscar Cliente por nombre, empresa o correo:</label>
                    <input type="text" class="form-control" id="clienteBusqueda" placeholder="Ejemplo: Juan, ABC Company, correo@ejemplo.com">
                </div>
                <button type="button" class="btn btn-primary" id="buscarCliente">Buscar</button>

                <!-- Tabla para mostrar resultados de la búsqueda -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Seleccionar</th>
                            <th>Representante</th>
                            <th>Empresa</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí se cargarán los resultados de la búsqueda -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="seleccionarCliente">Seleccionar Cliente</button>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../../js/clientesearch.js"></script>
    <script>
        // Manejar la selección del cliente
        $("#seleccionarCliente").click(function() {
            // Obtener los datos del cliente seleccionado desde la tabla en la ventana modal
            var selectedClienteRow = $("input[name='clienteSeleccionado']:checked").closest("tr");
            
            // Obtener los valores de los campos de cliente desde la fila seleccionada
            var representante = selectedClienteRow.find("td:eq(1)").text();
            var empresa = selectedClienteRow.find("td:eq(2)").text();
            var correo = selectedClienteRow.find("td:eq(3)").text();
            var telefono= selectedClienteRow.find("td:eq(4)").text();

            // Llenar los campos de datos del cliente en el formulario principal
            $("#clienteNombre").val(representante);
            $("#clienteEmpresa").val(empresa);
            $("#clienteCorreo").val(correo);
            $("#clienteTelefono").val(telefono);
            
            // Cerrar la ventana modal
            $("#clienteModal").modal('hide');
        });
    </script>
  
    <?php require '../../includes/_footer.php'; ?>
</body>
</html>
