<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$tipo_documento = $_POST['tipo_documento'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE requisitos SET nombre='$nombre', tipo_documento='$tipo_documento' WHERE id=$id";
} else {
    $sql = "INSERT INTO requisitos (nombre, tipo_documento) VALUES ('$nombre', '$tipo_documento')";
}

if ($conn->query($sql) === TRUE) {
    header("Location: ver_requisitos.php?mensaje=Requisito guardado");
} else {
    echo "Error: " . $conn->error;
}
?>
