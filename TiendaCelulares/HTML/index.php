<?php
session_start(); // Inicia la sesión para poder verificar el estado del usuario
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos - Tienda de Celulares</title>
  <style>
    /* General Styles */
    :root {
  --primary-color: #0f766e;
  --secondary-color: #14b8a6;
  --background: #f0fdf4;
  --text-dark: #1e293b;
  --text-light: #94a3b8;
  --card-bg: #ffffff;
  --accent: #ec4899;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  background-color: var(--background);
  color: var(--text-dark);
}

header {
  background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
  color: white;
  padding: 1rem 0;
  text-align: center;
}

.header-title {
  font-size: clamp(1.5rem, 4vw, 2.5rem);
  font-weight: 700;
}

nav {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  background-color: var(--primary-color);
  padding: 0.5rem;
  gap: 0.5rem;
}

nav a {
  color: white;
  text-decoration: none;
  padding: 0.5rem 1rem;
  border-radius: 6px;
  transition: all 0.3s ease-in-out;
  font-weight: 500;
}

nav a:hover {
  background-color: var(--accent);
}

.product-section {
  padding: 2rem 1rem;
  max-width: 1200px;
  margin: auto;
}

.section-title {
  font-size: clamp(1.5rem, 3vw, 2rem);
  text-align: center;
  margin-bottom: 2rem;
  color: var(--primary-color);
}

.product-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.product-card {
  background-color: var(--card-bg);
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  display: flex;
  flex-direction: column;
}

.product-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.product-card img {
  width: 100%;
  height: auto;
  object-fit: cover;
  aspect-ratio: 1 / 1;
}

.product-info {
  padding: 1rem;
  text-align: center;
  flex: 1;
}

.product-name {
  font-size: 1.2rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.product-description {
  font-size: 0.95rem;
  color: var(--text-light);
  margin-bottom: 0.75rem;
}

.product-price {
  color: var(--accent);
  font-weight: 700;
  font-size: 1.25rem;
}

footer {
  background-color: var(--primary-color);
  color: white;
  text-align: center;
  padding: 1.5rem 0;
  margin-top: 3rem;
}

.footer-text {
  margin: 0;
  font-size: 1rem;
}

@media (max-width: 600px) {
  nav a {
      padding: 0.4rem 0.8rem;
      font-size: 0.9rem;
  }

  .product-card img {
      aspect-ratio: 4 / 3;
  }

  .product-price {
      font-size: 1.1rem;
  }
}
    /* Estilos para el modal del formulario */
    #addProductModal {
      display: none; /* oculto por defecto */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
    }
    #addProductModal .modal-content {
      background: white;
      padding: 20px;
      border-radius: 10px;
      max-width: 500px;
      width: 90%;
    }
    #addProductModal input,
    #addProductModal textarea {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      box-sizing: border-box;
    }
    #addProductModal button {
      margin-top: 10px;
      padding: 10px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <h1 class="header-title">Bienvenido a la Tienda de Celulares</h1>
  </header>

  <nav>
    <a href="index.php" class="nav-link">Inicio</a>
    <a href="catalog.html" class="nav-link">Productos</a>
    <a href="contact-seller.html" class="nav-link">Contacto</a>
    <a href="register.html" class="nav-link">Registro</a>
    <?php if (isset($_SESSION['user_id'])): ?>
      <a href="../PHP/profile.php" class="nav-link">Perfil</a>
    <?php else: ?>
      <a href="login.html" class="nav-link">Iniciar Sesión</a>
    <?php endif; ?>
  </nav>

  <section id="productos" class="product-section">
    <h2 class="section-title">Nuestros Productos</h2>
    <!-- Mostrar controles solo para usuarios autenticados -->
    <?php if (isset($_SESSION['user_id'])): ?>
      <div class="product-controls">
        <button id="openModal">Agregar Producto</button>
      </div>
    <?php endif; ?>
    <div class="product-container">
      <!-- Producto 1 -->
      <div class="product-card">
        <img src="..\img\galaxys24.jpg" alt="Producto" class="product-image">
        <div class="product-info">
          <h3 class="product-name">Samsung Galaxy S24</h3>
          <p class="product-description">Descripción del producto.</p>
          <p class="product-price">$39,999.99</p>
          <?php if(isset($_SESSION['user_id'])): ?>
            <button class="remove-product-btn">Remover</button>
          <?php endif; ?>
        </div>
      </div>
      <!-- Producto 2 -->
      <div class="product-card">
        <img src="..\img\galaxys24-ultra.jpg" alt="Producto" class="product-image">
        <div class="product-info">
          <h3 class="product-name">Samsung Galaxy S24 Ultra</h3>
          <p class="product-description">Descripción del producto.</p>
          <p class="product-price">$59,999.99</p>
          <?php if(isset($_SESSION['user_id'])): ?>
            <button class="remove-product-btn">Remover</button>
          <?php endif; ?>
        </div>
      </div>
      <!-- Producto 3 -->
      <div class="product-card">
        <img src="..\img\iphone15.jpg" alt="Producto" class="product-image">
        <div class="product-info">
          <h3 class="product-name">IPhone 15</h3>
          <p class="product-description">Descripción del producto.</p>
          <p class="product-price">$49,999.99</p>
          <?php if(isset($_SESSION['user_id'])): ?>
            <button class="remove-product-btn">Remover</button>
          <?php endif; ?>
        </div>
      </div>
      <!-- Producto 4 -->
      <div class="product-card">
        <img src="..\img\iphone15-promax.jpg" alt="Producto" class="product-image">
        <div class="product-info">
          <h3 class="product-name">IPhone 15 Pro Max</h3>
          <p class="product-description">Descripción del producto.</p>
          <p class="product-price">$69,999.99</p>
          <?php if(isset($_SESSION['user_id'])): ?>
            <button class="remove-product-btn">Remover</button>
          <?php endif; ?>
        </div>
      </div>
      <!-- Producto 5 -->
      <div class="product-card">
        <img src="..\img\pixel7pro.jpg" alt="Producto" class="product-image">
        <div class="product-info">
          <h3 class="product-name">Pixel 7 Pro</h3>
          <p class="product-description">Descripción del producto.</p>
          <p class="product-price">$59,999.99</p>
          <?php if(isset($_SESSION['user_id'])): ?>
            <button class="remove-product-btn">Remover</button>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal para agregar un nuevo producto -->
  <div id="addProductModal">
    <div class="modal-content">
      <h3>Agregar Nuevo Producto</h3>
      <form id="addProductForm">
        <input type="text" name="productName" placeholder="Nombre del producto" required>
        <textarea name="productDescription" placeholder="Descripción del producto" required></textarea>
        <input type="number" step="0.01" name="productPrice" placeholder="Precio del producto" required>
        <input type="file" name="productImage" accept="image/*" required>
        <button type="submit">Agregar Producto</button>
        <button type="button" id="closeModal">Cancelar</button>
      </form>
    </div>
  </div>

  <footer>
    <p class="footer-text">© 2025 Tienda de Celulares</p>
  </footer>

 
  <script src="..\js\scripts.js"></script>
</body>
</html>