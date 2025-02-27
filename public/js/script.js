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

// CARGAMOS CONTENIDO DOM
document.addEventListener('DOMContentLoaded', function () {
    const formBuscarUser = document.getElementById('formBuscarUser');
    const formBuscarEsp = document.getElementById('formBuscarEsp');
    const formBuscarBen = document.getElementById('formBuscarBen');
    const formEspecialidad = document.getElementById('formEspecialidad');
    const formEspecialista = document.getElementById('formEspecialista');
    const formNacionalidad = document.getElementById('formNacionalidad');
    const formComuna = document.getElementById('formComuna');
    const formCobMedica = document.getElementById('formCobMedica');
    const formBeneficiario = document.getElementById('formBeneficiario');

    // HACEMOS QUE EL ARCHIVO ESCUCHE CUANDO EL FORMULARIO ESPECIALIDADES SE VA A SUBIR
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
    else if (formBuscarUser) {
        formBuscarUser.addEventListener('submit', function (event) {
            event.preventDefault();
            validarBarraBusqueda('benBuscar', 'errorBarraBusqueda');
        })
    } else if (formBuscarEsp) {
        formBuscarEsp.addEventListener('submit', function (event) {
            event.preventDefault();
            validarBarraBusqueda('benBuscar', 'errorBarraBusqueda');
        })
    } else if (formBuscarBen) {
        formBuscarBen.addEventListener('submit', function (event) {
            event.preventDefault();
            validarBarraBusqueda('benBuscar', 'errorBarraBusqueda');
        })
    }
});


function validarBarraBusqueda(input, divError) {
    // Obtenemos el input de barra de busqueda
    const Buscar = document.getElementById(input);
    // Obtenemos el valor del input recortado
    const valorInput = Buscar.value.trim();
    // Obtenemos el div para escribir errores
    const errorBarraBusqueda = document.getElementById(divError);

    // Validaciones
    if (valorInput === '') {
        return;
    } else if (valorInput.length > 30) {
        errorBarraBusqueda.innerHTML = "El campo no puede ser mayor a 30 caracteres";
        errorBarraBusqueda.style.display = 'block';
        esValido = false;
    } else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]+$/.test(valorInput)) {
        errorBarraBusqueda.innerHTML = "El campo no puede incluir caracteres especiales";
        errorBarraBusqueda.style.display = 'block';
        esValido = false;
    } else {
        errorBarraBusqueda.classList.remove('errores');
        errorBarraBusqueda.classList.remove('errores2');
        errorBarraBusqueda.classList.add('exito');
        errorBarraBusqueda.innerHTML = 'Campo válido!';
        errorBarraBusqueda.style.display = 'block';
        esValido = true;
        console.log(esValido);
    }

    if (esValido) {
        document.querySelector('.barraBusqueda').submit();
    }
}

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

