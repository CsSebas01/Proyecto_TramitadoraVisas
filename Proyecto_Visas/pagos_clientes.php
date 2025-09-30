<?php
include 'conexion.php';
$resultado = $conn->query("
    SELECT pagos.*, clientes.nombre 
    FROM pagos 
    JOIN clientes ON pagos.cliente_id = clientes.id
");
$total = $resultado->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pagos de Clientes</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script defer src="js/main.js"></script>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="registrar_pago.php">➕ Registrar Pago</a>
    </div>
    <div class="main main-top">
        <div style="text-align:center;">
            <h2 class="titulo-pagos">Pagos Clientes (Total: <?= $total ?>)</h2>
        </div>
        <div class="tabla-contenedor">
            <table class="tabla-pagos">
<thead>
    <tr>
        <th>#</th>
        <th>Cliente</th>
        <th>Fecha de Contrato</th>
        <th>Fecha de Pago</th>
        <th>Monto Total</th>
        <th>Moneda</th>
        <th>Cuota 1</th>
        <th>Cuota 2</th>
        <th>Cuota 3</th>
        <th>Cuota 4</th>
        <th>Cuota 5</th>
        <th>Acciones</th>
    </tr>
</thead>
<tbody>
    <?php 
    $contador = 1;
    while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= $contador++ ?></td>
            <td><?= $fila["nombre"] ?></td>
            <td><?= $fila["fecha_contrato"] ?></td>
            <td><?= $fila["fecha_pago"] ?></td>
            <td><?= $fila["monto_total"] ?></td>
            <td><?= $fila['moneda'] ?></td>
            <td><?= isset($fila["cuota1"]) ? $fila["cuota1"] : '' ?></td>
            <td><?= isset($fila["cuota2"]) ? $fila["cuota2"] : '' ?></td>
            <td><?= isset($fila["cuota3"]) ? $fila["cuota3"] : '' ?></td>
            <td><?= isset($fila["cuota4"]) ? $fila["cuota4"] : '' ?></td>
            <td><?= isset($fila["cuota5"]) ? $fila["cuota5"] : '' ?></td>
            <td>
                <a class="accion-editar" href="editar_pago.php?id=<?= $fila['id'] ?>" title="Editar"><span>✏️</span></a>
                <a class="accion-eliminar" href="eliminar_pago.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este pago?')" title="Eliminar"><span>🗑️</span></a>
            </td>
        </tr>
    <?php endwhile; ?>
</tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>