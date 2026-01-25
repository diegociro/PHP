// Cambiamos a función tradicional y quitamos el tipo Promise
function cargarSocios() {
    var cuerpoTabla = document.getElementById('tabla-socios');
    // Usamos fetch directamente con .then() en lugar de await
    fetch('obtener_socios.php')
        .then(function (respuesta) {
        return respuesta.json(); // Convertimos la respuesta a JSON
    })
        .then(function (listaSocios) {
        // Usamos una función tradicional dentro del forEach
        listaSocios.forEach(function (socio) {
            var fila = document.createElement('tr');
            fila.innerHTML = "\n                    <td>".concat(socio.numero_usuario, "</td>\n                    <td>").concat(socio.nombre, "</td>\n                    <td>").concat(socio.apellido, "</td>\n                    <td>").concat(socio.dni, "</td>\n                    <td>").concat(socio.libros_prestamo, "</td>\n                ");
            cuerpoTabla.appendChild(fila);
        });
    })
        .catch(function (error) {
        console.error("Error al cargar los socios:", error);
    });
}
// Ejecutamos la función al cargar la página
window.onload = cargarSocios;