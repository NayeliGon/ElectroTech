<?php
// Establece la conexión a la base de datos (debes definir la conexión adecuada)
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

// Inicializa variables para los detalles del producto
$id = "";
$nombre = "";
$descripcion = "";
$color = "";
$precio = "";
$cantidad = "";
$cantidad_min = "";
$categorias = "";

// Verifica si se ha enviado un ID válido a través de GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Realiza una consulta para obtener los detalles del producto con el ID especificado
    $consulta = "SELECT * FROM productos WHERE id = $id";
    $resultado = mysqli_query($conexion, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        // Extrae los detalles del producto
        $producto = mysqli_fetch_assoc($resultado);
        $nombre = $producto['nombre'];
        $descripcion = $producto['descripcion'];
        $color = $producto['color'];
        $precio = $producto['precio'];
        $cantidad = $producto['cantidad'];
        $cantidad_min = $producto['cantidad_min'];
        $categorias = $producto['categorias'];
    }
}

// Resto de tu código HTML y formulario
?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_header.php' ?>
<body>
    <div class="container">
        <div class="col-sm-6 offset-3 mt-5">
        <form action="./includes/_functions.php" method="POST" enctype="multipart/form-data">
    <!-- Campos del formulario -->
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre *</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción *</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>" class="form-control" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="color" class="form-label">Color *</label>
                <input type="text" id="color" name="color" value="<?php echo $color; ?>" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="precio" class="form-label">Precio *</label>
                <input type="number" id="precio" name="precio" value="<?php echo $precio; ?>" class="form-control" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad *</label>
                <input type="number" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="cantidad_min" class="form-label">Cantidad Mínima *</label>
                <input type="number" id="cantidad_min" name="cantidad_min" value="<?php echo $cantidad_min; ?>" class="form-control" required>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="categorias" class="form-label">Categorías *</label>
                <select name="categorias" id="categorias" class="form-control" required>
                    <option value="electronico" <?php if ($categorias === 'electronico') echo 'selected'; ?>>Electrónico</option>
                    <option value="cocina" <?php if ($categorias === 'cocina') echo 'selected'; ?>>Cocina</option>
                    <option value="farmaceutico" <?php if ($categorias === 'farmaceutico') echo 'selected'; ?>>Farmacéutico</option>
                    <!-- Agrega las demás categorías con su lógica de selección -->
                </select>
            </div>
        </div>
    </div>

    <!-- Resto del formulario -->

    <div class="mb-3">
        <input type="hidden" name="accion" value="editar_producto">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success" name="guardar">Guardar</button>
    </div>
</form>

        </div>
    </div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>
