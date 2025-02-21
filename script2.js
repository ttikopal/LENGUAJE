let ubicacion = window.scrollY;
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
}
var elem = document.querySelector('input[type="range"]');

var rangeValue = function(){
  var newValue = elem.value;
  var target = document.querySelector('.value');
  target.innerHTML = newValue;
}

elem.addEventListener("input", rangeValue);