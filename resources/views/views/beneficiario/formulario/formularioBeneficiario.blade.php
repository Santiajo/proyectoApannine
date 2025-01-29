@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('beneficiarios.listarBeneficiarios') }}">
            < Volver</a>
    </div>

    <div class="navPiola">
        <div class="navTitulo">
            <h3>Ver:</h3>
        </div>
        <hr>
        <div class="navLinks">
            <div class="navEnlace">
                <a href="#" id="mostrarBeneficiario">Beneficiario</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarColegio">Colegio</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarDerivante">Derivante</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarFamilia">Familia</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarAntSalud">Antecedentes salud</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarAntSocial">Antecedentes sociales</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarDiagnostico">Diagnóstico</a>
            </div>
        </div>
    </div>
    <br>
    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST" action="{{ route('beneficiarios.guardarBeneficiario') }}" enctype="multipart/form-data"
        id="formBeneficiario">
        @csrf
        <!-- Subtítulo -->
        <div class="separacionFormulario" id="apartadoBeneficiarios">
            <h3>Datos beneficiario</h3>

            <!-- Id oculta del beneficiario -->
            <input type="hidden" name="benId" id="benId" value="{{ $beneficiario->id ?? ''  }}">

            <!-- Estado del beneficiario -->
            <label for="benEstado">Estado del beneficiario:</label>
            <select name="benEstado" id="benEstado" value="{{ $beneficiario->beneficiarioEstado ?? '' }}">
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>

            <!-- Run beneficiario -->
            <section class="layoutTelefono">
                <div>
                    <label for="benRut">Rut:</label>
                    <input type="number" name="benRut" id="benRut" value="{{ $beneficiario->beneficiarioRut ?? '' }}">
                    <div class="errores errores2" id="errorBenRut"></div>
                    @error('benRut')
                        <div class="alert alert-danger alert2">El rut no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="benDv">Dv:</label>
                    <input type="text" name="benDv" id="benDv" value="{{ $beneficiario->beneficiarioDv ?? '' }}">
                    <div class="errores errores2" id="errorBenDv"></div>
                    @error('benDv')
                        <div class="alert alert-danger alert2">El Dv no cumple con los requisitos!</div>
                    @enderror
                </div>
            </section>

            <!-- Nombre beneficiario -->
            <div class="layoutNombre">
                <div>
                    <label for="benPNombre">Primer Nombre:</label>
                    <input type="text" name="benPNombre" id="benPNombre"
                        value="{{ $beneficiario->beneficiarioPNombre ?? ''  }}">
                    <div class="errores errores2" id="errorBenPNombre"></div>
                    @error('benPNombre')
                        <div class="alert alert-danger alert2">El primer nombre no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="benSNombre">Segundo Nombre:</label>
                    <input type="text" name="benSNombre" id="benSNombre"
                        value="{{ $beneficiario->beneficiarioSNombre ?? ''  }}">
                    <div class="errores errores2" id="errorBenSNombre"></div>
                    @error('benSNombre')
                        <div class="alert alert-danger alert2">El segundo nombre no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="benApPaterno">Apellido Paterno:</label>
                    <input type="text" name="benApPaterno" id="benApPaterno"
                        value="{{ $beneficiario->beneficiarioApPaterno ?? ''  }}">
                    <div class="errores errores2" id="errorBenApPaterno"></div>
                    @error('benApPaterno')
                        <div class="alert alert-danger alert2">El apellido paterno no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="benApMaterno">Apellido Materno:</label>
                    <input type="text" name="benApMaterno" id="benApMaterno"
                        value="{{ $beneficiario->beneficiarioApMaterno ?? ''  }}">
                    <div class="errores errores2" id="errorBenApMaterno"></div>
                    @error('benApMaterno')
                        <div class="alert alert-danger alert2">El apellido materno no cumple con los requisitos!</div>
                    @enderror
                </div>
            </div>

            <!-- Fecha de nacimiento -->
            <label for="benFecNac">Fecha de nacimiento:</label>
            <input type="date" name="benFecNac" id="benFecNac"
                value="{{ isset($beneficiario) ? $beneficiario->beneficiarioFecNac->format('Y-m-d') : '' }}">
            <div class="errores" id="errorBenFecNac"></div>
            @error('benFecNac')
                <div class="alert alert-danger">La fecha de nacimiento no cumple con los requisitos!</div>
            @enderror

            <!-- Números de teléfono -->
            <label for="benTel">Teléfono:</label>
            <input type="number" name="benTel" id="benTel" value="{{ $beneficiario->beneficiarioTelefono ?? ''  }}">
            <div class="errores" id="errorBenTel"></div>
            @error('benTel')
                <div class="alert alert-danger">El número de telefono no cumple con los requisitos!</div>
            @enderror

            <!-- Cobertura médica -->
            <label for="benCobMed">Cobertura médica:</label>
            <select name="benCobMed" id="benCobMed" value="{{ $beneficiario->cob_med_id ?? ''  }}">
                @foreach ($cobMedicas as $cobMedica)
                    <option value="{{ $cobMedica->id }}" {{ (isset($beneficiario) && $beneficiario->cob_med_id == $cobMedica->id) ? 'selected' : '' }}>
                        {{ $cobMedica->nombreCobMed }}
                    </option>
                @endforeach
            </select>

            <!-- Nacionalidad -->
            <label for="benNac">Nacionalidad:</label>
            <select name="benNac" id="benNac" value="{{ $beneficiario->nacionalidad_id ?? '' }}">
                @foreach ($nacionalidades as $nacionalidad)
                    <option value="{{ $nacionalidad->id }}" {{ (isset($beneficiario) && $beneficiario->nacionalidad_id == $nacionalidad->id) ? 'selected' : '' }}>
                        {{ $nacionalidad->nombreNacionalidad }}
                    </option>
                @endforeach
            </select>

            <!-- Domicilio -->
            <div class="layoutDomicilio">
                <div>
                    <label for="benDom">Domicilio:</label>
                    <textarea name="benDom" id="benDom" rows="4"
                        cols="50">{{ $beneficiario->beneficiarioDomicilio ?? '' }}</textarea>
                    <div class="errores" id="errorBenDom"></div>
                    @error('benDom')
                        <div class="alert alert-danger">El domicilio no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div class="layoutTelefono">
                    <div>
                        <label for="benComuna">Comuna:</label>
                        <select name="benComuna" id="benComuna" value="{{ $beneficiario->comuna_id ?? '' }}">
                            @foreach ($comunas as $comuna)
                                <option value="{{ $comuna->id }}" {{ (isset($beneficiario) && $beneficiario->comuna_id == $comuna->id) ? 'selected' : '' }}>
                                    {{ $comuna->nombreComuna }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="benTipViv">La familia vive en casa:</label>
                        <select name="benTipViv" id="benTipViv">
                            <option value="Propia" {{isset($beneficiario) && $beneficiario->beneficiarioTipDom == 'Propia' ? 'selected' : '' }}>
                                Propia</option>
                            <option value="Propia con deuda" {{ isset($beneficiario) && $beneficiario->beneficiarioTipDom == 'Propia con deuda' ? 'selected' : '' }}>Propia con
                                deuda</option>
                            <option value="Arrendada" {{ isset($beneficiario) && $beneficiario->beneficiarioTipDom == 'Arrendada' ? 'selected' : '' }}>Arrendada</option>
                            <option value="Familiares" {{ isset($beneficiario) && $beneficiario->beneficiarioTipDom == 'Familiares' ? 'selected' : '' }}>Familiares</option>
                            <option value="Allegados" {{ isset($beneficiario) && $beneficiario->beneficiarioTipDom == 'Allegados' ? 'selected' : '' }}>Allegados</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- Colegio -->
        <div class="separacionFormulario" id="apartadoColegio">
            <h3>Datos colegio</h3>
            <fieldset>
                <legend>¿Asiste al colegio?</legend>

                <input type="radio" id="benAsisColSi" name="benAsisCol" value="1" {{ (isset($colegio) && $colegio->colegioAsiste == 1) ? 'checked' : '' }}>
                <label for="benAsisColSi">Sí</label>

                <input type="radio" id="benAsisColNo" name="benAsisCol" value="0" {{ (isset($colegio) && $colegio->colegioAsiste == 0) ? 'checked' : '' }}>
                <label for="benAsisColNo">No</label>
            </fieldset>
            <div class="errores" id="errorAsistirCol"></div>
            <section class="layout">
                <div>
                    <label for="colNom">Nombre Establecimiento:</label>
                    <input type="text" name="colNom" id="colNom" value="{{ $colegio->colegioNombre ?? '' }}">
                    <div class="errores errores2" id="errorColNom"></div>
                    @error('colNom')
                        <div class="alert alert-danger">El nombre de colegio no cumple con los requisitos!</div>
                    @enderror

                </div>
                <div>
                    <label for="colTel">Teléfono Establecimiento:</label>
                    <input type="number" name="colTel" id="colTel" value="{{ $colegio->colegioTelefono ?? '' }}">
                    <div class="errores errores2" id="errorColTel"></div>
                    @error('colTel')
                        <div class="alert alert-danger">El telefono del colegio no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="benCurso">Curso:</label>
                    <input type="text" name="benCurso" id="benCurso" value="{{ $colegio->colegioCurso ?? '' }}">
                    <div class="errores errores2" id="errorBenCurso"></div>
                    @error('benCurso')
                        <div class="alert alert-danger">El curso del colegio no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="colProfJefe">Profesor(a) Jefe:</label>
                    <input type="text" name="colProfJefe" id="colProfJefe"
                        value="{{ $colegio->colegioProfJefe ?? '' }}">
                    <div class="errores errores2" id="errorColProfJefe"></div>
                    @error('colProfJefe')
                        <div class="alert alert-danger">El nombre del profesor jefe del colegio no cumple con los
                            requisitos!</div>
                    @enderror
                </div>
            </section>
        </div>

        <!-- Derivante -->
        <div class="separacionFormulario" id="apartadoDerivante">
            <h3>Datos Derivante</h3>

            <label for="devNombre">Quien deriva:</label>
            <input type="text" name="devNombre" id="devNombre" value="{{ $derivante->derivanteNombre ?? '' }}">
            <div class="errores" id="errorDevNombre"></div>
            @error('devNombre')
                <div class="alert alert-danger">El nombre del derivante no cumple con los
                    requisitos!</div>
            @enderror

            <label for="devObservaciones">Observaciones derivación:</label>
            <textarea name="devObservaciones" id="devObservaciones">{{ $derivante->derivanteObservaciones ?? '' }}</textarea>
            <div class="errores" id="errorDevObservaciones"></div>
            @error('devObservaciones')
                <div class="alert alert-danger">Las observaciones del derivante no cumplen los
                    requisitos!</div>
            @enderror
        </div>

        <!-- form Familia -->
        <div class="separacionFormulario" id="apartadoFamilia">
            <!-- Subtítulo -->
            <h3>Datos Familiar 1</h3>

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
                    <div class="errores errores2" id="errorFamRut"></div>
                </div>
                <div>
                    <label for="famDv">Dv:</label>
                    <input type="text" name="famDv" id="famDv">
                    <div class="errores errores2" id="errorFamDv"></div>
                </div>
            </section>

            <!-- Nombre familiar -->
            <div class="layoutNombre">
                <div>
                    <label for="famPNombre">Primer Nombre:</label>
                    <input type="text" name="famPNombre" id="famPNombre">
                    <div class="errores errores2" id="errorFamPNombre"></div>
                </div>
                <div>
                    <label for="famSNombre">Segundo Nombre:</label>
                    <input type="text" name="famSNombre" id="famSNombre">
                    <div class="errores errores2" id="errorFamSNombre"></div>
                </div>
                <div>
                    <label for="famApPaterno">Apellido Paterno:</label>
                    <input type="text" name="famApPaterno" id="famApPaterno">
                    <div class="errores errores2" id="errorfamApPaterno"></div>
                </div>
                <div>
                    <label for="famApMaterno">Apellido Materno:</label>
                    <input type="text" name="famApMaterno" id="famApMaterno">
                    <div class="errores errores2" id="errorfamApMaterno"></div>
                </div>
            </div>

            <label for="famTel">Teléfono:</label>
            <input type="number" name="famTel" id="famTel">
            <div class="errores" id="errorfamTel"></div>

            <label for="famEmail">Correo electrónico:</label>
            <input type="email" name="famEmail" id="famEmail">
            <div class="errores" id="errorfamEmail"></div>

            <!-- Cuidador o no -->
            <fieldset>
                <legend>¿Es cuidador(a)?</legend>

                <input type="radio" id="famCuidadorSi" name="famCuidador" value="Sí">
                <label for="famCuidadorSi">Sí</label>

                <input type="radio" id="famCuidadorNo" name="famCuidador" value="No">
                <label for="famCuidadorNo">No</label>
            </fieldset>
            <div class="errores" id="errorEsCuidador"></div>

            <!-- Situación Laboral -->
            <label for="famSitLab">Situación laboral:</label>
            <select name="famSitLab" id="famSitLab">
                <option value="Trabajo Estable">Trabajo Estable</option>
                <option value="Trabajo Ocasional">Trabajo Ocasional</option>
                <option value="Sin trabajo">Sin trabajo</option>
                <option value="Pensionado">Pensionado</option>
            </select>
            <!-- Botón para añadir familiar -->
            <div class="fila4">
                <button class="boton-primario" type="button" id="agregarFamiliar"><i class='bx bx-user-plus'></i> Añadir Familiar</button>
                <button class="boton-secundario" type="button" id="eliminarFamiliar"><i class='bx bx-user-minus' ></i> Eliminar Familiar</button>
            </div>
        </div>

        <div class="separacionFormulario" id="apartadoFamilia2">
            <h3>Datos Familiar 2</h3>
            <!-- Tipo Familiar -->
            <label for="famTipo2">Familiaridad:</label>
            <select name="famTipo2" id="famTipo2">
                <option value="Padre">Padre</option>
                <option value="Madre">Madre</option>
                <option value="Hermano(a)">Hermano(a)</option>
            </select>

            <!-- Rut familiar -->
            <section class="layoutTelefono">
                <div>
                    <label for="famRut2">Rut:</label>
                    <input type="number" name="famRut2" id="famRut2">
                    <div class="errores errores2" id="errorFamRut2"></div>
                </div>
                <div>
                    <label for="famDv2">Dv:</label>
                    <input type="text" name="famDv2" id="famDv2">
                    <div class="errores errores2" id="errorFamDv2"></div>
                </div>
            </section>

            <!-- Nombre familiar -->
            <div class="layoutNombre">
                <div>
                    <label for="famPNombre2">Primer Nombre:</label>
                    <input type="text" name="famPNombre2" id="famPNombre2">
                    <div class="errores errores2" id="errorFamPNombre2"></div>
                </div>
                <div>
                    <label for="famSNombre2">Segundo Nombre:</label>
                    <input type="text" name="famSNombre2" id="famSNombre2">
                    <div class="errores errores2" id="errorFamSNombre2"></div>
                </div>
                <div>
                    <label for="famApPaterno2">Apellido Paterno:</label>
                    <input type="text" name="famApPaterno2" id="famApPaterno2">
                    <div class="errores errores2" id="errorfamApPaterno2"></div>
                </div>
                <div>
                    <label for="famApMaterno2">Apellido Materno:</label>
                    <input type="text" name="famApMaterno2" id="famApMaterno2">
                    <div class="errores errores2" id="errorfamApMaterno2"></div>
                </div>
            </div>

            <label for="famTel2">Teléfono:</label>
            <input type="number" name="famTel2" id="famTel2">
            <div class="errores" id="errorfamTel2"></div>

            <label for="famEmail2">Correo electrónico:</label>
            <input type="email" name="famEmail2" id="famEmail2">
            <div class="errores" id="errorfamEmail2"></div>

            <!-- Cuidador o no -->
            <fieldset>
                <legend>¿Es cuidador(a)?</legend>

                <input type="radio" id="famCuidadorSi2" name="famCuidador2" value="Sí">
                <label for="famCuidadorSi">Sí</label>

                <input type="radio" id="famCuidadorNo2" name="famCuidador2" value="No">
                <label for="famCuidadorNo">No</label>
            </fieldset>
            <div class="errores" id="errorEsCuidador2"></div>

            <!-- Situación Laboral -->
            <label for="famSitLab2">Situación laboral:</label>
            <select name="famSitLab2" id="famSitLab2">
                <option value="Trabajo Estable">Trabajo Estable</option>
                <option value="Trabajo Ocasional">Trabajo Ocasional</option>
                <option value="Sin trabajo">Sin trabajo</option>
                <option value="Pensionado">Pensionado</option>
            </select>
        </div>

        <!-- form Antecedentes salud -->
        <div class="separacionFormulario" id="apartadoAntSalud">
            <h3>Antecedentes salud</h3>

            <!-- Necesidades educativas especiales -->
            <label for="benNee">NEE:</label>
            <textarea name="benNee" id="benNee" rows="4" cols="50">{{ $antSal->antSalNEE ?? '' }}</textarea>
            <div class="errores" id="erroBenNee"></div>
            @error('benNee')
                <div class="alert alert-danger">Las NEE no cumplen los
                    requisitos!</div>
            @enderror

            <!-- Enfermadades crónicas -->
            <label for="benEnfCro">Enfermedades crónicas:</label>
            <textarea name="benEnfCro" id="benEnfCro" rows="4" cols="50">{{ $antSal->antSalEnfCronica ?? '' }}</textarea>
            <div class="errores" id="erroBenEnfCro"></div>
            @error('benEnfCro')
                <div class="alert alert-danger">Las enfermadades crónicas no cumplen los
                    requisitos!</div>
            @enderror

            <!-- Tratamientos -->
            <label for="benTratamientos">Tratamientos actuales:</label>
            <textarea name="benTratamientos" id="benTratamientos" rows="4" cols="50">{{ $antSal->antSalTratamiento ?? '' }}</textarea>
            <div class="errores" id="erroBenTratamientos"></div>
            @error('benTratamientos')
                <div class="alert alert-danger">Las tratamientos no cumplen los
                    requisitos!</div>
            @enderror

            <!-- ¿Tuvo cirugías? -->
            <fieldset>
                <legend>¿Cirugías?</legend>

                <input type="radio" id="benCirugiaSi" name="benCirugia" value="1" {{ (isset($antSal) && $antSal->antSalCirugia == 1) ? 'checked' : '' }}>
                <label for="benCirugiaSi">Sí</label>

                <input type="radio" id="benCirugiaNo" name="benCirugia" value="0" {{ (isset($antSal) && $antSal->antSalCirugia == 0) ? 'checked' : '' }}>
                <label for="benCirugiaNo">No</label>
            </fieldset>
            <div class="errores" id="errorTuvoCir"></div>

            <!-- Descripción cirugías -->
            <label for="benCirugiaNom">¿Cuales?</label>
            <textarea name="benCirugiaNom" id="benCirugiaNom" rows="4" cols="50">{{ $antSal->antSalDescCirugia ?? '' }}</textarea>
            <div class="errores" id="errorBenCirugiaNom"></div>
            @error('benCirugiaNom')
                <div class="alert alert-danger">Las cirúgías descritas no cumplen los
                    requisitos!</div>
            @enderror

            <!-- Documentos médicos -->
            <label for="benEvidMed">Documentos:</label>
            <input type="file" name="benEvidMed" id="benEvidMed">
            <div class="errores" id="erroBenEvidMed"></div>
            @error('benEvidMed')
                <div class="alert alert-danger">La evidencia médica subidas no cumplen los
                    requisitos!</div>
            @enderror
        </div>

        <!-- form Antecedentes social -->
        <div class="separacionFormulario" id="apartadoAntSocial">
            <h3>Antecedentes sociales</h3>

            <!-- ¿Cuenta con ficha familiar? -->
            <fieldset>
                <legend>¿Cuenta con ficha familiar?</legend>

                <input type="radio" id="benFicFamSi" name="benFicFam" value="1" {{ (isset($antSoc) && $antSoc->antSocFichaFamiliar == 1) ? 'checked' : '' }}>
                <label for="benFicFamSi">Sí</label>

                <input type="radio" id="benFicFamNo" name="benFicFam" value="0" {{ (isset($antSoc) && $antSoc->antSocFichaFamiliar == 0) ? 'checked' : '' }}>
                <label for="benFicFamNo">No</label>
            </fieldset>
            <div class="errores" id="tieneFicFam"></div>
            @error('benFicFam')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <!-- Puntaje ficha familiar -->
            <label for="benFicFamPtje">Puntaje:</label>
            <select name="benFicFamPtje" id="benFicFamPtje" value="{{ $antSoc->antSocPtj ?? '' }}">
                <option value="Tramo 1">Tramo 1</option>
                <option value="Tramo 2">Tramo 2</option>
                <option value="Tramo 3">Tramo 3</option>
                <option value="Tramo 4">Tramo 4</option>
                <option value="Tramo 5">Tramo 5</option>
                <option value="Tramo 6">Tramo 6</option>
                <option value="Tramo 7">Tramo 7</option>
            </select>
            @error('benFicFamPtje')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <fieldset>
                <legend>Beneficios sociales:</legend>
                <input type="checkbox" id="benBenSoc1" name="benBenSoc[]" value="Subsidio familiar"
                {{ in_array('Subsidio familiar', $beneficiosMarcados ?? []) ? 'checked' : '' }}>
                <label for="benBenSoc1"> Subsidio familiar</label><br>
                <input type="checkbox" id="benBenSoc2" name="benBenSoc[]" value="Pensiones"
                {{ in_array('Pensiones', $beneficiosMarcados ?? []) ? 'checked' : '' }}>
                <label for="benBenSoc2"> Pensiones</label><br>
                <input type="checkbox" id="benBenSoc3" name="benBenSoc[]" value="Becas"
                {{ in_array('Becas', $beneficiosMarcados ?? []) ? 'checked' : '' }}>
                <label for="benBenSoc3"> Becas</label><br>
                <input type="checkbox" id="benBenSoc4" name="benBenSoc[]" value="Chile solidario"
                {{ in_array('Chile solidario', $beneficiosMarcados ?? []) ? 'checked' : '' }}>
                <label for="benBenSoc4"> Chile solidario</label><br>
                <input type="checkbox" id="benBenSoc5" name="benBenSoc[]" value="Programa puente"
                {{ in_array('Programa puente', $beneficiosMarcados ?? []) ? 'checked' : '' }}>
                <label for="benBenSoc5"> Programa puente</label><br>
                <input type="checkbox" id="benBenSoc6" name="benBenSoc[]" value="Subsidio ético familiar"
                {{ in_array('Subsidio ético familiar', $beneficiosMarcados ?? []) ? 'checked' : '' }}>
                <label for="benBenSoc6"> Subsidio ético familiar</label><br>
            </fieldset>


            <!-- Input para beneficio social extra -->
            <label for="benBenSocOtro">Otro:</label>
            <input type="text" name="benBenSocOtro" id="benBenSocOtro" value="{{ $beneficioOtro ?? '' }}">
            <div class="errores" id="errorBenBenSocOtro"></div>
            @error('benBenSocOtro[]')
                <div class="alert alert-danger">Los beneficios sociales extra no cumplen los requisitos!</div>
            @enderror

            <!-- ¿Cuenta con credencial de discapacidad? -->
            <fieldset>
                <legend>¿Cuenta con credencial de discapacidad?</legend>

                <input type="radio" id="benCredDiscSi" name="benCredDisc" value="1" {{ (isset($antSoc) && $antSoc->antSocCredDiscapacidad == 1) ? 'checked' : '' }}>
                <label for="benCredDiscSi">Sí</label>

                <input type="radio" id="benCredDiscNo" name="benCredDisc" value="0" {{ (isset($antSoc) && $antSoc->antSocCredDiscapacidad == 1) ? 'checked' : '' }}>
                <label for="benCredDiscNo">No</label>
            </fieldset>
            <div class="errores" id="errorCredDiscapacidad"></div>
            @error('benCredDisc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- form Diagnostico -->
        <div class="separacionFormulario" id="apartadoDiagnostico">
            <h3>Datos diagnóstico</h3>
            <textarea name="benDiag" id="benDiag" rows="4" cols="50">{{ $diagnostico->diagnosticoDesc ?? '' }}</textarea>
            <div class="errores" id="errorBenDiag"></div>
        </div>
        

        <!-- Botones -->
        <div class="fila2" id="grupoBotones">
            <button class="boton-primario" type="submit">Añadir</button>
            <a class="boton-secundario" href="#" id="mostrarColegio">Siguiente</a>
        </div>
    </form>
</div>
@endsection