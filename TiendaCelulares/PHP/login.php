<?php
// login.php
session_start();
require_once __DIR__ . '/config.php'; // Este archivo debe crear la instancia $pdo

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        die("Todos los campos son obligatorios.");
    }

    // Buscar el usuario en la base de datos
    $stmt = $pdo->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Verificar contraseña
    if ($user && $password === $user['password']) {
        // Credenciales correctas, iniciar sesión
        $_SESSION['user_id']    = $user['id'];
        $_SESSION['user_name']  = $user['name'];
        $_SESSION['user_email'] = $user['email']; // Asegúrate de que 'email' sea la columna correcta en la BD
        header("Location: profile.php");
        exit;
    } else {
        echo "Credenciales inválidas.";
    }
}
?>