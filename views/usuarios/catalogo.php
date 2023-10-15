<?php
// Establece la conexión a la base de datos (debes definir la conexión adecuada)
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

// Realiza una consulta para obtener todos los productos
$consulta = "SELECT * FROM productos";
$resultado = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_header.php'; ?>
<body>
<div class="container">
    <div class="row">
        <?php
        while ($producto = mysqli_fetch_assoc($resultado)) {
        ?>
        <div class="col-sm-4">
            <div class="card" style="width: 18rem;">
                <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                    <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                    <p class="card-text">Color: <?php echo $producto['color']; ?></p>
                    <p class="card-text">Precio: $<?php echo $producto['precio']; ?></p>
                    <p class="card-text">Cantidad disponible: <?php echo $producto['cantidad']; ?></p>
                    <a href="#" class="btn btn-primary">Detalles</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>

</body>
<?php require '../../includes/_footer.php'; ?>
</html>
