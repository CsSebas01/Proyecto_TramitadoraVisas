<?php
include 'conexion.php';
$clientes = $conn->query("SELECT id, nombre FROM clientes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Entrevista</title>
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
        <h1 class="titulo-form">Registrar Entrevista</h1>

        <form class="formulario" action="guardar_entrevista.php" method="post">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" required>
                <option value="">Seleccione un cliente</option>
                <?php while ($cliente = $clientes->fetch_assoc()): ?>
                    <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="fecha">Fecha de Entrevista:</label>
            <input type="date" name="fecha" required>

            <label for="hora">Hora:</label>
            <input type="time" name="hora" required>

            <label for="embajada">Embajada:</label>
            <input type="text" name="embajada">

       

            <button type="submit" class="btn">Registrar</button>
        </form>
    </div>
</div>

</body>
</html>
