<?php
include 'conexion.php';

$cliente_id = $_POST['cliente_id'];
$fecha_contrato = $_POST['fecha_contrato'];
$fecha_pago = $_POST['fecha_pago'];
$monto_total = $_POST['monto_total'];
$moneda = $_POST['moneda'];
$usa_cuotas = isset($_POST['usa_cuotas']) ? 1 : 0;

$cuota1 = $_POST['cuota1'] !== '' ? floatval($_POST['cuota1']) : null;
$cuota2 = $_POST['cuota2'] !== '' ? floatval($_POST['cuota2']) : null;
$cuota3 = $_POST['cuota3'] !== '' ? floatval($_POST['cuota3']) : null;
$cuota4 = $_POST['cuota4'] !== '' ? floatval($_POST['cuota4']) : null;
$cuota5 = $_POST['cuota5'] !== '' ? floatval($_POST['cuota5']) : null;

if (isset($_GET['id'])) {
    // Modo edición
    $id = $_GET['id'];
    $stmt = $conn->prepare("UPDATE pagos SET cliente_id=?, fecha_contrato=?, fecha_pago=?, monto_total=?, moneda=?, usa_cuotas=?, cuota1=?, cuota2=?, cuota3=?, cuota4=?, cuota5=? WHERE id=?");
    $stmt->bind_param(
        "issdsidddddi",
        $cliente_id,
        $fecha_contrato,
        $fecha_pago,
        $monto_total,
        $moneda,
        $usa_cuotas,
        $cuota1,
        $cuota2,
        $cuota3,
        $cuota4,
        $cuota5,
        $id
    );
} else {
    // Modo inserción
    $stmt = $conn->prepare("INSERT INTO pagos (cliente_id, fecha_contrato, fecha_pago, monto_total, moneda, usa_cuotas, cuota1, cuota2, cuota3, cuota4, cuota5) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param(
        "isssdiddddd",
        $cliente_id,
        $fecha_contrato,
        $fecha_pago,
        $monto_total,
        $moneda,
        $usa_cuotas,
        $cuota1,
        $cuota2,
        $cuota3,
        $cuota4,
        $cuota5
    );
}

if ($stmt->execute()) {
    header("Location: pagos_clientes.php?mensaje=Guardado");
    exit;
} else {
    echo "Error: " . $stmt->error;
}
?>
