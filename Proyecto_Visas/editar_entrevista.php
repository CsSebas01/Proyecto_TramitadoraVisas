<?php
include 'conexion.php';

$id = $_GET['id'];
$entrevista = $conn->query("SELECT * FROM entrevistas WHERE id = $id")->fetch_assoc();
$clientes = $conn->query("SELECT id, nombre FROM clientes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Entrevista</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="entrevistas_clientes.php">📅 Ver Entrevistas</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Editar Entrevista</h1>

        <form class="formulario" action="guardar_entrevista.php?id=<?= $id ?>" method="post">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" required>
                <?php while ($cliente = $clientes->fetch_assoc()): ?>
                    <option value="<?= $cliente['id'] ?>" <?= $cliente['id'] == $entrevista['cliente_id'] ? 'selected' : '' ?>>
                        <?= $cliente['nombre'] ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <label for="fecha">Fecha de Entrevista:</label>
            <input type="date" name="fecha" value="<?= $entrevista['fecha'] ?>" required>

            <label for="hora">Hora:</label>
            <input type="time" name="hora" value="<?= $entrevista['hora'] ?>" required>

            <label for="embajada">Embajada:</label>
            <input type="text" name="embajada" value="<?= $entrevista['embajada'] ?>">


            <button type="submit" class="btn">Actualizar Entrevista</button>
        </form>
    </div>
</div>

</body>
</html>
