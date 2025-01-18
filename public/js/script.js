// FUNCIÓN PARA LIMPIAR LOS INPUTS DE LOS FORMULARIOS
function limpiarInputs() {
    const inputs = document.getElementsByTagName('input');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].value = '';
    }

    const divErrores = document.getElementsByClassName('errores');
    for (let i = 0; i < divErrores.length; i++) {
        divErrores[i].style.display = 'none';
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

// CARGAMOS EL CONTENIDO DOM
document.addEventListener('DOMContentLoaded', function () {
    // HACEMOS QUE EL ARCHIVO ESCUCHE CUANDO EL FORMULARIO ESPECIALIDADES SE VA A SUBIR
    const formEspecialidad = document.getElementById('formEspecialidad');
    const formEspecialista = document.getElementById('formEspecialista');

    if (formEspecialidad) {
        formEspecialidad.addEventListener('submit', function (event) {
            event.preventDefault();
            validarFormEspecialidad();
        })
    } else if (formEspecialista) {
        formEspecialista.addEventListener('submit', function (event) {
            event.preventDefault();
            console.log('Formulario especialista enviado, ejecutando validación...');
            validarFormEspecialista();
        })
    }
});

// FUNCIÓN PARA VALIDAR LOS RUT
function validarRut(rut, dv) {

    suma = 0;
    multiplo = 2;

    for (let i = rut.length - 1; i >= 0; i--) {
        suma = suma + rut.charAt(i) * multiplo;
        if (multiplo < 7) {
            multiplo = multiplo + 1;
        } else {
            multiplo = 2;
        }
    }

    resto = suma % 11;
    resultado = 11 - resto;

    if (resultado == 11) {
        resultado = 0;
        console.log('Resultado' + resultado);
        console.log('Dv' + dv);
    } else if (resultado == 10) {
        resultado = 'K';
        console.log('Resultado' + resultado);
        console.log('Dv' + dv);
    } else {
        resultado = resultado;
        console.log('Resultado' + resultado);
        console.log('Dv' + dv);
    }

    if (resultado == dv) {
        return true;
    } else {
        return false;
    }
}

// FUNCIÓN PARA VALIDAR EL FORMULARIO DE ESPECIALIDADES
function validarFormEspecialidad() {
    let camposValidos = [];

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
        errorNombre.classList.remove('exito');
        errorNombre.style.display = 'block';
        camposValidos.push(false);
    } else if (nombreValue.length > 20) {
        errorNombre.innerHTML = 'El nombre no puede tener más de 20 caracteres!';
        errorNombre.classList.remove('exito');
        errorNombre.style.display = 'block';
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9\s]/.test(nombreValue)) {
        errorNombre.innerHTML = 'El nombre no puede tener caracteres especiales!';
        errorNombre.classList.remove('exito');
        errorNombre.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorNombre.classList.add('exito');
        errorNombre.innerHTML = 'Nombre válido!';
        errorNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR ABREVIACIÓN ESPECIALIDAD
    const abrevValue = especialidadAbrev.value.trim();
    if (abrevValue === '') {
        errorAbrev.innerHTML = 'La abreviación no puede estar vacía!';
        errorAbrev.classList.remove('exito');
        errorAbrev.style.display = 'block';
        camposValidos.push(false);
    } else if (abrevValue.length > 5) {
        errorAbrev.innerHTML = 'La abreviación no puede tener más de 20 caracteres!';
        errorAbrev.classList.remove('exito');
        errorAbrev.style.display = 'block';
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(abrevValue)) {
        errorAbrev.innerHTML = 'La abreviación no puede tener caracteres especiales!';
        errorAbrev.classList.remove('exito');
        errorAbrev.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorAbrev.classList.add('exito')
        errorAbrev.innerHTML = 'Abreviación válida!';
        errorAbrev.style.display = 'block';
        camposValidos.push(true);
    }

    // COMPROBAR SI TODOS LOS CAMPOS SON VÁLIDOS
    const esValido = camposValidos.every(Boolean);

    // SI TODO ESTÁ CORRECTO, ENVIAR EL FORMULARIO
    if (esValido) {
        document.querySelector('.formularioPiola').submit();
    }
}

