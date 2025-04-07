<?php
// send_message.php
session_start();
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $senderName  = trim($_POST['sender_name']);
    $senderEmail = trim($_POST['sender_email']);
    $message     = trim($_POST['message']);

    if (empty($senderName) || empty($senderEmail) || empty($message)) {
        die("Todos los campos son obligatorios.");
    }

    // Insertar mensaje en la base de datos
    $stmt = $pdo->prepare("INSERT INTO messages (sender_name, sender_email, message) VALUES (?, ?, ?)");
    if ($stmt->execute([$senderName, $senderEmail, $message])) {
        echo "Mensaje enviado exitosamente.";
        header("Location: ..\HTML\index.php");
        exit;
    } else {
        echo "Error al enviar el mensaje.";
    }
}
?>