<?php
session_start();

// Si no existe la sesión del usuario, redirige al login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Incluir la configuración de la base de datos para tener acceso a $pdo
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <style>
        /* CSS Similar a las páginas anteriores */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px;
            margin: 0 15px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #575757;
        }
        .profile-section {
            padding: 20px;
            text-align: center;
        }
        .profile-title {
            font-size: 2rem;
            color: #333;
        }
        .profile-details {
            font-size: 1.2rem;
            color: #777;
        }
        .messages-section {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .message {
            background: #fff;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Perfil de Usuario</h1>
    </header>

    <nav>
        <a href="..\HTML\index.php">Inicio</a>
        <a href="..\HTML\catalog.html">Productos</a>
        <a href="..\HTML\contact-seller.html">Contacto</a>
        <a href="..\HTML\register.html" class="nav-link">Registro</a>
        <a href="..\HTML\login.html">Iniciar Sesión</a>
        <!-- Puedes agregar un enlace de Logout aquí si lo deseas -->
    </nav>

    <section class="profile-section">
        <h2 class="profile-title">Mi Perfil</h2>
        <div class="profile-details">
            <!-- Se muestran los datos almacenados en la sesión -->
            <p><strong>Nombre:</strong> <?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
            <p><strong>Dirección:</strong> Calle Ficticia 123</p>
            <p><strong>Teléfono:</strong> 123-456-789</p>
        </div>
    </section>

    <section class="messages-section">
        <h2>Mensajes Recibidos</h2>
        <?php
        // Consulta para obtener los mensajes de la tabla 'messages'
        $stmt = $pdo->query("SELECT sender_name, sender_email, message, created_at FROM messages ORDER BY created_at DESC");
        $messages = $stmt->fetchAll();
        
        if ($messages && count($messages) > 0) {
            foreach ($messages as $msg) {
                echo '<div class="message">';
                echo '<p><strong>De:</strong> ' . htmlspecialchars($msg['sender_name']) . ' (' . htmlspecialchars($msg['sender_email']) . ')</p>';
                echo '<p><strong>Mensaje:</strong> ' . nl2br(htmlspecialchars($msg['message'])) . '</p>';
                echo '<p><small>' . htmlspecialchars($msg['created_at']) . '</small></p>';
                echo '</div>';
            }
        } else {
            echo '<p>No se encontraron mensajes.</p>';
        }
        ?>
    </section>

    <footer>
        <p>© 2025 Tienda de Celulares</p>
    </footer>
</body>
</html>