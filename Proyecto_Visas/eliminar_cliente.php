<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];

    $res = $conn->query("SELECT id FROM clientes WHERE nombre = '$nombre'");
    if ($res->num_rows === 1) {
        $fila = $res->fetch_assoc();
        $id = $fila['id'];
        $conn->query("DELETE FROM clientes WHERE id = $id");
        header("Location: ver_clientes.php?mensaje=Cliente eliminado");
    } else if ($res->num_rows > 1) {
        echo "⚠️ Hay más de un cliente con ese nombre. Usa el botón eliminar de la lista.";
    } else {
        echo "❌ No se encontró ningún cliente con ese nombre.";
    }
} else if (isset($_GET['id'])) {
    // Eliminación directa por ID desde ver_clientes.php
    $id = $_GET['id'];
    $conn->query("DELETE FROM clientes WHERE id = $id");
    header("Location: ver_clientes.php?mensaje=Cliente eliminado");
}
?>

