<?php
include 'conexion.php';

$resultado = $conn->query("SELECT * FROM requisitos");
$total = $resultado->num_rows;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Requisitos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script defer src="js/main.js"></script>
</head>
<body>
<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="registrar_requisito.php">➕ Registrar Requisito</a>
        <a href="buscar_requisito.php">🔍 Buscar Requisito</a>
    </div>

    <div class="main main-top">
        <div style="text-align:center;">
    <h2 class="titulo-requisitos">Requisitos Registrados (Total: <?= $total ?>)</h2>
</div>
        <div class="tabla-contenedor">
            <table class="tabla-requisitos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Requisito</th>
                        <th>Tipo de Documento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $contador = 1;
                    while ($fila = $resultado->fetch_assoc()): 
                    ?>
                        <tr>
                            <td><?= $contador++ ?></td>
                            <td><?= isset($fila["nombre"]) ? $fila["nombre"] : '' ?></td>
                            <td><?= isset($fila["tipo_documento"]) ? $fila["tipo_documento"] : '' ?></td>
                            <td>
                                <a class="accion-editar" href="editar_requisito.php?id=<?= $fila['id'] ?>" title="Editar"><span>✏️</span></a>
                                <a class="accion-eliminar" href="eliminar_requisito.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este requisito?')" title="Eliminar"><span>🗑️</span></a>
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