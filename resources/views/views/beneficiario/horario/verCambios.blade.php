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
        <h2>Ver horario de Juan Manzo</h2>
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
                <a href="{{ route('histMedicoVerHorario') }}"
                    class="{{ request()->routeIs('histMedicoVerHorario') ? 'active' : '' }}">Horarios</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('histMedicoVerCambios') }}"
                    class="{{ request()->routeIs('histMedicoVerCambios') ? 'active' : '' }}">Cambios</a>
            </div>
        </div>
    </div>
    <br>
    <form method="post" class="formularioPiola" id="formTuneado">
        <div class="separacionFormulario">
            <label for="verHorarioAnio">Actividad:</label>
            <select name="verHorarioAnio" id="verHorarioAnio">
                <option value="Terapia Ocupacional">Terapia Ocupacional</option>
                <option value="Kinesiología">Kinesiología</option>
                <option value="Fonoaudiología">Fonoaudiología</option>
            </select>
        </div>
        <a class="boton-cuartiario" href="{{ route('dia') }}">Filtrar</a>
    </form>
    <br>
    <form method="post" class="formularioPiola" id="formTuneado">
        <div class="separacionFormulario">
            <label for="verHorarioAnio">Seleccione año:</label>
            <select name="verHorarioAnio" id="verHorarioAnio">
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
        </div>
        <a class="boton-cuartiario" href="{{ route('dia') }}">Filtrar</a>
    </form>
    <div class="fila1">
        <h2>Antes</h2>
    </div>
    <hr>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Terapia ocupacional</h3>
            <p><span class="letraNegrita">Encargado: </span>Simón Hernández</p>
            <p><span class="letraNegrita">Fecha de inicio: </span>19-12-2024 y 07-12-2024</p>
            <p><span class="letraNegrita">Días(s) de la semana: </span>Jueves - Martes</p>
        </div>
    </div>
    <div class="fila1">
        <h2>Actual</h2>
    </div>
    <hr>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Terapia ocupacional</h3>
            <p><span class="letraNegrita">Encargado: </span>Joaquín Muñoz</p>
            <p><span class="letraNegrita">Fecha de inicio: </span>19-12-2024</p>
            <p><span class="letraNegrita">Días(s) de la semana: </span>Jueves</p>
            <p><span class="letraNegrita">Razón del cambio: </span>El beneficiario ha progresado y ya no lo necesita</p>
            <p><span class="letraNegrita">Descripción del cambio: </span>Se le ha cambiado el especialista a cargo y también se ha eliminado un día de hola.</p>
        </div>
    </div>
</div>
@endsection