// Cambiamos a función tradicional y quitamos el tipo Promise
{
function cargarSocios(): void {
    const cuerpoTabla = document.getElementById('tabla-socios') as HTMLTableSectionElement;

    // Usamos fetch directamente con .then() en lugar de await
    fetch('obtener_socios.php')
        .then(function(respuesta) {
            return respuesta.json(); // Convertimos la respuesta a JSON
        })
        .then(function(listaSocios) {
            // Usamos una función tradicional dentro del forEach
            listaSocios.forEach(function(socio: any) {
                const fila = document.createElement('tr');
                
                fila.innerHTML = `
                    <td>${socio.numero_usuario}</td>
                    <td>${socio.nombre}</td>
                    <td>${socio.apellido}</td>
                    <td>${socio.dni}</td>
                    <td>${socio.libros_prestamo}</td>
                `;
                
                cuerpoTabla.appendChild(fila);
            });
        })
        .catch(function(error) {
            console.error("Error al cargar los socios:", error);
        });
}

// Ejecutamos la función al cargar la página
window.onload = cargarSocios;
}
