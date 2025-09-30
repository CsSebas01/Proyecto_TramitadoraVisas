<?php
include 'conexion.php';

$id = $_GET['id'];
$pago = $conn->query("SELECT * FROM pagos WHERE id = $id")->fetch_assoc();
$clientes = $conn->query("SELECT id, nombre FROM clientes");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Pago</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<div class="container">
    <div class="sidebar">
        <a href="inicio.php">🏠 Inicio</a>
        <a href="pagos_clientes.php">📄 Ver Pagos</a>
    </div>

    <div class="main">
        <h1 class="titulo-form">Editar Pago</h1>
        <form class="formulario" action="guardar_pago.php?id=<?= $pago['id'] ?>" method="post">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" disabled>
                <option value="">Selecciona un cliente</option>
                <?php while($c = $clientes->fetch_assoc()): ?>
                    <option value="<?= $c['id'] ?>" <?= $pago['cliente_id'] == $c['id'] ? 'selected' : '' ?>><?= $c['nombre'] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="hidden" name="cliente_id" value="<?= $pago['cliente_id'] ?>">

            <label for="fecha_contrato">Fecha de Contrato:</label>
            <input type="date" name="fecha_contrato" value="<?= $pago['fecha_contrato'] ?>" required>

            <label for="fecha_pago">Fecha de Pago:</label>
            <input type="date" name="fecha_pago" value="<?= $pago['fecha_pago'] ?>" required>

            <label for="monto_total">Monto Total:</label>
            <input type="number" step="0.01" name="monto_total" value="<?= $pago['monto_total'] ?>" required>

            <label for="moneda">Tipo de Moneda:</label>
            <select name="moneda" required>
                <option value="BOB" <?= $pago['moneda'] == 'BOB' ? 'selected' : '' ?>>BOB</option>
                <option value="USD" <?= $pago['moneda'] == 'USD' ? 'selected' : '' ?>>USD</option>
                <option value="EUR" <?= $pago['moneda'] == 'EUR' ? 'selected' : '' ?>>EUR</option>
            </select>

            <label><input type="checkbox" name="usa_cuotas" <?= $pago['usa_cuotas'] ? 'checked' : '' ?>> ¿Pago en Cuotas?</label>

            <div class="cuotas-grid">
                <?php for($i=1;$i<=5;$i++): ?>
                <div>
                    <label>Cuota <?= $i ?>:</label>
                    <input class="campo-cuota" type="number" step="0.01" name="cuota<?= $i ?>" value="<?= $pago['cuota'.$i] ?>">
                </div>
                <?php endfor; ?>
            </div>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</div>

</body>
</html>
