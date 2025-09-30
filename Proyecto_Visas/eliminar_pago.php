<?php
include 'conexion.php';

$id = $_GET['id'];
$conn->query("DELETE FROM pagos WHERE id = $id");
header("Location: pagos_clientes.php?mensaje=Eliminado");
?>
