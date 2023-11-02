<?php
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

if (!$conexion) {
    die("Error en la conexión a la base de datos: " . mysqli_connect_error());
}

// Verificar si se ha enviado un formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $representante = $_POST["representante"];
    $empresa = $_POST["empresa"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $sql = "INSERT INTO clientes (representante, empresa, telefono, correo) VALUES ('$representante', '$empresa', '$telefono', '$correo')";
    if (mysqli_query($conexion, $sql)) {
        header("Location: clientes.php?success=1");
        exit();
    } else {
        echo "Error al insertar cliente: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html>
<?php require '../../includes/_header.php' ?>
<head>
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-sm-6 offset-3 mt-5">
            <form method="POST">
                
                <div class="mb-3">
                    <label for="nombre" class="form-label">Representante *</label>
                    <input type="text" id="representante" name="representante" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="empresa" class="form-label">Empresa *</label>
                    <input type="text" id="empresa" name="empresa" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono *</label>
                    <input type="text" id="telefono" name="telefono" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="corrreo" class="form-label">Correo *</label>
                    <input type="email" id="correo" name="correo" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" onclick="limpiarCampos()">Limpiar</button>

                </div>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Representante</th>
                    <th>Empresa</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta para obtener los registros de la tabla "clientes"
                $sql = "SELECT * FROM clientes";
                $result = mysqli_query($conexion, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['representante'] . "</td>";
                        echo "<td>" . $row['empresa'] . "</td>";
                        echo "<td>" . $row['telefono'] . "</td>";
                        echo "<td>" . $row['correo'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function limpiarCampos() {
            document.getElementById("representante").value = "";
            document.getElementById("empresa").value = "";
            document.getElementById("telefono").value = "";
            document.getElementById("correo").value = "";
        }
    </script>
</body>
<?php require '../../includes/_footer.php' ?>
</html>