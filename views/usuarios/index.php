<?php
// Incluye el archivo de conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

// Consulta SQL para obtener los productos
$sql = "SELECT * FROM productos";
$result = mysqli_query($conexion, $sql);

// Paginación
$productos_por_pagina = 4;
$total_productos = mysqli_num_rows($result);
$total_paginas = ceil($total_productos / $productos_por_pagina);

// Determina la página actual
$pagina_actual = isset($_GET['page']) ? $_GET['page'] : 1;
$inicio = ($pagina_actual - 1) * $productos_por_pagina;
?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_header.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="ruta/a/tu/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .pagination-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .pagination {
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        .page-item {
            margin: 0 5px;
        }

        .page-link {
            color: #007bff;
        }

        .page-link:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div id="content">
        <section>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Productos</h1>
                        <a href="producto_agregar.php" class="btn btn-primary btn-agregar">Agregar producto</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Color</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Cantidad Mínima</th>
                                        <th>Categorías</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result) {
                                        // Itera sobre los resultados de la consulta
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($inicio <= 0) {
                                                // Verifica si la cantidad es menor o igual a la cantidad mínima
                                                $clase = ($row['cantidad'] <= $row['cantidad_min']) ? 'problema' : 'correcto';

                                                echo '<tr>';
                                                echo '<td class="' . $row['categorias'] . '">' . $row['id'] . '</td>';
                                                echo '<td>' . $row['nombre'] . '</td>';
                                                echo '<td>' . $row['descripcion'] . '</td>';
                                                echo '<td>' . $row['color'] . '</td>';
                                                echo '<td>$' . $row['precio'] . '</td>';
                                                echo '<td class="' . $clase . '">' . $row['cantidad'] . '</td>';
                                                echo '<td>' . $row['cantidad_min'] . '</td>';
                                                echo '<td>' . $row['categorias'] . '</td>';
                                                echo '<td><img src="data:image;base64,' . base64_encode($row['imagen']) . '" alt="' . $row['nombre'] . '" class="img-thumbnail"></td>';
                                                echo '<td>';
                                                echo '<a href="producto_editar.php?id=' . $row['id'] . '" class="btn-editar"><i class="fas fa-edit"></i></a>';
                                                echo ' | ';
                                                echo '<a href="producto_eliminar.php?id=' . $row['id'] . '" class="btn-eliminar"><i class="fas fa-trash"></i></a>';
                                                echo '</td>';
                                                echo '</tr>';
                                            } else {
                                                $inicio--;
                                            }
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

    <div class="pagination-container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                for ($i = 1; $i <= $total_paginas; $i++) {
                    echo '<li class="page-item ' . ($i == $pagina_actual ? 'active' : '') . '">';
                    echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                    echo '</li>';
                }
                ?>
            </ul>
        </nav>
    </div>

    <?php require '../../includes/_footer.php'; ?>
</body>
</html>
