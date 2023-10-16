<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Recibir el texto de búsqueda desde el formulario
if (isset($_POST['searchText'])) {
    $searchText = mysqli_real_escape_string($conexion, $_POST['searchText']);

    // Realizar la consulta para buscar clientes en la tabla 'clientes'
    $query = "SELECT * FROM clientes WHERE 
        representante LIKE '%$searchText%' OR 
        empresa LIKE '%$searchText%' OR 
        correo LIKE '%$searchText%'";

    $result = mysqli_query($conexion, $query);

    if ($result) {
        $clientes = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $clientes[] = $row;
        }

        // Devolver los resultados como JSON
        echo json_encode($clientes);
    } else {
        echo "Error en la consulta: " . mysqli_error($conexion);
    }
} else {
    echo "No se proporcionó texto de búsqueda.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
