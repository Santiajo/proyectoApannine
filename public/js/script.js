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

// FUNCIÓN PARA LLENAR EL FORMULARIO DE COBERTURAS MEDICAS AL DARLE CLICK EN EDITAR
function editarCobertura(cobertura) {
    document.getElementById('cobMedId').value = cobertura.id;
    document.getElementById('cobMedNombre').value = cobertura.nombreCobMed;
}

// FUNCIÓN PARA LLENAR EL FORMULARIO DE COMUNAS AL DARLE CLICK EN EDITAR
function editarComuna(comuna) {
    document.getElementById('comunaId').value = comuna.id;
    document.getElementById('comunaNombre').value = comuna.nombreComuna;
}

// FUNCIÓN PARA LLENAR EL FORMULARIO DE NACIONALIDADES AL DARLE CLICK EN EDITAR
function editarNacionalidad(nacionalidad) {
    document.getElementById('nacionalidadId').value = nacionalidad.id;
    document.getElementById('nacionalidadNombre').value = nacionalidad.nombreNacionalidad;
}

// CARGAMOS EL CONTENIDO DOM
document.addEventListener('DOMContentLoaded', function () {
    // HACEMOS QUE EL ARCHIVO ESCUCHE CUANDO EL FORMULARIO ESPECIALIDADES SE VA A SUBIR
    const formEspecialidad = document.getElementById('formEspecialidad');
    const formEspecialista = document.getElementById('formEspecialista');
    const formNacionalidad = document.getElementById('formNacionalidad');
    const formComuna = document.getElementById('formComuna');
    const formCobMedica = document.getElementById('formCobMedica');
    const formBeneficiario = document.getElementById('formBeneficiario');

    if (formEspecialidad) {
        formEspecialidad.addEventListener('submit', function (event) {
            event.preventDefault();
            validarFormEspecialidad();
        })
    } else if (formEspecialista) {
        formEspecialista.addEventListener('submit', function (event) {
            event.preventDefault();
            validarFormEspecialista();
        })
    } else if (formNacionalidad) {
        formNacionalidad.addEventListener('submit', function (event) {
            event.preventDefault();
            validarCampo('nacionalidadNombre', 'nacionalidad ', 'errorNacionalidadNombre');
        })
    } else if (formComuna) {
        formComuna.addEventListener('submit', function (event) {
            event.preventDefault();
            validarCampo('comunaNombre', 'comuna ', 'errorComunaNombre');
        })
    } else if (formCobMedica) {
        formCobMedica.addEventListener('submit', function (event) {
            event.preventDefault();
            validarCampo('cobMedNombre', 'cobertura médica ', 'errorCobMedNombre');
        })
    } else if (formBeneficiario) {
        formBeneficiario.addEventListener('submit', function (event) {
            event.preventDefault();
            validarFormBeneficiario();
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

// FUNCION PARA CAPITALIZAR PALABRAS
function capitalizeWords(str) {
    return str.replace(/\b\w/g, char => char.toUpperCase());
}

// FUNCIÓN PARA VALIDAR FORMULARIO CON UN SOLO CAMPO
function validarCampo(idCampo, nombreCampo, IdErrorCampo) {
    errorCampo = document.getElementById(IdErrorCampo);

    campo = document.getElementById(idCampo).value.trim();

    if (campo === '') {
        errorCampo.innerHTML = 'La ' + nombreCampo + 'no pueda estar vacía!';
        errorCampo.style.display = 'block';
        errorCampo.classList.remove('exito');
        esValido = false;
    } else if (campo.length > 30) {
        errorCampo.innerHTML = 'La ' + nombreCampo + 'no pueda tener más de 30 caracteres!';
        errorCampo.style.display = 'block';
        errorCampo.classList.remove('exito');
        esValido = false;
    } else if (/[^a-zA-Z0-9\s]/.test(campo)) {
        errorCampo.innerHTML = 'La ' + nombreCampo + 'no puede incluir caracteres especiales!';
        errorCampo.style.display = 'block';
        errorCampo.classList.remove('exito');
        esValido = false;
    } else {
        errorCampo.classList.add('exito')
        errorCampo.innerHTML = capitalizeWords(nombreCampo) + ' válida!';
        errorCampo.style.display = 'block';
        esValido = true;
    }

    if (esValido) {
        document.querySelector('.formularioPiola').submit();
    }
}

// FUNCION PARA FILTRAR LAS VISTAS DEL FORMULARIO BENEFICIARIO
document.addEventListener('DOMContentLoaded', () => {
    // OBTENER LINKS 
        // OBTENER LINK PARA MOSTRAR BENEFICIARIO
        mostrarBeneficiario = document.getElementById('mostrarBeneficiario');
        // OBTENER LINK PARA MOSTRAR COLEGIO
        mostrarColegio = document.getElementById('mostrarColegio');
        
    // OBTENER APARTADOS DEL FORMULARIO
        // OBTENER APARTADO DE BENEFICIARIOS
        apartadoBeneficiarios = document.getElementById('apartadoBeneficiarios');
        console.log(document.getElementById('apartadoBeneficiarios'));
        // OBTENER APARTADO DE COLEGIOS
        apartadoColegio = document.getElementById('apartadoColegio');
        console.log(document.getElementById('apartadoColegio'));

    // FILTRAR APARTADOS
    mostrarBeneficiario.addEventListener('click', () => {
        apartadoBeneficiarios.classList.remove('ocultar');
        apartadoColegio.classList.add('ocultar');
    });

    mostrarColegio.addEventListener('click', () => {
        apartadoColegio.classList.remove('ocultar');
        apartadoBeneficiarios.classList.add('ocultar');
    });
});

// FUNCIÓN PARA VALIDAR EL FORMULARIO DE BENEFICIARIO
function validarFormBeneficiario() {
    let camposValidos = [];

    // OBTENEMOS LOS INPUTS
    benRut = document.getElementById('benRut');
    benDv = document.getElementById('benDv');
    benPNombre = document.getElementById('benPNombre');
    benSNombre = document.getElementById('benSNombre');
    benApPaterno = document.getElementById('benApPaterno');
    benApMaterno = document.getElementById('benApMaterno');
    benFecNac = document.getElementById('benFecNac');
    benTel = document.getElementById('benTel');
    benDom = document.getElementById('benDom');

    // OBTENEMOS LOS DIV DE ERROR
    errorBenRut = document.getElementById('errorBenRut');
    errorBenDv = document.getElementById('errorBenDv');
    errorBenPNombre = document.getElementById('errorBenPNombre');
    errorBenSNombre = document.getElementById('errorBenSNombre');
    errorBenApPaterno = document.getElementById('errorBenApPaterno');
    errorBenApMaterno = document.getElementById('errorBenApMaterno');
    errorBenFecNac = document.getElementById('errorBenFecNac');
    errorBenTel = document.getElementById('errorBenTel');
    errorBenDom = document.getElementById('errorBenDom');

    /// VALIDAR RUT
    const rutValue = benRut.value.trim();
    const dvValue = benDv.value.trim().toUpperCase();
    if (rutValue === '') {
        errorBenRut.innerHTML = 'El rut no puede estar vacío!';
        errorBenRut.style.display = 'block';
        errorBenRut.classList.remove('exito');
        errorBenRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (rutValue.length > 8) {
        errorBenRut.innerHTML = 'El rut no puede tener más de 8 caracteres!';
        errorBenRut.style.display = 'block';
        errorBenRut.classList.remove('exito');
        errorBenRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(rutValue)) {
        errorBenRut.innerHTML = 'El rut no puede incluir caracteres especiales!';
        errorBenRut.style.display = 'block';
        errorBenRut.classList.remove('exito');
        errorBenRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (validarRut(rutValue, dvValue) === false) {
        errorBenRut.innerHTML = 'El rut no es válido!';
        errorBenRut.style.display = 'block';
        errorBenRut.classList.remove('exito');
        errorBenRut.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenRut.classList.add('exito')
        errorBenRut.classList.add('exito2')
        errorBenRut.innerHTML = 'Rut válido!';
        errorBenRut.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR DV
    if (dvValue === '') {
        errorBenDv.innerHTML = 'El Dv no puede estar vacío!';
        errorBenDv.style.display = 'block';
        errorBenDv.classList.remove('exito');
        errorBenDv.classList.remove('exito2');
        camposValidos.push(false);
    } else if (dvValue.length > 1) {
        errorBenDv.innerHTML = 'El Dv no puede tener más de 1 caracter!';
        errorBenDv.style.display = 'block';
        errorBenDv.classList.remove('exito');
        errorBenDv.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(dvValue)) {
        errorBenDv.innerHTML = 'El Dv no puede incluir caracteres especiales!';
        errorBenDv.style.display = 'block';
        errorBenDv.classList.remove('exito');
        errorBenDv.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenDv.classList.add('exito')
        errorBenDv.classList.add('exito2')
        errorBenDv.innerHTML = 'Dv válido!';
        errorBenDv.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR PRIMER NOMBRE
    const pNombreValue = benPNombre.value.trim();
    if (pNombreValue === '') {
        errorBenPNombre.innerHTML = 'El primer nombre no puede estar vacío!';
        errorBenPNombre.style.display = 'block';
        errorBenPNombre.classList.remove('exito');
        errorBenPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (pNombreValue.length > 8) {
        errorBenPNombre.innerHTML = 'El primer nombre no puede tener más de 20 caracteres!';
        errorBenPNombre.style.display = 'block';
        errorBenPNombre.classList.remove('exito');
        errorBenPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(pNombreValue)) {
        errorBenPNombre.innerHTML = 'El primer nombre no puede incluir caracteres especiales!';
        errorBenPNombre.style.display = 'block';
        errorBenPNombre.classList.remove('exito');
        errorBenPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenPNombre.classList.add('exito')
        errorBenPNombre.classList.add('exito2')
        errorBenPNombre.innerHTML = 'Primer nombre válido!';
        errorBenPNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR SEGUNDO NOMBRE
    const sNombreValue = benSNombre.value.trim();
    if (sNombreValue.length > 8) {
        errorBenSNombre.innerHTML = 'El segundo nombre no puede tener más de 20 caracteres!';
        errorBenSNombre.style.display = 'block';
        errorBenSNombre.classList.remove('exito');
        errorBenSNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(sNombreValue)) {
        errorBenSNombre.innerHTML = 'El segundo nombre no puede incluir caracteres especiales!';
        errorBenSNombre.style.display = 'block';
        errorBenSNombre.classList.remove('exito');
        errorBenSNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenSNombre.classList.add('exito')
        errorBenSNombre.classList.add('exito2')
        errorBenSNombre.innerHTML = 'Segundo nombre válido!';
        errorBenSNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR APELLIDO PATERNO
    const apPaternoValue = benApPaterno.value.trim();
    if (apPaternoValue === '') {
        errorBenApPaterno.innerHTML = 'El apellido paterno no puede estar vacío!';
        errorBenApPaterno.style.display = 'block';
        errorBenApPaterno.classList.remove('exito');
        errorBenApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (apPaternoValue.length > 8) {
        errorBenApPaterno.innerHTML = 'El apellido paterno no puede tener más de 20 caracteres!';
        errorBenApPaterno.style.display = 'block';
        errorBenApPaterno.classList.remove('exito');
        errorBenApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(apPaternoValue)) {
        errorBenApPaterno.innerHTML = 'El apellido paterno no puede incluir caracteres especiales!';
        errorBenApPaterno.style.display = 'block';
        errorBenApPaterno.classList.remove('exito');
        errorBenApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenApPaterno.classList.add('exito')
        errorBenApPaterno.classList.add('exito2')
        errorBenApPaterno.innerHTML = 'Apellido paterno válido!';
        errorBenApPaterno.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR APELLIDO MATERNO
    const apMaternoValue = benApMaterno.value.trim();
    if (apMaternoValue === '') {
        errorBenApMaterno.innerHTML = 'El apellido materno no puede estar vacío!';
        errorBenApMaterno.style.display = 'block';
        errorBenApMaterno.classList.remove('exito');
        errorBenApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (apMaternoValue.length > 8) {
        errorBenApMaterno.innerHTML = 'El apellido materno no puede tener más de 20 caracteres!';
        errorBenApMaterno.style.display = 'block';
        errorBenApMaterno.classList.remove('exito');
        errorBenApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(apMaternoValue)) {
        errorBenApMaterno.innerHTML = 'El apellido materno no puede incluir caracteres especiales!';
        errorBenApMaterno.style.display = 'block';
        errorBenApMaterno.classList.remove('exito');
        errorBenApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenApMaterno.classList.add('exito')
        errorBenApMaterno.classList.add('exito2')
        errorBenApMaterno.innerHTML = 'Apellido materno válido!';
        errorBenApMaterno.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR TELEFONO
    const telValue = benTel.value.trim();
    if (telValue === '') {
        errorBenTel.innerHTML = 'El telefono no puede estar vacío!';
        errorBenTel.style.display = 'block';
        errorBenTel.classList.remove('exito');
        errorBenTel.classList.remove('exito2');
        camposValidos.push(false);
    } else if (telValue.length < 7) {
        errorBenTel.innerHTML = 'El telefono no puede tener menos de 7 caracteres!';
        errorBenTel.style.display = 'block';
        errorBenTel.classList.remove('exito');
        errorBenTel.classList.remove('exito2');
        camposValidos.push(false);
    } else if (telValue.length > 15) {
        errorBenTel.innerHTML = 'El telefono no puede tener más de 15 caracteres!';
        errorBenTel.style.display = 'block';
        errorBenTel.classList.remove('exito');
        errorBenTel.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenTel.classList.add('exito')
        errorBenTel.innerHTML = 'Telefono válido!';
        errorBenTel.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAMOS FECHA DE NACIMIENTO

    // VALIDAMOS DOMICILIO
    const domicilioValue = benDom.value.trim();
    if (domicilioValue === '') {
        errorBenDom.innerHTML = 'El domicilio no puede estar vacío!';
        errorBenDom.style.display = 'block';
        errorBenDom.classList.remove('exito');
        errorBenDom.classList.remove('exito2');
        camposValidos.push(false);
    } else if (domicilioValue.length > 100) {
        errorBenDom.innerHTML = 'El domicilio no puede tener más de 100 caracteres!';
        errorBenDom.style.display = 'block';
        errorBenDom.classList.remove('exito');
        errorBenDom.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/[^a-zA-Z0-9]/.test(domicilioValue)) {
        errorBenDom.innerHTML = 'El domicilio no puede incluir caracteres especiales!';
        errorBenDom.style.display = 'block';
        errorBenDom.classList.remove('exito');
        errorBenDom.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenDom.classList.add('exito')
        errorBenDom.classList.add('exito2')
        errorBenDom.innerHTML = 'Domicilio válido!';
        errorBenDom.style.display = 'block';
        camposValidos.push(true);
    }

    // COMPROBAR SI TODOS LOS CAMPOS SON VÁLIDOS
    const esValido = camposValidos.every(Boolean);

    // SI TODO ESTÁ CORRECTO, ENVIAR EL FORMULARIO
    if (esValido) {
        document.querySelector('.formularioPiola').submit();
    }
}