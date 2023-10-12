<!DOCTYPE html>
<html>
<head>
    <title>Listado de Productos</title>
</head>
<body>
    <h2>Listado de Productos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
        </tr>
        <?php
        include('conexion.php'); // Incluye el archivo de conexión

        // Consulta para obtener los productos
        $sql = "SELECT * FROM productos";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>" . $row['precio'] . "</td>";
                echo "<td><img src='data:image/jpeg;base64," . base64_encode($row['imagen']) . "' width='100' height='100'></td>";
                echo "</tr>";
            }
        } else {
            echo "No se encontraron productos.";
        }

        $conexion->close();
        ?>
    </table>
</body>
</html>
