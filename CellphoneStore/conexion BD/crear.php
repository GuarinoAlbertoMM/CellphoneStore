<?php
#Este archivo agrega un nuevo registro a la tabla registro en tu base de datos.

require 'conexion.php'; // Importa la conexión a la base de datos

// Variables con los datos a insertar
$usuario = "Juan Pérez";
$telefono = "8091234567";
$gmail = "juan@ejemplo.com";
$productos = "Celular Samsung A14";
$mensajes = "Consulta sobre disponibilidad";

// Consulta SQL para insertar datos
$sql = "INSERT INTO registro (Usuario, Telefono, Gmail, Productos, Mensajes) 
        VALUES (:usuario, :telefono, :gmail, :productos, :mensajes)";
$stmt = $pdo->prepare($sql); // Prepara la consulta para proteger contra inyecciones
$stmt->execute([
    ':usuario' => $usuario,
    ':telefono' => $telefono,
    ':gmail' => $gmail,
    ':productos' => $productos,
    ':mensajes' => $mensajes
]);

echo "Registro insertado correctamente.";
?>
