<?php
include 'conexion.php';
$clientes = $conn->query("SELECT id, nombre FROM clientes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrar Pago</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
    <script defer src="js/main.js"></script>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="pagos_clientes.php">📄 Ver Pagos</a>
        <a href="registrar_pago.php">➕ Registrar Pago</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Registrar Pago</h1>
        <form class="formulario" action="guardar_pago.php" method="post">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" required>
                <option value="">Selecciona un cliente</option>
                <?php while($c = $clientes->fetch_assoc()): ?>
                    <option value="<?= $c['id'] ?>"><?= $c['nombre'] ?></option>
                <?php endwhile; ?>
            </select>

            <label for="fecha_contrato">Fecha de Contrato:</label>
            <input type="date" name="fecha_contrato" required>

            <label for="fecha_pago">Fecha de Pago:</label>
            <input type="date" name="fecha_pago" required>

            <label for="monto_total">Monto Total:</label>
            <input type="number" step="0.01" name="monto_total" required>

            <label for="moneda">Tipo de Moneda:</label>
            <select name="moneda" required>
                <option value="BOB">BOB</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
            </select>

            <label><input type="checkbox" name="usa_cuotas" id="usa_cuotas"> ¿Pago en Cuotas?</label>

            <div class="cuotas-grid">
                <?php for($i=1;$i<=5;$i++): ?>
                <div>
                    <label>Cuota <?= $i ?>:</label>
                    <input class="campo-cuota" type="number" step="0.01" name="cuota<?= $i ?>" disabled>
                </div>
                <?php endfor; ?>
            </div>

            <button type="submit">Guardar Pago</button>
        </form>
    </div>
</div>

</body>
</html>
