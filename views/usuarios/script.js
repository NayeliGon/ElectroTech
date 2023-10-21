$(document).ready(function() {
    var productosSeleccionados = []; // Array para almacenar los productos seleccionados

    $("#buscarProducto").click(function() {
        var searchTerm = $("#productoBusqueda").val();

        $.ajax({
            type: "POST",
            url: "buscar_productos.php",
            data: { searchText: searchTerm },
            dataType: "json",
            success: function(data) {
                $("#resultados tbody").empty();

                for (var i = 0; i < data.length; i++) {
                    var producto = data[i];
                    var $row = $("<tr>").append(
                        "<td>" + producto.nombre + "</td>",
                        "<td>" + producto.descripcion + "</td>",
                        "<td>" + producto.precio + "</td>",
                        "<td><input type='number' class='cantidad' value='1'></td>",
                        "<td class='total'>" + producto.precio + "</td>",
                        "<td><button class='seleccionarProducto' data-id='" + i + "'>Seleccionar</button></td>"
                    );
                    $("#resultados tbody").append($row);
                }

                // Manejar clic en el botón "Seleccionar"
                $(".seleccionarProducto").click(function() {
                    var productoId = $(this).data("id");
                    var productoSeleccionado = data[productoId];
                    var $row = $(this).closest("tr");
                    var cantidad = parseInt($row.find(".cantidad").val());
                    var total = cantidad * productoSeleccionado.precio;
                    productoSeleccionado.cantidad = cantidad;
                    productoSeleccionado.total = total;

                    // Actualizar el total en la fila de la tabla
                    $row.find(".total").text(total);

                    productosSeleccionados.push(productoSeleccionado);

                    // Actualizar la lista de productos seleccionados
                    $("#productosSeleccionados").append("<li>" + productoSeleccionado.nombre + " - Cantidad: " + cantidad + " - Total: " + total + "</li>");
                });
            },
            error: function() {
                alert("Hubo un error en la búsqueda de productos.");
            }
        });
    });

    // Manejar cambios en la cantidad
    $("#resultados").on("change", ".cantidad", function() {
        var $row = $(this).closest("tr");
        var cantidad = parseInt($(this).val());
        var precio = parseFloat($row.find("td:eq(2)").text()); // Obtener el precio desde la columna de precio
        var total = cantidad * precio;
        $row.find(".total").text(total);

        // Actualizar la información en el array de productos seleccionados
        var productoId = $row.find(".seleccionarProducto").data("id");
        var productoSeleccionado = productosSeleccionados[productoId];
        productoSeleccionado.cantidad = cantidad;
        productoSeleccionado.total = total;
    });

    // Manejar clic en el botón "Guardar Selección"
    $("#guardarSeleccion").click(function() {
        // Enviar los productos seleccionados al servidor o realizar acciones necesarias
        console.log("Productos seleccionados:", productosSeleccionados);
        // Puedes realizar una solicitud AJAX para guardar estos productos en el servidor si es necesario.
    });
});