// FUNCIÓN PARA AÑADIR FAMILIARES DINAMICAMENTE
document.addEventListener("DOMContentLoaded", function () {
    let contadorFamiliares = document.querySelectorAll(".seccion-familiares").length - 1;
    let contenedor = document.getElementById("contenedorFamiliares");

    function actualizarBotonesEliminar() {
        let formularios = document.querySelectorAll(".seccion-familiares");
        formularios.forEach((formulario, index) => {
            let botonEliminar = formulario.querySelector(".eliminarFamiliar");
            if (botonEliminar) {
                botonEliminar.disabled = formularios.length === 1;
            }
            let titulo = formulario.querySelector(".titulo-familiar");
            if (titulo) {
                titulo.textContent = `Datos Familiar ${index + 1}`;
            }
        });
    }

    contenedor.addEventListener("click", function (event) {
        if (event.target.classList.contains("agregarFamiliar")) {
            contadorFamiliares++;
            let formularioActual = event.target.closest(".seccion-familiares");
            let clon = formularioActual.cloneNode(true);

            clon.querySelectorAll("input, select, fieldset, label, .errores").forEach((elemento) => {
                if (elemento.name) {
                    elemento.name = elemento.name.replace(/\[\d+\]/, `[${contadorFamiliares}]`);
                }
                if (elemento.id) {
                    elemento.id = elemento.id.replace(/_\d+$/, `_${contadorFamiliares}`);
                }
                if (elemento.tagName === "INPUT") {
                    elemento.value = "";
                }
                if (elemento.classList.contains("errores")) {
                    elemento.innerHTML = "";
                }
            });

            document.getElementById("contenedorFamiliares").appendChild(clon);
            actualizarBotonesEliminar();
        }

        if (event.target.classList.contains("eliminarFamiliar")) {
            let formulario = event.target.closest(".seccion-familiares");
            if (document.querySelectorAll(".seccion-familiares").length > 1) {
                formulario.remove();
                contadorFamiliares--;
                actualizarNumeracion();
            }
        }
    });

    function actualizarNumeracion() {
        let familiares = document.querySelectorAll(".seccion-familiares");
        familiares.forEach((familiar, index) => {
            let titulo = familiar.querySelector(".titulo-familiar");
            if (titulo) {
                titulo.textContent = `Datos Familiar ${index + 1}`;
            }

            familiar.querySelectorAll("input, select, fieldset, label, .errores").forEach((elemento) => {
                if (elemento.name) {
                    elemento.name = elemento.name.replace(/\[\d+\]/, `[${index}]`);
                }
                if (elemento.id) {
                    elemento.id = elemento.id.replace(/_\d+$/, `_${index}`);
                }
            });
        });
    }

    // Función separada para validar un campo individualmente
    function validarCampo(input) {
        let id = input.id;
        let valor = input.value.trim();
        let errorDiv = document.getElementById(`error${id.charAt(0).toUpperCase() + id.slice(1)}`);

        if (!errorDiv) {
            errorDiv = document.createElement("div");
            errorDiv.className = "errores";
            errorDiv.id = `error${id.charAt(0).toUpperCase() + id.slice(1)}`;
            input.insertAdjacentElement("afterend", errorDiv);
        }

        let parentLayoutTelefono = input.closest("#layoutTelefono");
        let parentLayoutNombre = input.closest("#layoutNombre");

        if (parentLayoutTelefono || parentLayoutNombre) {
            errorDiv.classList.add("errores2");
        } else {
            errorDiv.classList.remove("errores2");
        }

        let valido = true;
        let mensajeError = "";

        // Evitar validación de mensaje en radio y select
        if (input.type === "radio" || input.tagName === "SELECT") {
            errorDiv.style.display = "none";
            return;
        }

        if (id.includes("famRut") && (isNaN(valor) || valor.length < 7 || valor.length > 9)) {
            mensajeError = "El RUT debe tener entre 7 y 9 dígitos.";
            valido = false;
        } else if (id.includes("famDv") && !/^[0-9kK]$/.test(valor)) {
            mensajeError = "El dígito verificador debe ser un número o 'K'.";
            valido = false;
        } else if (id.includes("famPNombre") || id.includes("famSNombre") || id.includes("famApPaterno") || id.includes("famApMaterno")) {
            if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(valor)) {
                mensajeError = "El nombre/apellido solo puede contener letras y espacios.";
                valido = false;
            }
        } else if (id.includes("famTel") && !/^\d{9,12}$/.test(valor)) {
            mensajeError = "El teléfono debe tener entre 9 y 12 dígitos.";
            valido = false;
        } else if (id.includes("famEmail") && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(valor)) {
            mensajeError = "Ingrese un correo electrónico válido.";
            valido = false;
        }

        if (!valido) {
            errorDiv.textContent = mensajeError;
            errorDiv.classList.add("errores");
            errorDiv.style.display = "block";
        } else {
            mensajeError = "Campo válido!";
            errorDiv.textContent = mensajeError;

            errorDiv.classList.remove("errores");
            errorDiv.classList.remove("errores2");
            errorDiv.classList.add("exito");

            if (parentLayoutTelefono || parentLayoutNombre) {
                errorDiv.classList.add("exito2");
            } else {
                errorDiv.classList.remove("exito2");
            }

            errorDiv.style.display = "block";
        }

        return valido;
    }


    function validarFormulario(event) {
        let camposValidos = [];
        let formularios = document.querySelectorAll(".seccion-familiares");

        formularios.forEach((formulario) => {
            let inputs = formulario.querySelectorAll("input, select");
            inputs.forEach((input) => {
                let esValido = validarCampo(input);
                camposValidos.push(esValido);
            });
        });

        const esValido = camposValidos.every(Boolean);
        if (!esValido) {
            event.preventDefault();
        }
    }

    // 📌 Asignar validación al envío del formulario
    let formularioPrincipal = document.getElementById("formBeneficiario");
    if (formularioPrincipal) {
        formularioPrincipal.addEventListener("submit", validarFormulario);
    }

    actualizarBotonesEliminar();
});

// FUNCIÓN PARA AÑADIR DOCUMENTOS DINAMICAMENTE
document.addEventListener("DOMContentLoaded", function () {
    let contadorDocumentos = document.querySelectorAll(".documento-item").length - 1;

    document.getElementById("agregarDocumento").addEventListener("click", function () {
        contadorDocumentos++;

        let nuevoDocumento = document.createElement("div");
        nuevoDocumento.classList.add("documento-item");

        let nuevoLabel = document.createElement("label");
        nuevoLabel.setAttribute("for", `benEvidMed_${contadorDocumentos}`);
        nuevoLabel.textContent = `Documento ${contadorDocumentos + 1}:`;

        let nuevoInput = document.createElement("input");
        nuevoInput.setAttribute("type", "file");
        nuevoInput.setAttribute("name", "benEvidMed[]");
        nuevoInput.setAttribute("id", `benEvidMed_${contadorDocumentos}`);

        let botonEliminar = document.createElement("button");
        botonEliminar.classList.add("boton-secundario", "eliminar-documento");
        botonEliminar.type = "button";
        botonEliminar.textContent = "Eliminar Documento";

        botonEliminar.addEventListener("click", function () {
            nuevoDocumento.remove();
            actualizarNumeracion();
        });

        nuevoDocumento.appendChild(nuevoLabel);
        nuevoDocumento.appendChild(nuevoInput);
        nuevoDocumento.appendChild(botonEliminar);

        document.getElementById("documentosContainer").appendChild(nuevoDocumento);

        actualizarNumeracion();
    });

    function actualizarNumeracion() {
        let documentos = document.querySelectorAll(".documento-item");
        documentos.forEach((doc, index) => {
            let label = doc.querySelector("label");
            let input = doc.querySelector("input");

            label.setAttribute("for", `benEvidMed_${index}`);
            label.textContent = `Documento ${index + 1}:`;

            input.setAttribute("id", `benEvidMed_${index}`);
        });

        contadorDocumentos = documentos.length - 1;
    }
});

