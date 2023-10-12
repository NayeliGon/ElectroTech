<?php 
include 'conexion.php';

$correo = $_POST['correo'];
$contrasenia = $_POST['contrasenia'];

// Utiliza las variables en la consulta SQL
$validar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' AND contrasenia ='$contrasenia'");

if (mysqli_num_rows($validar) > 0) {
    header("location: home.html");
    exit;
} else {
    echo '
    <script>
        alert("Usuario no existe, verificar datos");
        window.location="index.html";
    </script>';
}
?>
