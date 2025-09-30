<?php
include 'conexion.php';

$nombre = $_GET['nombre'];
$res = $conn->query("SELECT * FROM requisitos WHERE nombre LIKE '%$nombre%'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado de Búsqueda</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="menu">
    <a href="inicio.php">🏠 Inicio</a>
    <a href="ver_requisitos.php">📄 Ver Todos</a>
</div>

<div class="content">
    <h2>Resultado para: "<?= htmlspecialchars($nombre) ?>"</h2>

    <?php if ($res->num_rows > 0): ?>
        <table class="tabla-clientes">
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
                $n = 1;
                while ($fila = $res->fetch_assoc()): ?>
                    <tr>
                        <td><?= $n++ ?></td>
                        <td><?= $fila['nombre'] ?></td>
                        <td><?= $fila['tipo_documento'] ?></td>
                        <td>
                            <a href="editar_requisito.php?id=<?= $fila['id'] ?>">✏️ Editar</a> |
                            <a href="eliminar_requisito.php?id=<?= $fila['id'] ?>" onclick="return confirm('¿Eliminar este requisito?')">❌ Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>❌ No se encontraron requisitos con ese nombre.</p>
    <?php endif; ?>
</div>
</body>
</html>
