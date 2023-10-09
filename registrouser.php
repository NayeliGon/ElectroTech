<?php
    include 'conexion.php';

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];

    // Asegúrate de usar las variables en la consulta SQL en lugar de cadenas fijas
    $query = "INSERT INTO usuarios(nombre, correo, usuario, contrasenia) 
              VALUES('$nombre', '$correo', '$usuario', '$contrasenia')";

    $ejecutar = mysqli_query($conexion, $query);

    if ($ejecutar) {
        echo "Registro exitoso"; // Puedes mostrar un mensaje de éxito si la inserción fue exitosa
    } else {
        echo "Error al registrar: " . mysqli_error($conexion); // Muestra un mensaje de error en caso de falla
    }
?>
