$(document).ready(function() {
    var clienteSeleccionado = null; // Variable global para almacenar el cliente seleccionado

    // Manejar la búsqueda del cliente
    $("#buscarCliente").click(function() {
        var searchText = $("#clienteBusqueda").val();
        searchClient(searchText);
    });

    // Manejar la selección del cliente
    $("#seleccionarCliente").click(function() {
        // Obtener los datos del cliente seleccionado desde la tabla
        var selectedCliente = obtenerClienteSeleccionado();
        if (selectedCliente) {
            clienteSeleccionado = selectedCliente; // Almacena el cliente seleccionado
            // Llenar los campos de datos del cliente en el formulario principal
            $("#clienteNombre").val(clienteSeleccionado.representante);
            $("#clienteEmpresa").val(clienteSeleccionado.empresa);
            $("#clienteCorreo").val(clienteSeleccionado.correo);
            $("#clienteTelefono").val(clienteSeleccionado.telefono);
        }
        // Cerrar la ventana modal
        $("#clienteModal").modal('hide');
    });

    // Función para buscar al cliente en tiempo real
    function searchClient(searchText) {
        $.ajax({
            url: 'buscar_clientes.php',
            method: 'POST',
            data: { searchText: searchText },
            success: function(data) {
                var resultados = JSON.parse(data);

                // Llena la tabla con los resultados de la búsqueda
                var tableBody = $("table tbody");
                tableBody.empty();
                for (var i = 0; i < resultados.length; i++) {
                    var row = resultados[i];
                    tableBody.append(
                        "<tr>" +
                        "<td><input type='radio' name='clienteSeleccionado' value='" + i + "'></td>" +
                        "<td>" + row.representante + "</td>" +
                        "<td>" + row.empresa + "</td>" +
                        "<td>" + row.correo + "</td>" +
                        "<td>" + row.telefono + "</td>" +
                        "</tr>"
                    );
                }
            }
        });
    }

    // Función para obtener el cliente seleccionado
    function obtenerClienteSeleccionado() {
        var selectedRow = $("input[name='clienteSeleccionado']:checked");
        if (selectedRow.length > 0) {
            var index = selectedRow.val();
            var resultados = JSON.parse(data); // Supongo que los resultados deberían ser obtenidos aquí
            return resultados[index];
        }
        return null;
    }

    $("#siguiente").click(function() {
        // Realizar una solicitud AJAX para obtener los datos del cliente desde "clientes.php"
        $.ajax({
            type: "GET",
            url: "principal.php",
            dataType: "json",
            success: function(data) {
                // Llena los datos del cliente en el modal
                $("#representanteModal").text(data.representante);
                $("#empresaModal").text(data.empresa);
                $("#telefonoModal").text(data.telefono);
                $("#correoModal").text(data.correo);
    
                // Muestra la ventana emergente (modal)
                $("#cotizacionModal").show();
            },
          
        });
        
        $(document).ready(function() {
            $("#siguiente").click(function() {
                window.location.href = "sproductos.php";
            });
        });
        
    });
});
