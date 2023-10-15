<?php
// Incluye el archivo de conexión a la base de datos
$conexion = mysqli_connect("localhost","root","", "bdElectrotech");
 

// Consulta SQL para obtener los productos
$sql = "SELECT * FROM productos";
$result = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<?php require '../../includes/_header.php' ?>

<div id="content">
    <section>
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 mb-3">
                    <center><h1>Productos</h1></center>
                    <a href="producto_agregar.php" class="btn btn-primary">Agregar producto</a>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Color</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Cantidad minima</th>
                                    <th>Categorias</th>
                                    <th>Imagen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // Verifica si la cantidad es menor o igual a la cantidad mínima
                                        if ($row['cantidad'] <= $row['cantidad_min']) {
                                            $color = '#F78E8E';
                                            $clase = 'problema';
                                        } else {
                                            $clase = 'correcto';
                                        }
                                        echo '<tr>';
                                        echo '<td class="' . $row['categorias'] . '">' . $row['id'] . '</td>';
                                        echo '<td>' . $row['nombre'] . '</td>';
                                        echo '<td>' . $row['descripcion'] . '</td>';
                                        echo '<td>' . $row['color'] . '</td>';
                                        echo '<td>' . $row['precio'] . '</td>';
                                        echo '<td class="' . $clase . '">' . $row['cantidad'] . '</td>';
                                        echo '<td>' . $row['cantidad_min'] . '</td>';
                                        echo '<td>' . $row['categorias'] . '</td>';
                                        echo '<td><img width="100" src="data:image;base64,' . base64_encode($row['imagen']) . '"></td>';
                                        echo '<td>';
                                        echo '<a href="producto_editar.php?id=' . $row['id'] . '">Editar</a>';
                                        echo ' | ';
                                        echo '<a href="producto_eliminar.php?id=' . $row['id'] . '">Eliminar</a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr class="text-center">';
                                    echo '<td colspan="9">No existen registros</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <!-- Contenido adicional -->
            </div>
        </div>
    </div>
</section>

<?php require '../../includes/_footer.php'; ?>

</html>
