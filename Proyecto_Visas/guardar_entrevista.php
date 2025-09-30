<?php
include 'conexion.php';

$cliente_id = $_POST['cliente_id'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$embajada = $_POST['embajada'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE entrevistas SET cliente_id=$cliente_id, fecha='$fecha', hora='$hora', embajada='$embajada' WHERE id=$id";
} else {
    $sql = "INSERT INTO entrevistas (cliente_id, fecha, hora, embajada) VALUES ($cliente_id, '$fecha', '$hora', '$embajada')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: entrevistas_clientes.php?mensaje=Guardado");
} else {
    echo "Error: " . $conn->error;
}
?>
