<?php
$servername = "127.0.0.1:3307";  // importante el puerto
$username = "proyecto";
$password = "12345";
$dbname = "proyecto_visas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
