// Definimos las credenciales permitidas
const usuario_ok: string = "diegoluz";
const clave_ok: string = "12345";

// Obtenemos referencias a los elementos del DOM con tipado de TS
const usunuevo = document.getElementById('usuario') as HTMLInputElement;
const clanueva = document.getElementById('clave') as HTMLInputElement;
const boton = document.getElementById('boton') as HTMLButtonElement;
const error = document.getElementById('error') as HTMLParagraphElement;

// Función que valida los datos
    function validarAcceso(): void {
    const usuario: string = usunuevo.value;
    const clave: string = clanueva.value;

    if (usuario === usuario_ok && clave === clave_ok) {
        alert("Acceso concedido");
        window.location.href= "consulta.html";

    } else {
        error.innerText = "Usuario o clave incorrectos.";
        clanueva.value = "";
    }
};

boton.addEventListener('click', validarAcceso);

export{};