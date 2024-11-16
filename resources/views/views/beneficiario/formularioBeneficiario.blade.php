@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('fichabeneficiario') }}">
            < Volver</a>
    </div>

    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">

        <!-- Título formulario -->
        <h1>Registrar beneficiario</h1>


        <!-- Subtítulo -->
        <div class="separacionFormulario">
            <h3>Datos beneficiario</h3>

            <!-- Estado del beneficiario -->
            <label for="benEstado">Estado del beneficiario:</label>
            <select name="benEstado" id="benEstado">
                <option value="Activo">Activo</option>
                <option value="Posible desertor">Posible desertor</option>
                <option value="Desertor">Desertor</option>
            </select>

            <!-- Run beneficiario -->
            <section class="layoutTelefono">
                <div>
                    <label for="benRut">Rut:</label>
                    <input type="number" name="benRut" id="benRut">
                </div>
                <div>
                    <label for="benDv">Dv:</label>
                    <input type="text" name="benDv" id="benDv">
                </div>
            </section>

            <!-- Nombre beneficiario -->
            <div class="layoutNombre">
                <div>
                    <label for="benPNombre">Primer Nombre:</label>
                    <input type="text" name="benPNombre" id="benPNombre">
                </div>
                <div>
                    <label for="benSNombre">Segundo Nombre:</label>
                    <input type="text" name="benSNombre" id="benSNombre">
                </div>
                <div>
                    <label for="benApPaterno">Apellido Paterno:</label>
                    <input type="text" name="benApPaterno" id="benApPaterno">
                </div>
                <div>
                    <label for="benApMaterno">Apellido Materno:</label>
                    <input type="text" name="benApMaterno" id="benApMaterno">
                </div>
            </div>

            <!-- Fecha de nacimiento -->
            <label for="benFecNac">Fecha de nacimiento:</label>
            <input type="date" name="benFecNac" id="benFecNac">

            <!-- Números de teléfono -->
            <div class="layoutTelefono">
                <div>
                    <label for="benTel1">Teléfono 1:</label>
                    <input type="number" name="benTel1" id="benTel1">
                </div>
                <div>
                    <label for="benTel2">Teléfono 2:</label>
                    <input type="number" name="benTel2" id="benTel2">
                </div>
            </div>

            <!-- Cobertura médica -->
            <label for="benCobMed">Cobertura médica:</label>
            <select name="benCobMed" id="benCobMed">
                <option value="Isapre">Isapre</option>
                <option value="Fonasa Tramo A">Fonasa Tramo A</option>
                <option value="Fonasa Tramo B">Fonasa Tramo B</option>
            </select>

            <!-- Nacionalidad -->
            <label for="benNac">Nacionalidad:</label>
            <select name="benNac" id="benNac">
                <option value="Chileno">Chileno</option>
                <option value="Argentino">Argentino</option>
                <option value="Peruano">Peruano</option>
                <option value="Boliviano">Boliviano</option>
                <option value="Venozolano">Venozolano</option>
            </select>

            <!-- Domicilio -->
            <div class="layoutDomicilio">
                <div>
                    <label for="benDom">Domicilio:</label>
                    <textarea name="benDom" id="benDom" rows="4" cols="50"></textarea>
                </div>
                <div class="layoutTelefono">
                    <div>
                        <label for="benComuna">Comuna:</label>
                        <select name="benComuna" id="benComuna">
                            <option value="Santiago">Santiago</option>
                            <option value="Cerrillos">Cerrillos</option>
                            <option value="Conchali">Conchalí</option>
                            <option value="Estación Central">Estación Central</option>
                        </select>
                    </div>
                    <div>
                        <label for="benTipViv">La familia vive en casa:</label>
                        <select name="benTipViv" id="benTipViv">
                            <option value="Propia">Propia</option>
                            <option value="Propia con deuda">Propia con deuda</option>
                            <option value="Arrendada">Arrendada</option>
                            <option value="Familiares">Familiares</option>
                            <option value="Allegados">Allegados</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="separacionFormulario">
            <!-- Colegio -->
            <h3>Datos colegio</h3>
            <fieldset>
                <legend>¿Asiste al colegio?</legend>

                <input type="radio" id="benAsisColSi" name="benAsisCol" value="Sí">
                <label for="benAsisColSi">Sí</label>

                <input type="radio" id="benAsisColNo" name="benAsisCol" value="No">
                <label for="benAsisColNo">No</label>
            </fieldset>
            <section class="layout">
                <div>
                    <label for="colNom">Nombre Establecimiento:</label>
                    <input type="text" name="colNom" id="colNom">
                </div>
                <div>
                    <label for="colTel">Teléfono Establecimiento:</label>
                    <input type="number" name="colTel" id="colTel">
                </div>
                <div>
                    <label for="benCurso">Curso:</label>
                    <input type="text" name="benCurso" id="benCurso">
                </div>
                <div>
                    <label for="colProfJefe">Profesor(a) Jefe:</label>
                    <input type="text" name="colProfJefe" id="colProfJefe">
                </div>
            </section>
        </div>

        <div class="separacionFormulario">
            <!-- Derivante -->
            <h3>Datos Derivante</h3>

            <label for="devNombre">Quien deriva:</label>
            <input type="text" name="devNombre" id="devNombre">

            <label for="devObservaciones">Observaciones derivación:</label>
            <textarea name="devObservaciones" id="devObservaciones"></textarea>
        </div>

        <div class="separacionFormulario">
            <!-- Subtítulo -->
            <h3>Datos Familia</h3>

            <!-- Tipo Familiar -->
            <label for="famTipo">Familiaridad:</label>
            <select name="famTipo" id="famTipo">
                <option value="Padre">Padre</option>
                <option value="Madre">Madre</option>
                <option value="Hermano(a)">Hermano(a)</option>
            </select>

            <!-- Rut familiar -->
            <section class="layoutTelefono">
                <div>
                    <label for="famRut">Rut:</label>
                    <input type="number" name="famRut" id="famRut">
                </div>
                <div>
                    <label for="famDv">Dv:</label>
                    <input type="text" name="famDv" id="famDv">
                </div>
            </section>

            <!-- Nombre familiar -->
            <div class="layoutNombre">
                <div>
                    <label for="famPNombre">Primer Nombre:</label>
                    <input type="text" name="famPNombre" id="famPNombre">
                </div>
                <div>
                    <label for="famSNombre">Segundo Nombre:</label>
                    <input type="text" name="famSNombre" id="famSNombre">
                </div>
                <div>
                    <label for="famApPaterno">Apellido Paterno:</label>
                    <input type="text" name="famApPaterno" id="famApPaterno">
                </div>
                <div>
                    <label for="famApMaterno">Apellido Materno:</label>
                    <input type="text" name="famApMaterno" id="famApMaterno">
                </div>
            </div>

            <label for="famTel">Teléfono:</label>
            <input type="number" name="famTel" id="famTel">

            <label for="famEmail">Correo electrónico:</label>
            <input type="email" name="famEmail" id="famEmail">

            <!-- Cuidador o no -->
            <fieldset>
                <legend>¿Es cuidador(a)?</legend>

                <input type="radio" id="famCuidadorSi" name="famCuidador" value="Sí">
                <label for="famCuidadorSi">Sí</label>

                <input type="radio" id="famCuidadorNo" name="famCuidador" value="No">
                <label for="famCuidadorNo">No</label>
            </fieldset>

            <!-- Situación Laboral -->
            <label for="famSitLab">Situación laboral:</label>
            <select name="famSitLab" id="famSitLab">
                <option value="Trabajo Estable">Trabajo Estable</option>
                <option value="Trabajo Ocasional">Trabajo Ocasional</option>
                <option value="Sin trabajo">Sin trabajo</option>
                <option value="Pensionado">Pensionado</option>
            </select>
        </div>

        <div class="separacionFormulario">
            <h3>Antecedentes salud</h3>

            <!-- Necesidades educativas especiales -->
            <label for="benNee">NEE:</label>
            <textarea name="benNee" id="benNee" rows="4" cols="50"></textarea>

            <!-- Enfermadades crónicas -->
            <label for="benEnfCro">Enfermedades crónicas:</label>
            <textarea name="benEnfCro" id="benEnfCro" rows="4" cols="50"></textarea>

            <!-- Tratamientos -->
            <label for="benTratamientos">Tratamientos actuales:</label>
            <textarea name="benTratamientos" id="benTratamientos" rows="4" cols="50"></textarea>

            <!-- ¿Tuvo cirugías? -->
            <fieldset>
                <legend>¿Cirugías?</legend>

                <input type="radio" id="benCirugiaSi" name="benCirugia" value="Sí">
                <label for="benCirugiaSi">Sí</label>

                <input type="radio" id="benCirugiaNo" name="benCirugia" value="No">
                <label for="benCirugiaNo">No</label>

            </fieldset>

            <!-- Descripción cirugías -->
            <label for="benCirugiaNom">¿Cuales?</label>
            <textarea name="benCirugiaNom" id="benCirugiaNom" rows="4" cols="50"></textarea>
        </div>

        <div class="separacionFormulario">
            <h3>Antecedentes sociales</h3>

            <!-- ¿Cuenta con ficha familiar? -->
            <fieldset>
                <legend>¿Cuenta con ficha familiar?</legend>

                <input type="radio" id="benFicFamSi" name="benFicFam" value="Sí">
                <label for="benFicFamSi">Sí</label>

                <input type="radio" id="benFicFamNo" name="benFicFam" value="No">
                <label for="benFicFamNo">No</label>

            </fieldset>

            <!-- Puntaje ficha familiar -->
            <label for="benFicFamPtje">Puntaje:</label>
            <input type="number" name="benFicFamPtje" id="benFicFamPtje">

            <!-- Beneficios sociales -->
            <fieldset>
                <legend>Beneficios sociales:</legend>

                <input type="checkbox" id="benBenSoc1" name="benBenSoc1" value="Subsidio familiar">
                <label for="vehicle1"> Subsidio familiar</label><br>
                <input type="checkbox" id="benBenSoc2" name="benBenSoc2" value="Pensiones">
                <label for="vehicle2"> Pensiones</label><br>
                <input type="checkbox" id="benBenSoc3" name="benBenSoc3" value="Becas">
                <label for="vehicle3"> Becas</label><br>
                <input type="checkbox" id="benBenSoc4" name="benBenSoc4" value="Chile solidario">
                <label for="vehicle3"> Chile solidario</label><br>
                <input type="checkbox" id="benBenSoc5" name="benBenSoc5" value="Programa puente">
                <label for="vehicle3"> Programa puente</label><br>
                <input type="checkbox" id="benBenSoc6" name="benBenSoc6" value="Subsidio ético familiar">
                <label for="vehicle3"> Subsidio ético familiar</label><br>
            </fieldset>

            <!-- Anotar beneficio social extra -->
            <label for="benBenSocOtro">Otro:</label>
            <input type="text" name="benBenSocOtro" id="benBenSocOtro">

            <!-- ¿Cuenta con credencial de discapacidad? -->
            <fieldset>
                <legend>¿Cuenta con credencial de discapacidad?</legend>

                <input type="radio" id="benCredDiscSi" name="benCredDisc" value="Sí">
                <label for="benCredDiscSi">Sí</label>

                <input type="radio" id="benCredDiscNo" name="benCredDisc" value="No">
                <label for="benCredDiscNo">No</label>
            </fieldset>
        </div>

        <div class="fila2" id="grupoBotones">
            <a class="boton-primario" href="{{ route('formularioBeneficiario') }}">Añadir</a>
            <a class="boton-secundario" href="{{ route('formularioBeneficiario') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection