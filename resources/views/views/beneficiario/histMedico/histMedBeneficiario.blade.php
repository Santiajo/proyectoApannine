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
    <div class="fila1">
        <h2>Terapia Ocupacional</h2>
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>18-12-2024</h3>
            <p>Se trataron tales temas y se le hicieron x actividades a Juan Manzo.</p>
        </div>
    </div>
    <div class="fila1">
        <h2>Kinesiología</h2>
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>19-12-2024</h3>
            <p>Se le hicieron x actividades de movilidad en las manos a Juan Manzo.</p>
        </div>
    </div>
    <div class="fila1">
        <h2>Fonoaudilogía</h2>
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>18-12-2024</h3>
            <p>Seguimiento de fonoaudilogía.</p>
        </div>
    </div>
</div>
@endsection