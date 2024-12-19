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
            <!-- Derivante -->
            <h3>Datos Derivante</h3>

            <label for="devNombre">Quien deriva:</label>
            <input type="text" name="devNombre" id="devNombre">

            <label for="devObservaciones">Observaciones derivación:</label>
            <textarea name="devObservaciones" id="devObservaciones"></textarea>
        </div>

        <div class="fila2" id="grupoBotones">
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioFamilia') }}">Siguiente</a>
        </div>
    </form>
</div>
@endsection