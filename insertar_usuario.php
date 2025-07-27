<?php
include 'conexion.php';

$nombre = $_POST['nombre'] ?? '';
$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

if ($nombre != '' && $usuario != '' && $contrasena != '') {
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, usuario, contraseña) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $usuario, $contrasena);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "ERROR";
    }
    $stmt->close();
} else {
    echo "DATOS_INCOMPLETOS";
}
$conn->close();
?>
