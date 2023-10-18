<?php
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $searchText = $_POST["searchText"];

    // Realiza la búsqueda de productos en la base de datos y obtén los resultados
    // Utiliza sentencias preparadas para evitar inyección de SQL
    $sql = "SELECT * FROM productos WHERE nombre LIKE ? OR descripcion LIKE ?";
    
    $stmt = mysqli_prepare($conexion, $sql);
    
    if ($stmt) {
        // Agrega comodines % al valor de búsqueda para que coincida parcialmente
        $searchText = "%" . $searchText . "%";
        
        mysqli_stmt_bind_param($stmt, "ss", $searchText, $searchText);
        
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $productos = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Devuelve los resultados como JSON
            echo json_encode($productos);
        } else {
            // Manejo de errores
            echo json_encode([]);
        }
    } else {
        // Manejo de errores
        echo json_encode([]);
    }
}
?>
