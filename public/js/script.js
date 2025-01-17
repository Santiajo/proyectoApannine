// FUNCIÓN PARA LIMPIAR LOS INPUTS DE LOS FORMULARIOS
function limpiarInputs() {
    const inputs = document.getElementsByTagName('input');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }
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


document.addEventListener('DOMContentLoaded', function () {
    // HACEMOS QUE EL ARCHIVO ESCUCHE CUANDO EL FORMULARIO ESPECIALIDADES SE VA A SUBIR
    const formEspecialidad = document.getElementById('formEspecialidad');
    if (formEspecialidad) {
        formEspecialidad.addEventListener('submit', function (event) {
            event.preventDefault();
            console.log('Formulario enviado, ejecutando validación...');
            validarFormEspecialidad();
        })
    } else {
        console.error('No se encontró ningún formulario');
    }
});

// FUNCIÓN PARA VALIDAR EL FORMULARIO DE ESPECIALIDADES
function validarFormEspecialidad() {
    let esValido = true;

    // OBTENER LOS INPUTS
    const especialidadNombre = document.getElementById('especialidadNombre');
    const especialidadAbrev = document.getElementById('especialidadAbrev');

    // OBTENER LOS DIVS DE ERROR
    const errorNombre = document.getElementById('errorEspecialidadNombre');
    const errorAbrev = document.getElementById('errorespecialidadAbrev');

    // VALIDAR NOMBRE ESPECIALIDAD
    const nombreValue = especialidadNombre.value.trim();
    if (nombreValue === '') {
        errorNombre.innerHTML = 'El nombre no puede estar vacío!';
        errorNombre.style.display = 'block';
        esValido = false;
    } else if (nombreValue.length > 20) {
        errorNombre.innerHTML = 'El nombre no puede tener más de 20 caracteres!';
        errorNombre.style.display = 'block';
        esValido = false;
    } else if (/[^a-zA-Z0-9]/.test(nombreValue)) {
        errorNombre.innerHTML = 'El nombre no puede tener caracteres especiales!';
        errorNombre.style.display = 'block';
        esValido = false;
    }

    // VALIDAR ABREVIACIÓN ESPECIALIDAD
    const abrevValue = especialidadAbrev.value.trim();
    if (abrevValue === '') {
        errorAbrev.innerHTML = 'La abreviación no puede estar vacía!';
        errorAbrev.style.display = 'block';
        esValido = false;
    } else if (abrevValue.length > 5) {
        errorAbrev.innerHTML = 'La abreviación no puede tener más de 20 caracteres!';
        errorAbrev.style.display = 'block';
        esValido = false;
    } else if (/[^a-zA-Z0-9]/.test(abrevValue)) {
        errorAbrev.innerHTML = 'La abreviación no puede tener caracteres especiales!';
        errorAbrev.style.display = 'block';
        esValido = false;
    }

    // SI TODO ESTÁ CORRECTO, ENVIAR EL FORMULARIO
    if (esValido) {
        document.querySelector('.formularioPiola').submit();
    }
}