// FUNCIÓN PARA VALIDAR EL FORMULARIO DE ESPECIALISTAS
function validarFormEspecialista() {
    let camposValidos = [];

    // OBTENEMOS RUT Y DV
    const espRut = document.getElementById('espRut');
    const espDv = document.getElementById('espDv');

    // OBTENEMOS NOMBRES Y APELLIDOS
    const espPNombre = document.getElementById('espPNombre');
    const espSNombre = document.getElementById('espSNombre');
    const espApPaterno = document.getElementById('espApPaterno');
    const espApMaterno = document.getElementById('espApMaterno');

    // OBTENER TELEFONO
    const espTel = document.getElementById('espTel');

    // OBTENER CORREO
    const espEmail = document.getElementById('espEmail');

    // OBTENEMOS LOS DIV DE ERROR
    const errorRut = document.getElementById('errorEspRut');
    const errorDv = document.getElementById('errorEspDv');
    const errorEspPNombre = document.getElementById('errorEspPNombre');
    const errorEspSNombre = document.getElementById('errorEspSNombre');
    const errorEspApPaterno = document.getElementById('errorEspApPaterno');
    const errorEspApMaterno = document.getElementById('errorEspApMaterno');
    const errorEspTel = document.getElementById('errorEspTel');
    const errorEspEmail = document.getElementById('errorEspEmail');

    // VALIDAR RUT
    const rutValue = espRut.value.trim();
    const dvValue = espDv.value.trim().toUpperCase();
    if (rutValue === '') {
        errorRut.innerHTML = 'El rut no puede estar vacío!';
        errorRut.style.display = 'block';
        errorRut.classList.remove('exito');
        errorRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (rutValue.length > 8) {
        errorRut.innerHTML = 'El rut no puede tener más de 8 caracteres!';
        errorRut.style.display = 'block';
        errorRut.classList.remove('exito');
        errorRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(rutValue)) {
        errorRut.innerHTML = 'El rut no puede incluir caracteres especiales!';
        errorRut.style.display = 'block';
        errorRut.classList.remove('exito');
        errorRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (validarRut(rutValue, dvValue) === false) {
        errorRut.innerHTML = 'El rut no es válido!';
        errorRut.style.display = 'block';
        errorRut.classList.remove('exito');
        errorRut.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorRut.classList.add('exito')
        errorRut.classList.add('exito2')
        errorRut.innerHTML = 'Rut válido!';
        errorRut.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR DV
    if (dvValue === '') {
        errorDv.innerHTML = 'El Dv no puede estar vacío!';
        errorDv.style.display = 'block';
        errorDv.classList.remove('exito');
        errorDv.classList.remove('exito2');
        camposValidos.push(false);
    } else if (dvValue.length > 1) {
        errorDv.innerHTML = 'El Dv no puede tener más de 1 caracter!';
        errorDv.style.display = 'block';
        errorDv.classList.remove('exito');
        errorDv.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(dvValue)) {
        errorDv.innerHTML = 'El Dv no puede incluir caracteres especiales!';
        errorDv.style.display = 'block';
        errorDv.classList.remove('exito');
        errorDv.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorDv.classList.add('exito')
        errorDv.classList.add('exito2')
        errorDv.innerHTML = 'Dv válido!';
        errorDv.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR PRIMER NOMBRE
    const pNombreValue = espPNombre.value.trim();
    if (pNombreValue === '') {
        errorEspPNombre.innerHTML = 'El primer nombre no puede estar vacío!';
        errorEspPNombre.style.display = 'block';
        errorEspPNombre.classList.remove('exito');
        errorEspPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (pNombreValue.length > 8) {
        errorEspPNombre.innerHTML = 'El primer nombre no puede tener más de 20 caracteres!';
        errorEspPNombre.style.display = 'block';
        errorEspPNombre.classList.remove('exito');
        errorEspPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(pNombreValue)) {
        errorEspPNombre.innerHTML = 'El primer nombre no puede incluir caracteres especiales!';
        errorEspPNombre.style.display = 'block';
        errorEspPNombre.classList.remove('exito');
        errorEspPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorEspPNombre.classList.add('exito')
        errorEspPNombre.classList.add('exito2')
        errorEspPNombre.innerHTML = 'Primer nombre válido!';
        errorEspPNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR SEGUNDO NOMBRE
    const sNombreValue = espSNombre.value.trim();
    if (sNombreValue.length > 8) {
        errorEspSNombre.innerHTML = 'El segundo nombre no puede tener más de 20 caracteres!';
        errorEspSNombre.style.display = 'block';
        errorEspSNombre.classList.remove('exito');
        errorEspSNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(sNombreValue)) {
        errorEspSNombre.innerHTML = 'El segundo nombre no puede incluir caracteres especiales!';
        errorEspSNombre.style.display = 'block';
        errorEspSNombre.classList.remove('exito');
        errorEspSNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorEspSNombre.classList.add('exito')
        errorEspSNombre.classList.add('exito2')
        errorEspSNombre.innerHTML = 'Segundo nombre válido!';
        errorEspSNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR APELLIDO PATERNO
    const apPaternoValue = espApPaterno.value.trim();
    if (apPaternoValue === '') {
        errorEspApPaterno.innerHTML = 'El apellido paterno no puede estar vacío!';
        errorEspApPaterno.style.display = 'block';
        errorEspApPaterno.classList.remove('exito');
        errorEspApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (apPaternoValue.length > 8) {
        errorEspApPaterno.innerHTML = 'El apellido paterno no puede tener más de 20 caracteres!';
        errorEspApPaterno.style.display = 'block';
        errorEspApPaterno.classList.remove('exito');
        errorEspApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(apPaternoValue)) {
        errorEspApPaterno.innerHTML = 'El apellido paterno no puede incluir caracteres especiales!';
        errorEspApPaterno.style.display = 'block';
        errorEspApPaterno.classList.remove('exito');
        errorEspApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorEspApPaterno.classList.add('exito')
        errorEspApPaterno.classList.add('exito2')
        errorEspApPaterno.innerHTML = 'Apellido paterno válido!';
        errorEspApPaterno.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR APELLIDO MATERNO
    const apMaternoValue = espApMaterno.value.trim();
    if (apMaternoValue === '') {
        errorEspApMaterno.innerHTML = 'El apellido materno no puede estar vacío!';
        errorEspApMaterno.style.display = 'block';
        errorEspApMaterno.classList.remove('exito');
        errorEspApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (apMaternoValue.length > 8) {
        errorEspApMaterno.innerHTML = 'El apellido materno no puede tener más de 20 caracteres!';
        errorEspApMaterno.style.display = 'block';
        errorEspApMaterno.classList.remove('exito');
        errorEspApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(apMaternoValue)) {
        errorEspApMaterno.innerHTML = 'El apellido materno no puede incluir caracteres especiales!';
        errorEspApMaterno.style.display = 'block';
        errorEspApMaterno.classList.remove('exito');
        errorEspApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorEspApMaterno.classList.add('exito')
        errorEspApMaterno.classList.add('exito2')
        errorEspApMaterno.innerHTML = 'Apellido materno válido!';
        errorEspApMaterno.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR TELEFONO
    const telValue = espTel.value.trim();
    if (telValue === '') {
        errorEspTel.innerHTML = 'El telefono no puede estar vacío!';
        errorEspTel.style.display = 'block';
        errorEspTel.classList.remove('exito');
        errorEspTel.classList.remove('exito2');
        camposValidos.push(false);
    } else if (telValue.length < 7) {
        errorEspTel.innerHTML = 'El telefono no puede tener menos de 7 caracteres!';
        errorEspTel.style.display = 'block';
        errorEspTel.classList.remove('exito');
        errorEspTel.classList.remove('exito2');
        camposValidos.push(false);
    } else if (telValue.length > 15) {
        errorEspTel.innerHTML = 'El telefono no puede tener más de 15 caracteres!';
        errorEspTel.style.display = 'block';
        errorEspTel.classList.remove('exito');
        errorEspTel.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorEspTel.classList.add('exito')
        errorEspTel.innerHTML = 'Telefono válido!';
        errorEspTel.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR CORREO
    const emailValue = espEmail.value.trim();
    if (emailValue === '') {
        errorEspEmail.innerHTML = 'El correo no puede estar vacío!';
        errorEspEmail.style.display = 'block';
        errorEspEmail.classList.remove('exito');
        errorEspEmail.classList.remove('exito2');
        camposValidos.push(false);
    } else if (emailValue.length > 50) {
        errorEspEmail.innerHTML = 'El correo no puede tener más de 55 caracteres!';
        errorEspEmail.style.display = 'block';
        errorEspEmail.classList.remove('exito');
        errorEspEmail.classList.remove('exito2');
        camposValidos.push(false);
    } else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/.test(emailValue)) {
        errorEspEmail.innerHTML = 'El correo no es válido!';
        errorEspEmail.style.display = 'block';
        errorEspEmail.classList.remove('exito');
        errorEspEmail.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorEspEmail.classList.add('exito')
        errorEspEmail.innerHTML = 'Correo válido!';
        errorEspEmail.style.display = 'block';
        camposValidos.push(true);
    }

    // COMPROBAR SI TODOS LOS CAMPOS SON VÁLIDOS
    const esValido = camposValidos.every(Boolean);

    // SI TODO ESTÁ CORRECTO, ENVIAR EL FORMULARIO
    if (esValido) {
        document.querySelector('.formularioPiola').submit();
    }
}