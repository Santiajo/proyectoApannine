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
                <a href="{{ route('formularioBeneficiarioDerivante') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioDerivante') ? 'active' : '' }}">Derivante</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioFamilia') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioFamilia') ? 'active' : '' }}">Familia</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioAntSalud') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioAntSalud') ? 'active' : '' }}">Antecedentes
                    salud</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioAntSocial') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioAntSocial') ? 'active' : '' }}">Antecedentes
                    sociales</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioDiagnostico') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioDiagnostico') ? 'active' : '' }}">Diagnóstico</a>
            </div>
        </div>
    </div>
    <br>
    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST" action="{{ route('beneficiarios.guardarBeneficiario') }}"
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
        <div class="separacionFormulario" id="apartadoColegio">
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
        <div class="fila2" id="grupoBotones">
            <button class="boton-primario" type="submit">Añadir</button>
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioColegio') }}">Siguiente</a>
        </div>
    </form>
</div>
@endsection