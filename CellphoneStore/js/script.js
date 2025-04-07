/* Aqui iran las funciones de la pagina */

document.addEventListener("DOMContentLoaded", () => {

    // Función para validar formularios
    function validateForm(form) {
        let isValid = true;
        const inputs = form.querySelectorAll("input, textarea");

        inputs.forEach(input => {
            if (input.hasAttribute("required") && input.value.trim() === "") {
                isValid = false;
                input.classList.add("error");
            } else {
                input.classList.remove("error");
            }
        });

        return isValid;
    }

    const loginForm = document.querySelector(".login-form");
    if (loginForm) {
        loginForm.addEventListener("submit", function(event) {
            if (!validateForm(this)) {
                event.preventDefault(); 
                alert("Por favor, complete todos los campos obligatorios.");
            }
        });
    }

    const contactForm = document.querySelector(".contact-form");
    if (contactForm) {
        contactForm.addEventListener("submit", function(event) {
            if (!validateForm(this)) {
                event.preventDefault(); 
                alert("Por favor, complete todos los campos obligatorios.");
            }
        });
    }

    const nav = document.querySelector("nav");
    if (nav) {
        nav.addEventListener("click", function(event) {
            if (event.target.tagName !== 'A') {
                nav.classList.toggle("active"); 
            }
        });
    }

    const productContainer = document.querySelector(".product-container");
    if (productContainer) {
        const filterSelect = document.createElement("select");
        filterSelect.innerHTML = `
            <option value="all">Todos</option>
            <option value="samsung">Samsung</option>
            <option value="iphone">iPhone</option>
            <option value="pixel">Pixel</option>
        `;
        productContainer.parentNode.insertBefore(filterSelect, productContainer);

        filterSelect.addEventListener("change", function() {
            const selectedValue = this.value;
            const productCards = productContainer.querySelectorAll(".product-card");

            productCards.forEach(card => {
                const productName = card.querySelector(".product-name").textContent.toLowerCase();
                if (selectedValue === "all" || productName.includes(selectedValue)) {
                    card.style.display = "block"; 
                } else {
                    card.style.display = "none";
                }
            });
        });
    }

    const productCards = document.querySelectorAll(".product-card");
    productCards.forEach(card => {
        card.addEventListener("click", function() {
            this.classList.toggle("expanded"); 
        });
    });

});

