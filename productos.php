<?php
include('conexion.php'); // Incluye el archivo de conexión

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagenTmp = file_get_contents($_FILES['imagen']['tmp_name']);

    $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssdb", $nombre, $descripcion, $precio, $imagenTmp);

    if ($stmt->execute()) {
        echo "Producto registrado con éxito.";
    } else {
        echo "Error al registrar el producto: " . $stmt->error;
    }

    $stmt->close();
}

$conexion->close();
?>
