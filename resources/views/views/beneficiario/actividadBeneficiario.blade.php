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
    <div class="fila1" id="fila1Perso">
        <h2>Actividad de Juan Manzo</h2>
    </div>
    <hr>
    <div class="fila1">
        <div class="cardSimple">
            <div class="separacionFormulario">
                <h3>Datos de ingreso:</h3>
                <p><span class="letraNegrita">Fecha: </span>03-12-2023</p>
                <p><span class="letraNegrita">Estado actual: </span>ACTIVO</p>
            </div>
        </div>
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Actividad en la asociación</h3>
            <p><span class="letraNegrita">¿Ha dejado de venir? </span> Sí</p>
            <p><span class="letraNegrita">N° de veces: </span> 2</p>
        </div>
    </div>
    <div class="fila1">
        <div class="cardSimple">
            <div class="separacionFormulario">
                <h3>Período inactivo N°1</h3>
                <p><span class="letraNegrita">Desde: </span> 15-04-2024</p>
                <p><span class="letraNegrita">Hasta: </span> 28-08-2024</p>
                <p><span class="letraNegrita">Duración: </span> 4 meses y 14 días</p>
            </div>
        </div>
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Período inactivo N°2</h3>
            <p><span class="letraNegrita">Desde: </span> 15-09-2024</p>
            <p><span class="letraNegrita">Hasta: </span> 28-11-2024</p>
            <p><span class="letraNegrita">Duración: </span> 2 meses y 2 días</p>
        </div>
    </div>
</div>
@endsection