<?php
include 'conexion.php';

$resultado = $conn->query("
    SELECT entrevistas.*, clientes.nombre 
    FROM entrevistas 
    JOIN clientes ON entrevistas.cliente_id = clientes.id
");

$total = $resultado->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Entrevistas de Clientes</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script defer src="js/main.js"></script>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="registrar_entrevista.php">➕ Registrar Entrevista</a>
    </div>
    <div class="main main-top">
        <div style="text-align:center;">
            <h2 class="titulo-entrevistas">Entrevistas Clientes (Total: <?= $total ?>)</h2>
        </div>
        <div class="tabla-contenedor">
            <table class="tabla-entrevistas">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Embajada</th>
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
                            <td><?= $fila["fecha"] ?></td>
                            <td><?= $fila["hora"] ?></td>
                            <td><?= $fila["embajada"] ?></td>
                            <td>
                                <a class="accion-editar" href="editar_entrevista.php?id=<?= $fila['id'] ?>" title="Editar"><span>✏️</span></a>
                                <a class="accion-eliminar" href="eliminar_entrevista.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar esta entrevista?')" title="Eliminar"><span>🗑️</span></a>
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