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
    <div class="fila2">
        <a class="boton-secundario" id="benExportar" href="{{ route('exportarAsistencia') }}"><i
                class='bx bx-export'></i> Exportar</a>
    </div>
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
    <form method="post" class="formularioPiola" id="formTuneado">
        <div class="separacionFormulario">
            <label for="histMedActividad">Seleccione actividad:</label>
            <select name="histMedActividad" id="histMedActividad">
                <option value="Terapia Ocupacional">Terapia Ocupacional</option>
                <option value="Kinesiología">Kinesiología</option>
                <option value="Fonoaudilogía">Fonoaudilogía</option>
            </select>
        </div>
        <a class="boton-cuartiario" href="{{ route('dia') }}">Filtrar</a>
    </form>
    <div class="fila1">
        <h2>Terapia Ocupacional</h2>
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>18-12-2024</h3>
            <p><span class="letraNegrita">N° de sesión: </span>1</p>
            <p><span class="letraNegrita">Encargado: </span>Simón Hernández</p>
            <p><span class="letraNegrita">Descripción: </span>Se trataron tales temas y se le hicieron x actividades a
                Juan Manzo.</p>
        </div>
    </div>
    <div class="fila4">
        <a class="boton-primario" id="atras" href="{{ route('fichabeneficiario') }}">
            << Atras</a>
                <a class="boton-primario" id="uno" href="{{ route('fichabeneficiario') }}">1</a>
                <a class="boton-primario" id="dos" href="{{ route('fichabeneficiario') }}">2</a>
                <a class="boton-primario" id="adelante" href="{{ route('fichabeneficiario') }}">Adelante >></a>
    </div>
</div>
@endsection