<?php
include 'conexion.php';

$id = $_GET['id'];
$cliente = $conn->query("SELECT * FROM clientes WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Cliente</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="ver_clientes.php">👤 Ver Clientes</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Editar Cliente</h1>
        <form class="formulario" action="guardar_cliente.php?id=<?= $cliente['id'] ?>" method="post">

            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="<?= $cliente['nombre'] ?>" required>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?= $cliente['correo'] ?>">

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" value="<?= $cliente['telefono'] ?>">

            <label for="tipo_visa">Tipo de Visa:</label>
            <input type="text" name="tipo_visa" value="<?= $cliente['tipo_visa'] ?>">

            <label for="tipo_tramite">Tipo de Trámite:</label>
            <select name="tipo_tramite">
                <option value="">Seleccione</option>
                <option value="Reagrupacion" <?= $cliente['tipo_tramite'] == 'Reagrupacion' ? 'selected' : '' ?>>Reagrupación</option>
                <option value="Turismo" <?= $cliente['tipo_tramite'] == 'Turismo' ? 'selected' : '' ?>>Turismo</option>
                <option value="Trabajo" <?= $cliente['tipo_tramite'] == 'Trabajo' ? 'selected' : '' ?>>Trabajo</option>
            </select>

            <label for="estado">Estado:</label>
            <select name="estado">
                <option value="">Seleccione</option>
                <option value="En proceso" <?= $cliente['estado'] == 'En proceso' ? 'selected' : '' ?>>En proceso</option>
                <option value="Denegado" <?= $cliente['estado'] == 'Denegado' ? 'selected' : '' ?>>Denegado</option>
                <option value="Cancelado" <?= $cliente['estado'] == 'Cancelado' ? 'selected' : '' ?>>Cancelado</option>
                <option value="Suspendido" <?= $cliente['estado'] == 'Suspendido' ? 'selected' : '' ?>>Suspendido</option>
                <option value="Aprobado" <?= $cliente['estado'] == 'Aprobado' ? 'selected' : '' ?>>Aprobado</option>
            </select>

            <label for="observaciones">Observaciones:</label>
            <textarea name="observaciones"><?= $cliente['observaciones'] ?></textarea>

            <label for="activo">Actividad:</label>
            <select name="activo">
                <option value="1" <?= $cliente['activo'] == 1 ? 'selected' : '' ?>>Activo</option>
                <option value="0" <?= $cliente['activo'] == 0 ? 'selected' : '' ?>>Inactivo</option>
            </select>

            <button type="submit" class="btn">Actualizar Cliente</button>
        </form>
    </div>
</div>

</body>
</html>
