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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="ruta/a/tu/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .table thead th {
            vertical-align: middle;
        }

        .table tbody td {
            vertical-align: middle;
        }

        .img-thumbnail {
            max-width: 100px;
            height: auto;
        }

        .btn-editar {
            color: #176B87; /* Color azul para el botón Editar */
        }

        .btn-eliminar {
            color: #CE5959; /* Color rojo para el botón Eliminar */
        }

        .container {
            padding: 20px;
        }

        .table-responsive {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-agregar {
            margin: 10px 0;
        }

        h1 {
            text-align: center;
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
                                        while ($row = mysqli_fetch_assoc($result)) {
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
    <?php require '../../includes/_footer.php' ?>
</body>
</html>
