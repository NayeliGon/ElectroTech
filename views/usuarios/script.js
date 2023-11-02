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
                    actualizarListaProductosSeleccionados();
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

    // Manejar clic en el botón "Eliminar" de productos seleccionados
    $("#productosSeleccionados").on("click", "button.eliminarProducto", function() {
        var productoId = $(this).data("id");
        productosSeleccionados.splice(productoId, 1); // Elimina el producto del array
        $(this).closest("li").remove(); // Elimina la entrada de la lista visual
    });

    // Función para actualizar la lista visual de productos seleccionados
    function actualizarListaProductosSeleccionados() {
        $("#productosSeleccionados").empty();
        for (var i = 0; i < productosSeleccionados.length; i++) {
            var producto = productosSeleccionados[i];
            $("#productosSeleccionados").append("<li>" + producto.nombre + " - Cantidad: " + producto.cantidad + " - Total: " + producto.total + " <button class='eliminarProducto' data-id='" + i + "'>Eliminar</button></li>");
        }
    }

    // Abrir y llenar la ventana emergente al hacer clic en "Guardar Selección"
    $("#guardarSeleccion").click(function() {
        var fecha = new Date().toLocaleDateString();
        var mensaje = "Gracias por su selección. Esperamos su respuesta pronto.";
        var listaProductos = "";
        for (var i = 0; i < productosSeleccionados.length; i++) {
            var producto = productosSeleccionados[i];
            listaProductos += "<li>" + producto.nombre + " - Cantidad: " + producto.cantidad + " - Total: " + producto.total + "</li>";
        }
        $("#fechaCotizacion").text(fecha);
        $("#productosCotizados").html(listaProductos);

      

        // Muestra la ventana emergente
        $("#cotizacionModal").show();
    });

    // Cierra la ventana emergente al hacer clic en la "x"
    $(".close").click(function() {
        $("#cotizacionModal").hide();
    });

  
});
