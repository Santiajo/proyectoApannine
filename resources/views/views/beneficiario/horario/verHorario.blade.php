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
            <label for="verHorarioAnio">Seleccione año:</label>
            <select name="verHorarioAnio" id="verHorarioAnio">
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
            </select>
        </div>
        <a class="boton-cuartiario" href="{{ route('dia') }}">Filtrar</a>
    </form>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Terapia ocupacional</h3>
            <p><span class="letraNegrita">Encargado: </span>Simón Hernández</p>
            <p><span class="letraNegrita">Fecha de inicio: </span>19-12-2024 y 07-12-2024</p>
            <p><span class="letraNegrita">Días(s) de la semana: </span>Jueves - Martes</p>
        </div>
    </div>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Kinesiología</h3>
            <p><span class="letraNegrita">Encargado: </span>Simón Hernández</p>
            <p><span class="letraNegrita">Fecha de inicio: </span>20-12-2024</p>
            <p><span class="letraNegrita">Día(s) de la semana: </span>Viernes</p>
        </div>
    </div>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Fonoaudiología</h3>
            <p><span class="letraNegrita">Encargado: </span>Simón Hernández</p>
            <p><span class="letraNegrita">Fecha de inicio: </span>23-12-2024</p>
            <p><span class="letraNegrita">Día(s) de la semana: </span>Lunes</p>
        </div>
    </div>
</div>
@endsection