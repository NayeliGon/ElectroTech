<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del cliente
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    
    // Productos seleccionados (debes ajustar según tu estructura de base de datos)
    $productosSeleccionados = $_POST["productos"];

    // Cálculos para la cotización (ajusta según tus necesidades)
    $total = calcularCotizacion($productosSeleccionados);

    // Envío de correo con la cotización
    $asunto = "Cotización para $nombre";
    $mensaje = "Estimado $nombre,\n\nSu cotización es: $total";
    $encabezados = "From: tu@correo.com" . "\r\n" . "Reply-To: tu@correo.com";

    // Ajusta la dirección de correo "tu@correo.com" y demás detalles de acuerdo a tu configuración
    mail($correo, $asunto, $mensaje, $encabezados);

    echo "La cotización ha sido enviada a $correo.";
} else {
    echo "Error: Acceso no válido.";
}

function calcularCotizacion($productosSeleccionados) {
    // Aquí deberías implementar tu lógica para calcular el precio total de la cotización
    // Puedes consultar la base de datos y calcular el total según los productos seleccionados
    // Retorna el monto total calculado
    return 0;
}
?>
