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
                <a href="{{ route('formularioBeneficiario') }}"
                    class="{{ request()->routeIs('formularioBeneficiario') ? 'active' : '' }}">Beneficiario</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioColegio') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioColegio') ? 'active' : '' }}">Colegio</a>
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
    <form class="formularioPiola" method="POST">
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
        <div class="fila2" id="grupoBotones">
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioAntSalud') }}">Siguiente</a>
        </div>
    </form>
</div>
@endsection