@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1" id="fila1Perso3">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('beneficiarioAsistencia') }}">
            < Volver</a>
    </div>
    <div class="fila1">
        <h2>Añadir formulario para registrar asistencias aquí</h2>
    </div>
</div>
@endsection