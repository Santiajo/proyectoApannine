// CODIGO RARO
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Cambio entre modo día y modo noche
modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");

    if (body.classList.contains("dark")) {
        modeText.innerText = "Modo día";
    } else {
        modeText.innerText = "Modo noche";
    }
});

// FUNCIÓN PARA LIMPIAR LOS INPUTS DE LOS FORMULARIOS
function limpiarInputs() {
    document.getElementsByTagName('input').value = '';
}

// FUNCIÓN PARA MOSTRAR NOTIFICACIONES DE ÉXITO
function notificacionExito(mensaje) {
    Swal.fire({
        title: '¡Éxito!',
        text: mensaje,
        icon: 'success',
        confirmButtonText: 'OK'
    });
}

// FUNCIÓN PARA MOSTRAR NOTIFICACIONES DE CONFIRMACIÓN
// CONFIRMAR ELIMINACIÓN
function confirmDelete(event) {
    event.preventDefault();
    const form = event.target;

    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#456BA5',
        cancelButtonColor: '#E1454C',
        confirmButtonText: 'Sí, eliminarlo',
        cancelButtonText: 'No, cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}

// FUNCIÓN PARA LLENAR EL FORMULARIO DE ESPECIALIDADES AL DARLE CLICK EN EDITAR
function editarEspecialidad(especialidad) {
    document.getElementById('especialidadId').value = especialidad.id;
    document.getElementById('especialidadNombre').value = especialidad.especialidadNombre;
    document.getElementById('especialidadAbrev').value = especialidad.especialidadAbreviacion;
}

