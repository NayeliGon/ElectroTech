<!DOCTYPE html>
<html lang="es">
<?php require '../../includes/_header.php' ?>
<head>
    <meta charset="UTF-8">
    <title>Búsqueda y Selección de Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
    <style>
        /* CSS para el modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px; /* Limita el ancho máximo del modal */
        }

        .close {
            color: #aaa;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>
<body class="container-fluid p-0">
    <div class="row">
        <div class="col-md-6 offset-md-3">
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
        <div class="col-md-6 offset-md-3">
            <h2> Productos Seleccionados:   </h2>
            <ul id="productosSeleccionados" class="list-group">
            </ul>
            <br>
            <br>
            <button id="guardarSeleccion" class="btn btn-success">Guardar Selección</button>
        </div>
    </div>

    <div id="cotizacionModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Cotización</h2>
            <p>Fecha: <span id="fechaCotizacion"></span></p>
            <p>Datos del Cliente:</p>
            <p>Nombre: <span id="clienteNombreModal"></span></p>
            <p>Empresa: <span id="clienteEmpresaModal"></span></p>
            <p>Correo: <span id="clienteCorreoModal"></span></p>
            <p>Teléfono: <span id="clienteTelefonoModal"></span></p>
            <p>Es un placer para nosotros presentarle nuestra cotización para los productos/servicios que usted ha solicitado. En ElectroTech, nos esforzamos por ofrecer soluciones de alta calidad que satisfagan sus necesidades.</p>
            <h3>Productos Seleccionados:</h3>
            <ul id="productosCotizados">
            </ul>
            <p>Despedida: [Agrega aquí tu despedida]</p>

            <!-- Botones para descargar en PDF y enviar por correo -->
            <button id="descargarPDF" class="btn btn-primary">Descargar en PDF</button>
            <button id="enviarCorreo" class="btn btn-success">Enviar por Correo</button>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

</body>
<?php require '../../includes/_footer.php'; ?>
</html>
