<?php
include 'conexion.php';

$id = $_GET['id'];
$requisito = $conn->query("SELECT * FROM requisitos WHERE id = $id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Requisito</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="ver_requisitos.php">📄 Ver Requisitos</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Editar Requisito</h1>

        <form class="formulario" action="guardar_requisito.php?id=<?= $id ?>" method="post">
            <label for="nombre">Nombre del Requisito:</label>
            <input type="text" name="nombre" value="<?= $requisito['nombre'] ?>" required>

            <label for="tipo_documento">Tipo de Documento:</label>
            <select name="tipo_documento" required>
                <option value="">Seleccione una opción</option>
                <option value="Original" <?= $requisito['tipo_documento'] == 'Original' ? 'selected' : '' ?>>Original</option>
                <option value="Copia" <?= $requisito['tipo_documento'] == 'Copia' ? 'selected' : '' ?>>Copia</option>
            </select>

            <button type="submit" class="btn">Actualizar Requisito</button>
        </form>
    </div>
</div>

</body>
</html>
