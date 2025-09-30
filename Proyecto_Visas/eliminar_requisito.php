<?php
include 'conexion.php';
$id = $_GET['id'];
$conn->query("DELETE FROM requisitos WHERE id = $id");
header("Location: ver_requisitos.php");
?>

