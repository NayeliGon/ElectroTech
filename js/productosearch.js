// Manejar la búsqueda de productos
$("#buscarProductos").click(function() {
    var searchText = $("#productoBusqueda").val();
    searchProducts(searchText);
});

function searchProducts(searchText) {
    $.ajax({
        url: 'buscar_productos.php', // Ruta al archivo PHP para buscar productos
        method: 'POST',
        data: { searchText: searchText },
        success: function(data) {
            var resultados = JSON.parse(data);

            // Llena la tabla de productos con los resultados de la búsqueda
            var tableBody = $("table tbody");
            tableBody.empty();
            for (var i = 0; i < resultados.length; i++) {
                var row = resultados[i];
                tableBody.append(
                    "<tr>" +
                    "<td><input type='radio' name='productoSeleccionado' value='" + i + "'></td>" +
                    "<td>" + row.id + "</td>" +
                    "<td>" + row.nombre + "</td>" +
                    "<td>" + row.descripcion + "</td>" +
                    "<td><img src='" + row.imagen + "' alt='Foto del producto'></td>" +
                    "<td>" + row.precio + "</td>" +
                    "</tr>"
                );
            }
        }
    });
}
