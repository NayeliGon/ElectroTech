<?php
$conexion = mysqli_connect("localhost", "root", "", "bdElectrotech");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
        case 'eliminar_producto':
            eliminar_producto();
            break;
        case 'editar_producto':
            editar_producto();
            break;
        case 'insertar_producto':
            insertar_producto();
            break;
    }
}

function insertar_producto()
{
    global $conexion;
    extract($_POST);

    // Verifica que se haya subido una imagen válida
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $imagenSubida = $_FILES['foto']['tmp_name'];
        $imagenBinaria = file_get_contents($imagenSubida);
        $imagenEscapada = mysqli_real_escape_string($conexion, $imagenBinaria);
    } else {
        $imagenEscapada = null; // No se proporcionó una imagen válida
    }

    $consulta = "INSERT INTO productos (nombre, descripcion, color, precio, cantidad, cantidad_min, categorias, imagen)
                VALUES ('$nombre', '$descripcion', '$color', $precio, $cantidad, $cantidad_min, '$categorias', '$imagenEscapada');";

    mysqli_query($conexion, $consulta);

    // Redirige a la página correspondiente
    header("Location: ../views/usuarios/");
}

function editar_producto()
{
    global $conexion;
    extract($_POST);

    // Verifica que se haya subido una imagen válida
    if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $imagenSubida = $_FILES['foto']['tmp_name'];
        $imagenBinaria = file_get_contents($imagenSubida);
        $imagenEscapada = mysqli_real_escape_string($conexion, $imagenBinaria);
    } else {
        $imagenEscapada = null; // No se proporcionó una imagen válida
    }

    $consulta = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', color = '$color',
                precio = $precio, cantidad = $cantidad, cantidad_min = $cantidad_min, categorias = '$categorias', imagen = '$imagenEscapada'
                WHERE id = $id";

    mysqli_query($conexion, $consulta);

    // Redirige a la página correspondiente
    header("Location: ../views/usuarios/");
}

function eliminar_producto()
{
    global $conexion;
    $id = $_POST['id'];
    $consulta = "DELETE FROM productos WHERE id = $id";
    mysqli_query($conexion, $consulta);

    // Redirige a la página correspondiente
    header("Location: ../views/usuarios/");
}
?>
