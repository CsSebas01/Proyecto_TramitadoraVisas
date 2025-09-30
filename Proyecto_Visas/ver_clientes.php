<?php
include 'conexion.php';
$resultado = $conn->query("SELECT * FROM clientes");
$total = $resultado->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Clientes</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="registrar_cliente.php">➕ Registrar Cliente</a>
    </div>
    <div class="main main-top">
        <div style="text-align:center;">
            <h2 class="titulo-clientes">Clientes Registrados (Total: <?= $total ?>)</h2>
        </div>
        <div class="tabla-contenedor">
            <table class="tabla-clientes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Tipo de Visa</th>
                        <th>Tipo de Trámite</th>
                        <th>Estado</th>
                        <th>Observaciones</th>
                        <th>Actividad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $contador = 1;
                    while($fila = $resultado->fetch_assoc()): 
                    ?>
                        <tr>
                            <td><?= $contador++ ?></td>
                            <td><?= $fila["nombre"] ?></td>
                            <td><?= $fila["correo"] ?></td>
                            <td><?= $fila["telefono"] ?></td>
                            <td><?= $fila["tipo_visa"] ?></td>
                            <td><?= $fila["tipo_tramite"] ?></td>
                            <td><?= $fila["estado"] ?></td>
                            <td><?= $fila["observaciones"] ?></td>
                            <td><?= $fila["activo"] ? 'Activo' : 'Inactivo' ?></td>
                            <td>
                                <a class="accion-editar" href="editar_cliente.php?id=<?= $fila['id'] ?>" title="Editar"><span>✏️</span></a>
                                <a class="accion-eliminar" href="eliminar_cliente.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar?')" title="Eliminar"><span>🗑️</span></a>
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