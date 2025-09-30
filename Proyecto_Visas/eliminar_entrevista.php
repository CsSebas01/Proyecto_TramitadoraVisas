<?php
include 'conexion.php';

$id = $_GET['id'];
$conn->query("DELETE FROM entrevistas WHERE id = $id");
header("Location: entrevistas_clientes.php?mensaje=Eliminada");
?>
