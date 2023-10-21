<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Recibir el texto de búsqueda desde el formulario
if (isset($_POST['searchText'])) {
    $searchText = mysqli_real_escape_string($conexion, $_POST['searchText']);

    // Realizar la consulta para buscar productos en la tabla 'productos'
    $query = "SELECT nombre, descripcion, precio FROM productos WHERE 
        nombre LIKE '%$searchText%' OR descripcion LIKE '%$searchText%'";

    $result = mysqli_query($conexion, $query);
    
    if ($result) {
        $productos = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $productos[] = $row;
        }

        // Devolver los resultados como JSON
        echo json_encode($productos);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
} else {
    echo "No se proporcionó texto de búsqueda.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
