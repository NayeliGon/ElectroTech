<?php
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Realiza una consulta para obtener todas las categorías
$consulta_categorias = "SELECT * FROM tbcategoria";
$resultado_categorias = mysqli_query($conexion, $consulta_categorias);

// Inicializa una variable para almacenar la categoría seleccionada (si la hay)
$selectedCategoria = null;

// Verifica si se ha enviado una categoría a través del formulario
if (isset($_POST['categoria'])) {
    $selectedCategoria = $_POST['categoria'];
}

// Consulta para obtener los productos de la categoría seleccionada
$consulta_productos = "SELECT productos.*, tbcategoria.categoria AS categoria
                      FROM productos
                      JOIN tbcategoria ON productos.categorias = tbcategoria.id";

if (!empty($selectedCategoria)) {
    $consulta_productos .= " WHERE tbcategoria.id = $selectedCategoria";
}

$resultado_productos = mysqli_query($conexion, $consulta_productos);

// Paginación
$productos_por_pagina = 4;
$total_productos = mysqli_num_rows($resultado_productos);
$total_paginas = ceil($total_productos / $productos_por_pagina);

// Determina la página actual
$pagina_actual = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($pagina_actual - 1) * $productos_por_pagina;

// Consulta para obtener los productos de la página actual
$consulta_paginacion = $consulta_productos . " LIMIT $productos_por_pagina OFFSET $offset";
$resultado_paginacion = mysqli_query($conexion, $consulta_paginacion);
?>

<!DOCTYPE html>
<html lang="en">
<?php require '../../includes/_header.php'; ?>
<head>
    <title>Catalogo de Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mb-4">
            <h2>Filtrar por Categoría</h2>
            <form class="form-inline" method="post" action="">
                <div class="form-group">
                    <label for="categoria" class="mr-2">Categoría:</label>
                    <select name="categoria" id="categoria" class="form-control">
                        <option value="">Todas las categorías</option>
                        <?php
                        while ($categoria = mysqli_fetch_assoc($resultado_categorias)) {
                            echo '<option value="' . $categoria['id'] . '"';
                            if ($selectedCategoria == $categoria['id']) {
                                echo ' selected';
                            }
                            echo '>' . $categoria['categoria'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
        </div>
    </div>

    <div class="row">
        <?php
        while ($producto = mysqli_fetch_assoc($resultado_paginacion)) {
        ?>
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card">
                <!-- Imagen del producto -->
                <img src="data:image/jpeg;base64,<?php echo base64_encode($producto['imagen']); ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                <div class="card-body">
                    <!-- Título del producto -->
                    <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
                    <!-- Descripción del producto -->
                    <p class="card-text"><?php echo $producto['descripcion']; ?></p>
                    <!-- Categoría -->
                    <p class="card-text"><strong>Categoría:</strong> <?php echo $producto['categoria']; ?></p>
                    <!-- Color -->
                    <p class="card-text"><strong>Color:</strong> <?php echo $producto['color']; ?></p>
                    <!-- Precio -->
                    <p class="card-text"><strong>Precio:</strong> $<?php echo $producto['precio']; ?></p>
                    <!-- Cantidad disponible -->
                    <p class="card-text"><strong>Cantidad disponible:</strong> <?php echo $producto['cantidad']; ?></p>
                    <!-- Botón para detalles o comprar -->
                    <a href="#" class="btn btn-primary">Detalles</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
                <li class="page-item <?php echo ($i == $pagina_actual) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>

</body>
<?php require '../../includes/_footer.php'; ?>
</html>
