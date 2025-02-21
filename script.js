let ubicacion = window.scrollY;
document.getElementById('header').style.top = '-180px';
window.onscroll = function() {
    let DesplazamientoActual = window.scrollY;


    if (ubicacion >= DesplazamientoActual) {
        // Scroll hacia arriba
        document.getElementById('header').style.top = '0';
    } else {
        // Scroll hacia abajo
        document.getElementById('header').style.top = '-200px'; // Ajusta según la altura del header
    }

    // Actualiza la ubicación
    ubicacion = DesplazamientoActual;
};