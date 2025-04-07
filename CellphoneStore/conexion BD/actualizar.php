<?php
#Este archivo modifica un dato existente, en este caso, actualiza el teléfono del usuario con ID

require 'conexion.php'; // Conexión a la base de datos

$id = 1; // ID del registro a modificar
$nuevo_telefono = "8297654321"; // Nuevo número que quieres actualizar

// Consulta SQL para actualizar
$sql = "UPDATE registro SET Telefono = :telefono WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':telefono' => $nuevo_telefono,
    ':id' => $id
]);

echo "Registro actualizado.";
?>