// FUNCIÓN PARA FILTRAR LAS VISTAS DEL FORMULARIO BENEFICIARIO
document.addEventListener('DOMContentLoaded', () => {
    // OBTENER LINKS
    const mostrarBeneficiario = document.getElementById('mostrarBeneficiario');
    const mostrarColegio = document.getElementById('mostrarColegio');
    const mostrarDerivante = document.getElementById('mostrarDerivante');
    const mostrarFamilia = document.getElementById('mostrarFamilia');
    const mostrarAntSalud = document.getElementById('mostrarAntSalud');
    const mostrarAntSocial = document.getElementById('mostrarAntSocial');
    const mostrarDiagnostico = document.getElementById('mostrarDiagnostico');

    // OBTENER APARTADOS DEL FORMULARIO
    const apartadoBeneficiarios = document.getElementById('apartadoBeneficiarios');
    const apartadoColegio = document.getElementById('apartadoColegio');
    const apartadoDerivante = document.getElementById('apartadoDerivante');
    const apartadoFamilia = document.getElementById('apartadoFamilia');
    const apartadoAntSalud = document.getElementById('apartadoAntSalud');
    const apartadoAntSocial = document.getElementById('apartadoAntSocial');
    const apartadoDiagnostico = document.getElementById('apartadoDiagnostico');

    // OBTENER EL DIV QUE CONTIENE LOS FAMILIARES
    const contenedorFamiliares = document.getElementById('contenedorFamiliares');

    // FUNCION PARA OCULTAR TODOS LOS APARTADOS (sin incluir grupoBotones)
    function ocultarTodosLosApartados() {
        const apartados = [
            apartadoBeneficiarios,
            apartadoColegio,
            apartadoDerivante,
            apartadoFamilia,
            apartadoAntSalud,
            apartadoAntSocial,
            apartadoDiagnostico
        ];
        apartados.forEach(apartado => apartado.classList.add('ocultar'));
        // También oculta el contenedor de familiares
        contenedorFamiliares.classList.add('ocultar');
    }

    // MOSTRAR SOLO EL FORMULARIO DE BENEFICIARIO AL CARGAR
    ocultarTodosLosApartados();
    apartadoBeneficiarios.classList.remove('ocultar');

    // CONFIGURAR EVENTOS PARA MOSTRAR LOS FORMULARIOS
    mostrarBeneficiario.addEventListener('click', () => {
        ocultarTodosLosApartados();
        apartadoBeneficiarios.classList.remove('ocultar');
    });

    mostrarColegio.addEventListener('click', () => {
        ocultarTodosLosApartados();
        apartadoColegio.classList.remove('ocultar');
    });

    mostrarDerivante.addEventListener('click', () => {
        ocultarTodosLosApartados();
        apartadoDerivante.classList.remove('ocultar');
    });

    mostrarFamilia.addEventListener('click', () => {
        ocultarTodosLosApartados();
        apartadoFamilia.classList.remove('ocultar');
        contenedorFamiliares.classList.remove('ocultar'); // Mostrar familiares cuando se selecciona "Familia"
    });

    mostrarAntSalud.addEventListener('click', () => {
        ocultarTodosLosApartados();
        apartadoAntSalud.classList.remove('ocultar');
    });

    mostrarAntSocial.addEventListener('click', () => {
        ocultarTodosLosApartados();
        apartadoAntSocial.classList.remove('ocultar');
    });

    mostrarDiagnostico.addEventListener('click', () => {
        ocultarTodosLosApartados();
        apartadoDiagnostico.classList.remove('ocultar');
    });
});

// FUNCIÓN REUTILIZABLE PARA DESHABILITAR CAMPOS ASOCIADOS A RADIO BUTTONS
function setupToggleFields(radioYesId, radioNoId, fieldIds) {
    // OBTENEMOS LOS RADIO BUTTONS
    const benAsisColSi = document.getElementById(radioYesId);
    const benAsisColNo = document.getElementById(radioNoId);

    // MAPEAMOS LOS INPUTS ASOCIADOS
    const fields = fieldIds.map(id => document.getElementById(id));

    // FUNCIÓN PARA DESHABILITAR O HABILITAR CAMPOS
    const toggleFields = () => {
        const isDisabled = benAsisColNo.checked; // Si está marcado "No"
        fields.forEach(field => {
            field.disabled = isDisabled;
            if (isDisabled) {
                field.value = '';
            }
        });
    };

    // ASOCIAMOS EL EVENTO change A LOS RADIO BUTTONS
    benAsisColSi.addEventListener('change', toggleFields);
    benAsisColNo.addEventListener('change', toggleFields);

    // LLAMAMOS LA FUNCIÓN AL CARGAR LA PÁGINA PARA AJUSTAR EL ESTADO INICIAL
    toggleFields();
}

// FUNCIÓN REUTILIZABLE PARA COMPROBAR QUE LOS RADIO BUTTONS ESTEN MARCADOS
function isAnyRadioChecked(radioIds) {
    return radioIds.some(id => {
        const radio = document.getElementById(id);
        return radio && radio.checked;
    });
}

// FUNCIÓN PARA CHECKEAR LOS RADIO BUTTONS DE CUIDADOR
function areAllRadioButtonsCheckedInSections(sectionClass, radioName) {
    const sections = document.querySelectorAll(`.${sectionClass}`);
    let allChecked = true;

    sections.forEach(section => {
        const radios = section.querySelectorAll(`input[name="${radioName}"]`);
        const isChecked = Array.from(radios).some(radio => radio.checked);
        if (!isChecked) {
            allChecked = false;
        }
    });

    return allChecked;
}

// FUNCIÓN REUTILIZABLE PARA DESACTIVAR INPUTS DE TEXTO EN CASO DE SER NECESARIO
function desactivarInputTexto(inputId, inputId2) {
    const input = document.getElementById(inputId);
    const input2 = document.getElementById(inputId2);

    // Verifica si los elementos existen
    if (input && input2) {
        input2.disabled = true;
        input.addEventListener('input', () => {
            console.log(`Valor del input (${inputId}):`, input.value);
            if (input.value.trim() === '') {
                input2.value = '';
                input2.disabled = true;
            } else {
                input2.disabled = false;
            }
        });
    } else {
        console.error(`Elementos con IDs "${inputId}" o "${inputId2}" no encontrados.`);
    }
}

