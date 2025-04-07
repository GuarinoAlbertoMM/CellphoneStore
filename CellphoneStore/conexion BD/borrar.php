<?php
#Este archivo elimina el registro que tenga el ID indicado.


require 'conexion.php'; // Conexión a la base de datos

$id = 1; // ID del registro que quieres eliminar

// Consulta SQL para borrar
$sql = "DELETE FROM registro WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

echo "Registro eliminado.";
?>