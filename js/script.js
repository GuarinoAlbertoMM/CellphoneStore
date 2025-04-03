/* Aqui iran las funciones de la pagina */
document.addEventListener("DOMContentLoaded", () => {
    // Validación de formularios
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener("submit", (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                form.querySelectorAll(":invalid").forEach(input => {
                    input.classList.add("error");
                    input.setCustomValidity("Este campo es obligatorio.");
                });
            }
        });

        form.addEventListener("input", (event) => {
            const input = event.target;
            if (input.validity.valid) {
                input.classList.remove("error");
                input.setCustomValidity("");
            }
        });
    });

    // Menú desplegable
    const menuToggle = document.getElementById("menu-toggle");
    const menu = document.getElementById("menu");
    
    if (menuToggle && menu) {
        menuToggle.addEventListener("click", () => {
            const isActive = menu.classList.toggle("active");
            menuToggle.setAttribute("aria-expanded", isActive);
        });
    }

    // Filtros de catálogo
    const filtros = document.querySelectorAll(".filtro");
    const productos = document.querySelectorAll(".producto");
    
    filtros.forEach(filtro => {
        filtro.addEventListener("change", () => {
            const categoriaSeleccionada = document.querySelector(".filtro:checked").value;
            
            productos.forEach(producto => {
                producto.classList.toggle(
                    "hidden",
                    categoriaSeleccionada !== "todos" && producto.dataset.categoria !== categoriaSeleccionada
                );
            });
        });
    });

    // Mostrar/ocultar contenido
    const botonesMostrar = document.querySelectorAll(".mostrar-detalles");
    botonesMostrar.forEach(boton => {
        boton.addEventListener("click", () => {
            const detalles = boton.nextElementSibling;
            if (detalles) {
                detalles.classList.toggle("visible");
            }
        });
    });
});

