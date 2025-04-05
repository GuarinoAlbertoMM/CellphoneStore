<?php
#Este archivo crea la conexión con tu base de datos usando PDO. Se incluye en todos los demás archivos para evitar repetir el mismo código.

// Datos para conectar con la base de datos
$host = 'localhost';
$db = 'tienda_de_celulares'; // Nombre de tu base de datos
$user = 'root'; // Usuario por defecto en XAMPP
$pass = ''; // Sin contraseña por defecto

// conexion usando PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Muestra errores si hay problemas
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage()); // Si hay error, lo muestra y detiene el script
}
?>