<?php
include 'conexion.php';

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$tipo_visa = isset($_POST['tipo_visa']) ? $_POST['tipo_visa'] : '';
$tipo_tramite = isset($_POST['tipo_tramite']) ? $_POST['tipo_tramite'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$observaciones = isset($_POST['observaciones']) ? $_POST['observaciones'] : '';
$activo = isset($_POST['activo']) ? $_POST['activo'] : 0;

if (isset($_GET['id'])) {
    // Edición existente
    $id = $_GET['id'];
    $sql = "UPDATE clientes SET 
            nombre='$nombre', correo='$correo', telefono='$telefono',
            tipo_visa='$tipo_visa', tipo_tramite='$tipo_tramite',
            estado='$estado', observaciones='$observaciones', activo=$activo
            WHERE id=$id";
} else {
    // Nuevo cliente
    $sql = "INSERT INTO clientes (nombre, correo, telefono, tipo_visa, tipo_tramite, estado, observaciones, activo) 
            VALUES ('$nombre', '$correo', '$telefono', '$tipo_visa', '$tipo_tramite', '$estado', '$observaciones', $activo)";
}

if ($conn->query($sql) === TRUE) {
    header("Location: ver_clientes.php?mensaje=Guardado correctamente");
} else {
    echo "Error: " . $conn->error;
}
?>
