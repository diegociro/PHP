// Definimos las credenciales permitidas
const usuario_ok = "diegoluz";
const clave_ok = "12345";

// Obtenemos referencias a los elementos del DOM
const usunuevo = document.getElementById('usuario');
const clanueva = document.getElementById('clave');
const boton = document.getElementById('boton');
const error = document.getElementById('error');

// Función que valida los datos
function validarAcceso() {
    const usuario = usunuevo.value;
    const clave = clanueva.value;

    if (usuario === usuario_ok && clave === clave_ok) {
        alert("Acceso concedido");
        window.location.href= "consulta.html";
    } else {
        error.innerText = "Usuario o clave incorrectos.";
        clanueva.value = "";
    }
}

// Asignamos el evento al botón
boton.addEventListener('click', validarAcceso);