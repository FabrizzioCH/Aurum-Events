<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nombre, $email, $password]);
        echo "Usuario registrado con éxito.";
        // Redirigir o mostrar mensaje
    } catch (PDOException $e) {
        echo "Error al registrar: " . $e->getMessage();
    }
}
