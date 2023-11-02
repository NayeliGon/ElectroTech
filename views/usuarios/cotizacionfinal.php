<?php
if(isset($_POST['productos'])) {
    // Recibe los datos de productos en formato JSON
    $productosJSON = $_POST['productos'];

    // Decodifica los datos JSON en un arreglo
    $productosSeleccionados = json_decode($productosJSON, true);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Cotización</title>
    </head>
    <body>
        <h1>Cotización</h1>
        <ul>
            <?php foreach ($productosSeleccionados as $producto): ?>
                <li><?= htmlspecialchars($producto['nombre']) ?> - Cantidad: <?= $producto['cantidad'] ?> - Total: <?= $producto['total'] ?></li>
            <?php endforeach; ?>
        </ul>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </html>

    <?php
}
?>
