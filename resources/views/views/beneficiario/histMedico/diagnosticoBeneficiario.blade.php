@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver1" href="{{ route('fichabeneficiario') }}">
            < Volver</a>
    </div>
    <div class="fila1">
        <h2>Historial medico Juan Manzo</h2>
    </div>
    <hr>
    <br>
    <div class="navPiola">
        <div class="navTitulo">
            <h3>Ver:</h3>
        </div>
        <hr>
        <div class="navLinks">
            <div class="navEnlace">
                <a href="{{ route('histMedBeneficiario') }}"
                    class="{{ request()->routeIs('histMedBeneficiario') ? 'active' : '' }}">Seguimiento</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('antMedBeneficiario') }}"
                    class="{{ request()->routeIs('antMedBeneficiario') ? 'active' : '' }}">Antecedentes de salud</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('diagnosticoBeneficiario') }}"
                    class="{{ request()->routeIs('diagnosticoBeneficiario') ? 'active' : '' }}">Diagnóstico</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('documentosBeneficiario') }}"
                    class="{{ request()->routeIs('documentosBeneficiario') ? 'active' : '' }}">Documentos</a>
            </div>
        </div>
    </div>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Diagnóstico</h3>
            <p>Aquí va el texto colocado en el formulario en el apartado de diagnóstico</p>
        </div>
        <div class="fila2" id="fila1Perso3">
            <a class="boton-quintiario" id="benAgregar" href="{{ route('formularioBeneficiarioDiagnostico') }}">
                <p>Modificar</p>
            </a>
        </div>
    </div>
</div>
@endsection