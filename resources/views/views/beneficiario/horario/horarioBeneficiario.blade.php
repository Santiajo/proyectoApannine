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
        <h2>Horarios de Juan Manzo</h2>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-primario" id="benExportar" href="{{ route('formularioHorario') }}"><i
                class='bx bxs-calendar-edit'></i> Agregar horario</a>

    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Terapia ocupacional</h3>
            <p><span class="letraNegrita">Fecha de inicio: </span>19-12-2024 y 07-12-2024</p>
            <p><span class="letraNegrita">Días(s) de la semana: </span>Jueves - Martes</p>
            <div class="fila2" id="fila1Perso3">
                <a class="boton-quintiario" href="{{ route('formularioHorario') }}">
                    <p>Modificar</p>
                </a>
                <a class="boton-terciario" href="{{ route('horarioBeneficiario') }}">
                    <p>Eliminar</p>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Kinesiología</h3>
            <p><span class="letraNegrita">Fecha de inicio: </span>20-12-2024</p>
            <p><span class="letraNegrita">Día(s) de la semana: </span>Viernes</p>
            <div class="fila2" id="fila1Perso3">
                <a class="boton-quintiario" href="{{ route('formularioHorario') }}">
                    <p>Modificar</p>
                </a>
                <a class="boton-terciario" href="{{ route('horarioBeneficiario') }}">
                    <p>Eliminar</p>
                </a>
            </div>
        </div>
    </div>
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Fonoaudiología</h3>
            <p><span class="letraNegrita">Fecha de inicio: </span>23-12-2024</p>
            <p><span class="letraNegrita">Día(s) de la semana: </span>Lunes</p>
            <div class="fila2" id="fila1Perso3">
                <a class="boton-quintiario" href="{{ route('formularioHorario') }}">
                    <p>Modificar</p>
                </a>
                <a class="boton-terciario" href="{{ route('horarioBeneficiario') }}">
                    <p>Eliminar</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection