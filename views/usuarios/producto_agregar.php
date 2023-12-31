<?php
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$query = "SELECT id, categoria FROM tbcategoria";
$result = mysqli_query($conexion, $query);

if (!$result) {
    die("Error al ejecutar la consulta: " . mysqli_error($conexion));
}
?>




<!DOCTYPE html>
<html lang="es-MX">
<?php require '../../includes/_header.php' ?>
<body>
<div class="container">
    <div class="col-sm-6 offset-3 mt-5">
        <form action="../../includes/_functions.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre *</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción *</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="color" class="form-label">Color *</label>
                        <input type="text" id="color" name="color" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio *</label>
                        <input type="number" id="precio" name="precio" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad *</label>
                        <input type="number" id="cantidad" name="cantidad" class="form-control" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="cantidad_min" class="form-label">Cantidad mínima *</label>
                        <input type="number" id="cantidad_min" name="cantidad_min" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="categorias" class="form-label">Categorías *</label>
                <select name="categorias" id="categorias" class="form-control" required>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['categoria'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="foto" id="foto" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <input type="hidden" name="accion" value="insertar_producto">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
    </div>
</div>
</body>
<?php require '../../includes/_footer.php' ?>
</html>
