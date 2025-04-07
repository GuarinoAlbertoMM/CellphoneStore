document.addEventListener("DOMContentLoaded", function() {
    const openModalBtn = document.getElementById("openModal");
    const closeModalBtn = document.getElementById("closeModal");
    const addProductModal = document.getElementById("addProductModal");
    const addProductForm = document.getElementById("addProductForm");
    const productContainer = document.querySelector(".product-container");
  
    // Mostrar modal al hacer clic en "Agregar Producto"
    if (openModalBtn) {
      openModalBtn.addEventListener("click", function() {
        addProductModal.style.display = "flex";
      });
    }
  
    // Cerrar modal
    if (closeModalBtn) {
      closeModalBtn.addEventListener("click", function() {
        addProductModal.style.display = "none";
      });
    }
  
    // Manejar el envío del formulario para agregar un producto
    if (addProductForm) {
      addProductForm.addEventListener("submit", function(e) {
        e.preventDefault();
        const productName = addProductForm.productName.value;
        const productDescription = addProductForm.productDescription.value;
        const productPrice = addProductForm.productPrice.value;
        const productImageFile = addProductForm.productImage.files[0];
  
        if (productImageFile) {
          const reader = new FileReader();
          reader.onload = function(e) {
            // Crear la tarjeta del producto con la imagen (en base64) y los datos ingresados
            const productCard = document.createElement("div");
            productCard.className = "product-card";
            productCard.innerHTML = `
              <img src="${e.target.result}" alt="Producto" class="product-image">
              <div class="product-info">
                <h3 class="product-name">${productName}</h3>
                <p class="product-description">${productDescription}</p>
                <p class="product-price">$${parseFloat(productPrice).toFixed(2)}</p>
                <button class="remove-product-btn">Remover</button>
              </div>
            `;
            productContainer.appendChild(productCard);
            // Reiniciar el formulario y ocultar el modal
            addProductForm.reset();
            addProductModal.style.display = "none";
          };
          reader.readAsDataURL(productImageFile);
        }
      });
    }
  
    // Event delegation para remover un producto individual al hacer clic en su botón
    productContainer.addEventListener("click", function(e) {
      if (e.target && e.target.classList.contains("remove-product-btn")) {
        const card = e.target.closest(".product-card");
        if (card) {
          card.remove();
        }
      }
    });
  });