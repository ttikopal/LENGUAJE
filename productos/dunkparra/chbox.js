// Obtener todos los checkboxes
const checkboxes = document.querySelectorAll('.dropdownproducto input[type="checkbox"]');

// Agregar un evento de cambio a cada checkbox
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        // Cuando un checkbox es marcado, cerramos los demás instantáneamente
        checkboxes.forEach(otherCheckbox => {
            // Si el checkbox no es el que ha cambiado y está marcado, lo cerramos inmediatamente
            if (otherCheckbox !== checkbox && otherCheckbox.checked) {
                otherCheckbox.checked = false; // Cerramos el otro desplegable
            }
        });
    });
});