// FUNCION PARA VALIDAR LA EXTENSION DEL ARCHIVO
function validarArchivo(nombreArchivo) {
    // EXTENSIONES PERMITIDAS
    const extensionesValidas = ['.pdf', '.docx'];

    // VALIDAR QUE EL NOMBRE DEL INPUT COINCIDA CON LAS COLOCACADAS EN LA LISTA
    return extensionesValidas.some((extension) => nombreArchivo.toLowerCase().endsWith(extension));
}

document.addEventListener('DOMContentLoaded', () => {
    // VALIDAMOS LOS INPUTS QUE DEBEN DE SER DESHABILITADOS
    desactivarInputTexto('devNombre', 'devObservaciones');
    // AJUSTAMOS CAMPOS A DESAHIBILITAR DEPENDIENDO DEl VALOR ASISTIR A COLEGIO
    setupToggleFields(
        'benAsisColSi', // ID del radio "Sí"
        'benAsisColNo', // ID del radio "No"
        ['colNom', 'colTel', 'benCurso', 'colProfJefe'] // IDs de los campos asociados
    );
    // AJUSTAMOS CAMPOS A DESAHIBILITAR DEPENDIENDO DEl VALOR SI TUVO CIRUGIAS
    setupToggleFields(
        'benCirugiaSi',
        'benCirugiaNo',
        ['benCirugiaNom']
    );
    // AJUSTAMOS CAMPOS A DESAHIBILITAR DEPENDIENDO DEl VALOR SI TUVO CIRUGIAS
    setupToggleFields(
        'benFicFamSi',
        'benFicFamNo',
        ['benFicFamPtje']
    );
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

    // RADIO INPUTS
    const asisteAColegio = ['benAsisColSi', 'benAsisColNo'];
    const errorAsistirCol = document.getElementById('errorAsistirCol');
    const tuvoCirugias = ['benCirugiaSi', 'benCirugiaNo'];
    const errorTuvoCir = document.getElementById('errorTuvoCir');
    const fichaFamiliar = ['benFicFamSi', 'benFicFamNo'];
    const errorFichaFam = document.getElementById('tieneFicFam');
    const credDiscapacidad = ['benCredDiscSi', 'benCredDiscNo'];
    const errorCredDiscapacidad = document.getElementById('errorCredDiscapacidad');
    const esCuidador = ['famCuidadorSi', 'famCuidadorNo'];
    const errorEsCuidador = document.getElementById('errorEsCuidador');

    // VALIDAR RADIO BUTTON SI ASISTE AL COLEGIO
    if (!isAnyRadioChecked(asisteAColegio)) {
        errorAsistirCol.innerHTML = 'Por favor, seleccione al menos una opción!';
        errorAsistirCol.classList.remove('exito');
        errorAsistirCol.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorAsistirCol.innerHTML = 'Opción válida!';
        errorAsistirCol.classList.add('exito');
        errorAsistirCol.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR SI TUVO CIRUGÍAS
    if (!isAnyRadioChecked(tuvoCirugias)) {
        errorTuvoCir.innerHTML = 'Por favor, seleccione al menos una opción!';
        errorTuvoCir.classList.remove('exito');
        errorTuvoCir.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorTuvoCir.innerHTML = 'Opción válida!';
        errorTuvoCir.classList.add('exito');
        errorTuvoCir.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR SI TIENE FICHA FAMILIAR 
    if (!isAnyRadioChecked(fichaFamiliar)) {
        errorFichaFam.innerHTML = 'Por favor, seleccione al menos una opción!';
        errorFichaFam.classList.remove('exito');
        errorFichaFam.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorFichaFam.innerHTML = 'Opción válida!';
        errorFichaFam.classList.add('exito');
        errorFichaFam.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR SI TIENE CREDENCIAL DE DISCAPACIDAD 
    if (!isAnyRadioChecked(credDiscapacidad)) {
        errorCredDiscapacidad.innerHTML = 'Por favor, seleccione al menos una opción!';
        errorCredDiscapacidad.classList.remove('exito');
        errorCredDiscapacidad.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorCredDiscapacidad.innerHTML = 'Opción válida!';
        errorCredDiscapacidad.classList.add('exito');
        errorCredDiscapacidad.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR SI FAMILIAR ES CUIDADOR 
    /* if (!isAnyRadioChecked(esCuidador)) {
        errorEsCuidador.innerHTML = 'Por favor, seleccione al menos una opción!';
        errorEsCuidador.classList.remove('exito');
        errorEsCuidador.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorEsCuidador.innerHTML = 'Opción válida!';
        errorEsCuidador.classList.add('exito');
        errorEsCuidador.style.display = 'block';
        camposValidos.push(true);
    } */

    // VALIDAR RUT
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
    if (telValue != '' && telValue.length < 7) {
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
    } else if (!/^[a-zA-Z0-9 ]*$/.test(domicilioValue)) {
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

    // INPUTS DEL COLEGIO
    const colNom = document.getElementById('colNom');
    const colTel = document.getElementById('colTel');
    const benCurso = document.getElementById('benCurso');
    const colProfJefe = document.getElementById('colProfJefe');

    // VALIDAR NOMBRE DEL COLEGIO
    const colNomValue = colNom.value.trim();
    const errorColNombre = document.getElementById('errorColNom');
    if (colNomValue.length > 30) {
        errorColNombre.innerHTML = 'El nombre del colegio no puede tener más de 30 caracteres!';
        errorColNombre.style.display = 'block';
        errorColNombre.classList.remove('exito');
        errorColNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (!/^[a-zA-Z0-9 ]*$/.test(colNomValue)) {
        errorColNombre.innerHTML = 'El nombre del colegio no puede incluir caracteres especiales!';
        errorColNombre.style.display = 'block';
        errorColNombre.classList.remove('exito');
        errorColNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorColNombre.classList.add('exito')
        errorColNombre.classList.add('exito2')
        errorColNombre.innerHTML = 'Nombre válido!';
        errorColNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR TELEFONO DEL COLEGIO
    const colTelValue = colTel.value.trim();
    const errorColTel = document.getElementById('errorColTel');
    if (colTelValue != '' && colTelValue.length < 7) {
        errorColTel.innerHTML = 'El telefono del colegio no puede tener menos de 7 caracteres!';
        errorColTel.style.display = 'block';
        errorColTel.classList.remove('exito');
        errorColTel.classList.remove('exito2');
        camposValidos.push(false);
    } else if (colTelValue.length > 15) {
        errorColTel.innerHTML = 'El telefono del colegio no puede tener más de 15 caracteres!';
        errorColTel.style.display = 'block';
        errorColTel.classList.remove('exito');
        errorColTel.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorColTel.classList.add('exito')
        errorColTel.innerHTML = 'Telefono válido!';
        errorColTel.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR CURSO
    const benCursoValue = benCurso.value.trim();
    const errorBenCurso = document.getElementById('errorBenCurso');
    if (benCursoValue.length > 25) {
        errorBenCurso.innerHTML = 'El curso no puede tener más de 25 caracteres!';
        errorBenCurso.style.display = 'block';
        errorBenCurso.classList.remove('exito');
        errorBenCurso.classList.remove('exito2');
        camposValidos.push(false);
    } else if (!/^[a-zA-Z0-9 ]*$/.test(benCursoValue)) {
        errorBenCurso.innerHTML = 'El curso no puede incluir caracteres especiales!';
        errorBenCurso.style.display = 'block';
        errorBenCurso.classList.remove('exito');
        errorBenCurso.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorBenCurso.classList.add('exito')
        errorBenCurso.classList.add('exito2')
        errorBenCurso.innerHTML = 'Curso válido!';
        errorBenCurso.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR PRIMER PROFESOR JEFE
    const colProfJefeValue = colProfJefe.value.trim();
    const errorColProfJefe = document.getElementById('errorColProfJefe');
    if (colProfJefeValue.length > 60) {
        errorColProfJefe.innerHTML = 'El nombre del profesor no puede tener más de 60 caracteres!';
        errorColProfJefe.style.display = 'block';
        errorColProfJefe.classList.remove('exito');
        errorColProfJefe.classList.remove('exito2');
        camposValidos.push(false);
    } else if (!/^[a-zA-Z0-9 ]*$/.test(colProfJefeValue)) {
        errorColProfJefe.innerHTML = 'El nombre del profesor no puede incluir caracteres especiales!';
        errorColProfJefe.style.display = 'block';
        errorColProfJefe.classList.remove('exito');
        errorColProfJefe.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorColProfJefe.classList.add('exito')
        errorColProfJefe.classList.add('exito2')
        errorColProfJefe.innerHTML = 'Nombre del profesor válido!';
        errorColProfJefe.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR NOMBRE DE DERIVANTE
    const devNombre = document.getElementById('devNombre');
    const devNombreValue = devNombre.value.trim();
    const errorDevNombre = document.getElementById('errorDevNombre');
    if (devNombreValue.length > 60) {
        errorDevNombre.innerHTML = 'El nombre del derivante no puede tener más de 60 caracteres!';
        errorDevNombre.style.display = 'block';
        errorDevNombre.classList.remove('exito');
        camposValidos.push(false);
    } else if (!/^[a-zA-Z0-9 ]*$/.test(devNombreValue)) {
        errorDevNombre.innerHTML = 'El nombre del derivante no puede incluir caracteres especiales!';
        errorDevNombre.style.display = 'block';
        errorDevNombre.classList.remove('exito');
        camposValidos.push(false);
    } else {
        errorDevNombre.classList.add('exito')
        errorDevNombre.innerHTML = 'Nombre del derivante válido!';
        errorDevNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR OBSERVACIONES DE DERIVANTE
    const devObservaciones = document.getElementById('devObservaciones');
    const devObservacionesValue = devObservaciones.value.trim();
    const errorDevObservaciones = document.getElementById('errorDevObservaciones');
    if (!/^[a-zA-Z0-9 ]*$/.test(devObservacionesValue)) {
        errorDevObservaciones.innerHTML = 'Las observaciones del derivante no pueden incluir caracteres especiales!';
        errorDevObservaciones.style.display = 'block';
        errorDevObservaciones.classList.remove('exito');
        camposValidos.push(false);
    } else {
        errorDevObservaciones.classList.add('exito')
        errorDevObservaciones.innerHTML = 'Observaciones del derivante válido!';
        errorDevObservaciones.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDACIONES DE LA FAMILIA


    // VALIDAR NEE DEL BENEFICIARIO
    const benNee = document.getElementById('benNee');
    const benNeeValue = benNee.value.trim();
    const erroBenNee = document.getElementById('erroBenNee');
    if (!/^[a-zA-Z0-9 ]*$/.test(benNeeValue)) {
        erroBenNee.innerHTML = 'Las NEE no pueden incluir caracteres especiales!';
        erroBenNee.style.display = 'block';
        erroBenNee.classList.remove('exito');
        camposValidos.push(false);
    } else {
        erroBenNee.classList.add('exito')
        erroBenNee.innerHTML = 'NEE válidas!';
        erroBenNee.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR ENFERMEDADES CRONICAS DEL BENEFICIARIO
    const benEnfCro = document.getElementById('benEnfCro');
    const benEnfCroValue = benEnfCro.value.trim();
    const erroBenEnfCro = document.getElementById('erroBenEnfCro');
    if (!/^[a-zA-Z0-9 ]*$/.test(benEnfCroValue)) {
        erroBenEnfCro.innerHTML = 'Las enfermedades crónicas no pueden incluir caracteres especiales!';
        erroBenEnfCro.style.display = 'block';
        erroBenEnfCro.classList.remove('exito');
        camposValidos.push(false);
    } else {
        erroBenEnfCro.classList.add('exito')
        erroBenEnfCro.innerHTML = 'Enfermedades crónicas válidas!';
        erroBenEnfCro.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR TRATAMIENTOS DEL BENEFICIARIO
    const benTratamientos = document.getElementById('benTratamientos');
    const benTratamientosValue = benTratamientos.value.trim();
    const erroBenTratamientos = document.getElementById('erroBenTratamientos');
    if (!/^[a-zA-Z0-9 ]*$/.test(benTratamientosValue)) {
        erroBenTratamientos.innerHTML = 'Los tratamientos no pueden incluir caracteres especiales!';
        erroBenTratamientos.classList.remove('exito');
        erroBenTratamientos.style.display = 'block';
        camposValidos.push(false);
    } else {
        erroBenTratamientos.classList.add('exito')
        erroBenTratamientos.innerHTML = 'Tratamientos válidos!';
        erroBenTratamientos.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR DESCRIPCIONES DE LAS OPERACIONES DEL BENEFICIARIO
    benCirugiaNom = document.getElementById('benCirugiaNom');
    errorBenCirugiaNom = document.getElementById('errorBenCirugiaNom');
    benCirugiaNomValue = benCirugiaNom.value.trim();
    if (!/^[a-zA-Z0-9 ]*$/.test(benCirugiaNomValue)) {
        errorBenCirugiaNom.innerHTML = 'Los tratamientos no pueden incluir caracteres especiales!';
        errorBenCirugiaNom.classList.remove('exito');
        errorBenCirugiaNom.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorBenCirugiaNom.innerHTML = 'Operaciones válidas!';
        errorBenCirugiaNom.classList.add('exito');
        errorBenCirugiaNom.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR BENEFICIOS SOCIALES EXTRAS
    benBenSocOtro = document.getElementById('benBenSocOtro');
    errorBenBenSocOtro = document.getElementById('errorBenBenSocOtro');
    benBenSocValue = benBenSocOtro.value.trim();
    if (!/^[a-zA-Z0-9 ]*$/.test(benBenSocValue)) {
        errorBenBenSocOtro.innerHTML = 'Los beneficios sociales extra no pueden incluir caracteres especiales!';
        errorBenBenSocOtro.classList.remove('exito');
        errorBenBenSocOtro.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorBenBenSocOtro.innerHTML = 'Beneficios sociales extra válidos!';
        errorBenBenSocOtro.classList.add('exito');
        errorBenBenSocOtro.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR DIAGNOSTICO
    benDiag = document.getElementById('benDiag');
    errorBenDiag = document.getElementById('errorBenDiag');
    benDiagValue = benDiag.value.trim();
    if (benDiagValue === '') {
        errorBenDiag.innerHTML = 'La evaluación diagnóstica no puede estar vacía!';
        errorBenDiag.classList.remove('exito');
        errorBenDiag.style.display = 'block';
        camposValidos.push(false);
    } else if (!/^[a-zA-Z0-9 ]*$/.test(benDiagValue)) {
        errorBenDiag.innerHTML = 'La evaluación diagnóstica no puede incluir caracteres especiales!';
        errorBenDiag.classList.remove('exito');
        errorBenDiag.style.display = 'block';
        camposValidos.push(false);
    } else {
        errorBenDiag.innerHTML = 'Evaluación diagnóstica válida!';
        errorBenDiag.classList.add('exito');
        errorBenDiag.style.display = 'block';
        camposValidos.push(true);
    }

    // COMPROBAR SI TODOS LOS CAMPOS SON VÁLIDOS
    const esValido = camposValidos.every(Boolean);

    // SI TODO ESTÁ CORRECTO, ENVIAR EL FORMULARIO
    if (esValido) {
        document.querySelector('.formularioPiola').submit();
    }
}

function validarFormularioUsuario() {
    let camposValidos = [];

    // OBTENEMOS RUT Y DV
    const userRut = document.getElementById('userRut');
    const userDv = document.getElementById('userDv');

    // OBTENEMOS NOMBRES Y APELLIDOS
    const userPNombre = document.getElementById('userPNombre');
    const userSNombre = document.getElementById('userSNombre');
    const userApPaterno = document.getElementById('userApPaterno');
    const userApMaterno = document.getElementById('userApMaterno');

    // OBTENER TELEFONO
    const userTel = document.getElementById('userTel');

    // OBTENER CORREO
    const userEmail = document.getElementById('userEmail');

    // OBTENEMOS LOS DIV DE ERROR
    const errorUserRut = document.getElementById('errorUserRut');
    const errorUserDv = document.getElementById('errorUserDv');
    const errorUserPNombre = document.getElementById('errorUserPNombre');
    const errorUserSNombre = document.getElementById('errorUserSNombre');
    const errorUserApPaterno = document.getElementById('errorUserApPaterno');
    const errorUserApMaterno = document.getElementById('errorUserApMaterno');
    const errorUserTel = document.getElementById('errorUserTel');
    const errorUserEmail = document.getElementById('errorUserEmail');

    // VALIDAR RUT
    const rutValue = userRut.value.trim();
    const dvValue = userDv.value.trim().toUpperCase();
    if (rutValue === '') {
        errorUserRut.innerHTML = 'El rut no puede estar vacío!';
        errorUserRut.style.display = 'block';
        errorUserRut.classList.remove('exito');
        errorUserRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (rutValue.length > 8) {
        errorUserRut.innerHTML = 'El rut no puede tener más de 8 caracteres!';
        errorUserRut.style.display = 'block';
        errorUserRut.classList.remove('exito');
        errorUserRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/^[0-9Kk]$/.test(rutValue)) {
        errorUserRut.innerHTML = 'El rut no puede incluir caracteres especiales!';
        errorUserRut.style.display = 'block';
        errorUserRut.classList.remove('exito');
        errorUserRut.classList.remove('exito2');
        camposValidos.push(false);
    } else if (validarRut(rutValue, dvValue) === false) {
        errorUserRut.innerHTML = 'El rut no es válido!';
        errorUserRut.style.display = 'block';
        errorUserRut.classList.remove('exito');
        errorUserRut.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserRut.classList.add('exito')
        errorUserRut.classList.add('exito2')
        errorUserRut.innerHTML = 'Rut válido!';
        errorUserRut.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR DV
    if (dvValue === '') {
        errorUserDv.innerHTML = 'El Dv no puede estar vacío!';
        errorUserDv.style.display = 'block';
        errorUserDv.classList.remove('exito');
        errorUserDv.classList.remove('exito2');
        camposValidos.push(false);
    } else if (dvValue.length > 1) {
        errorUserDv.innerHTML = 'El Dv no puede tener más de 1 caracter!';
        errorUserDv.style.display = 'block';
        errorUserDv.classList.remove('exito');
        errorUserDv.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(dvValue)) {
        errorUserDv.innerHTML = 'El Dv no puede incluir caracteres especiales!';
        errorUserDv.style.display = 'block';
        errorUserDv.classList.remove('exito');
        errorUserDv.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserDv.classList.add('exito')
        errorUserDv.classList.add('exito2')
        errorUserDv.innerHTML = 'Dv válido!';
        errorUserDv.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR PRIMER NOMBRE
    const pNombreValue = userPNombre.value.trim();
    if (pNombreValue === '') {
        errorUserPNombre.innerHTML = 'El primer nombre no puede estar vacío!';
        errorUserPNombre.style.display = 'block';
        errorUserPNombre.classList.remove('exito');
        errorUserPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (pNombreValue.length > 8) {
        errorUserPNombre.innerHTML = 'El primer nombre no puede tener más de 20 caracteres!';
        errorUserPNombre.style.display = 'block';
        errorUserPNombre.classList.remove('exito');
        errorUserPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(pNombreValue)) {
        errorUserPNombre.innerHTML = 'El primer nombre no puede incluir caracteres especiales!';
        errorUserPNombre.style.display = 'block';
        errorUserPNombre.classList.remove('exito');
        errorUserPNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserPNombre.classList.add('exito')
        errorUserPNombre.classList.add('exito2')
        errorUserPNombre.innerHTML = 'Primer nombre válido!';
        errorUserPNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR SEGUNDO NOMBRE
    const sNombreValue = userSNombre.value.trim();
    if (sNombreValue.length > 8) {
        errorUserSNombre.innerHTML = 'El segundo nombre no puede tener más de 20 caracteres!';
        errorUserSNombre.style.display = 'block';
        errorUserSNombre.classList.remove('exito');
        errorUserSNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(sNombreValue)) {
        errorUserSNombre.innerHTML = 'El segundo nombre no puede incluir caracteres especiales!';
        errorUserSNombre.style.display = 'block';
        errorUserSNombre.classList.remove('exito');
        errorUserSNombre.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserSNombre.classList.add('exito')
        errorUserSNombre.classList.add('exito2')
        errorUserSNombre.innerHTML = 'Segundo nombre válido!';
        errorUserSNombre.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR APELLIDO PATERNO
    const apPaternoValue = userApPaterno.value.trim();
    if (apPaternoValue === '') {
        errorUserApPaterno.innerHTML = 'El apellido paterno no puede estar vacío!';
        errorUserApPaterno.style.display = 'block';
        errorUserApPaterno.classList.remove('exito');
        errorUserApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (apPaternoValue.length > 8) {
        errorUserApPaterno.innerHTML = 'El apellido paterno no puede tener más de 20 caracteres!';
        errorUserApPaterno.style.display = 'block';
        errorUserApPaterno.classList.remove('exito');
        errorUserApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apPaternoValue)) {
        errorUserApPaterno.innerHTML = 'El apellido paterno no puede incluir caracteres especiales!';
        errorUserApPaterno.style.display = 'block';
        errorUserApPaterno.classList.remove('exito');
        errorUserApPaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserApPaterno.classList.add('exito')
        errorUserApPaterno.classList.add('exito2')
        errorUserApPaterno.innerHTML = 'Apellido paterno válido!';
        errorUserApPaterno.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR APELLIDO MATERNO
    const apMaternoValue = userApMaterno.value.trim();
    if (apMaternoValue === '') {
        errorUserApMaterno.innerHTML = 'El apellido materno no puede estar vacío!';
        errorUserApMaterno.style.display = 'block';
        errorUserApMaterno.classList.remove('exito');
        errorUserApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (apMaternoValue.length > 8) {
        errorUserApMaterno.innerHTML = 'El apellido materno no puede tener más de 20 caracteres!';
        errorUserApMaterno.style.display = 'block';
        errorUserApMaterno.classList.remove('exito');
        errorUserApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else if (/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(apMaternoValue)) {
        errorUserApMaterno.innerHTML = 'El apellido materno no puede incluir caracteres especiales!';
        errorUserApMaterno.style.display = 'block';
        errorUserApMaterno.classList.remove('exito');
        errorUserApMaterno.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserApMaterno.classList.add('exito')
        errorUserApMaterno.classList.add('exito2')
        errorUserApMaterno.innerHTML = 'Apellido materno válido!';
        errorUserApMaterno.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR TELEFONO
    const telValue = userTel.value.trim();
    if (telValue === '') {
        errorUserTel.innerHTML = 'El telefono no puede estar vacío!';
        errorUserTel.style.display = 'block';
        errorUserTel.classList.remove('exito');
        errorUserTel.classList.remove('exito2');
        camposValidos.push(false);
    } else if (telValue.length < 7) {
        errorUserTel.innerHTML = 'El telefono no puede tener menos de 7 caracteres!';
        errorUserTel.style.display = 'block';
        errorUserTel.classList.remove('exito');
        errorUserTel.classList.remove('exito2');
        camposValidos.push(false);
    } else if (telValue.length > 15) {
        errorUserTel.innerHTML = 'El telefono no puede tener más de 15 caracteres!';
        errorUserTel.style.display = 'block';
        errorUserTel.classList.remove('exito');
        errorUserTel.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserTel.classList.add('exito')
        errorUserTel.innerHTML = 'Telefono válido!';
        errorUserTel.style.display = 'block';
        camposValidos.push(true);
    }

    // VALIDAR CORREO
    const emailValue = userEmail.value.trim();
    if (emailValue === '') {
        errorUserEmail.innerHTML = 'El correo no puede estar vacío!';
        errorUserEmail.style.display = 'block';
        errorUserEmail.classList.remove('exito');
        errorUserEmail.classList.remove('exito2');
        camposValidos.push(false);
    } else if (emailValue.length > 50) {
        errorUserEmail.innerHTML = 'El correo no puede tener más de 55 caracteres!';
        errorUserEmail.style.display = 'block';
        errorUserEmail.classList.remove('exito');
        errorUserEmail.classList.remove('exito2');
        camposValidos.push(false);
    } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(emailValue)) {
        errorUserEmail.innerHTML = 'Correo inválido!';
        errorUserEmail.style.display = 'block';
        errorUserEmail.classList.remove('exito');
        errorUserEmail.classList.remove('exito2');
        camposValidos.push(false);
    } else {
        errorUserEmail.classList.add('exito')
        errorUserEmail.classList.add('exito2')
        errorUserEmail.innerHTML = 'Correo válido!';
        errorUserEmail.style.display = 'block';
        camposValidos.push(true);
    }

    // COMPROBAR SI TODOS LOS CAMPOS SON VÁLIDOS
    const esValido = camposValidos.every(Boolean);

    // SI TODO ESTÁ CORRECTO, ENVIAR EL FORMULARIO
    if (esValido) {
        document.querySelector('.formularioPiola').submit();
    }
}

// VALIDAMOS LAS EXTENSIONES DE LOS ARCHIVOS
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('benEvidMed').addEventListener('change', (event) => {
        const archivo = event.target.files[0];
        const nombreArchivo = archivo ? archivo.name : '';
        const erroBenEvidMed = document.getElementById('erroBenEvidMed');

        if (!validarArchivo(nombreArchivo)) {
            erroBenEvidMed.innerHTML = 'Los documentos solo pueden ser docx o pdf!';
            erroBenEvidMed.classList.remove('exito');
            erroBenEvidMed.style.display = 'block';
            event.target.value = '';
        } else {
            erroBenEvidMed.innerHTML = 'Los documentos son válidos!';
            erroBenEvidMed.classList.add('exito');
            erroBenEvidMed.style.display = 'block';
        }
    });
});

// FUNCION PARA FILTRAR LAS VISTAS DE LA PAGINA DE ANTECEDENTES DE SALUD DEL BENEFICIARIO 
document.addEventListener('DOMContentLoaded', () => {
    // OBTENER LINKS
    const mostrarSeguimiento = document.getElementById('mostrarSeguimiento');
    const mostrarAntecedentes = document.getElementById('mostrarAntecedentes');
    const mostrarDiagnostico = document.getElementById('mostrarDiagnostico');
    const mostrarDocumentos = document.getElementById('mostrarDocumentos');

    // OBTENER APARTADOS DEL FORMULARIO
    const apartadoSeguimiento = document.getElementById('apartadoSeguimiento');
    const apartadoAntecedentes = document.getElementById('apartadoAntecedentes');
    const apartadoDiagnostico = document.getElementById('apartadoDiagnostico');
    const apartadoDocumentos = document.getElementById('apartadoDocumentos');

    // FUNCION PARA OCULTAR TODOS LOS APARTADOS
    function ocultarTodosLosApartados2() {
        const apartados2 = [
            apartadoSeguimiento,
            apartadoAntecedentes,
            apartadoDiagnostico,
            apartadoDocumentos,
        ];
        apartados2.forEach(apartado2 => apartado2.classList.add('ocultar'));
    }

    // MOSTRAR SOLO EL FORMULARIO DE BENEFICIARIO AL CARGAR
    ocultarTodosLosApartados2();
    apartadoSeguimiento.classList.remove('ocultar');

    // CONFIGURAR EVENTOS PARA MOSTRAR LOS FORMULARIOS
    mostrarSeguimiento.addEventListener('click', () => {
        ocultarTodosLosApartados2();
        apartadoSeguimiento.classList.remove('ocultar');
    });

    mostrarAntecedentes.addEventListener('click', () => {
        ocultarTodosLosApartados2();
        apartadoAntecedentes.classList.remove('ocultar');
    });

    mostrarDiagnostico.addEventListener('click', () => {
        ocultarTodosLosApartados2();
        apartadoDiagnostico.classList.remove('ocultar');
    });

    mostrarDocumentos.addEventListener('click', () => {
        ocultarTodosLosApartados2();
        apartadoDocumentos.classList.remove('ocultar');
    });
}



);