<?php 
# Este archivo muestra todos los datos guardados en la tabla registro de forma visual en el navegador.

require 'conexion.php'; // Importa la conexión 


$sql = "SELECT * FROM registro"; // Consulta para obtener todos los registros
$stmt = $pdo->query($sql); // Ejecuta la consulta
$registros = $stmt->fetchAll(PDO::FETCH_ASSOC); // Obtiene los resultados en forma de arreglo

// Muestra cada registro
foreach ($registros as $r) {
    echo "<b>ID:</b> {$r['id']}<br>";
    echo "<b>Usuario:</b> {$r['Usuario']}<br>";
    echo "<b>Teléfono:</b> {$r['Telefono']}<br>";
    echo "<b>Gmail:</b> {$r['Gmail']}<br>";
    echo "<b>Productos:</b> {$r['Productos']}<br>";
    echo "<b>Mensajes:</b> {$r['Mensajes']}<br><hr>";
}
?>
