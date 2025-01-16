@extends('header.base-views')

@section('title', 'Exportar Especialistas')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('especialistas.listarEspecialistas') }}">
            < Volver</a>
    </div>

    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">

        <!-- Título formulario -->
        <h1>Exportar Especialistas</h1>

        <!-- Datos actividad -->
        <div class="separacionFormulario">

        <div class="content">
    <h2>Exportar Especialistas a Excel</h2>
    <hr>
    <form action="{{ route('especialistas.exportarEspecialistas') }}" method="GET">
        @csrf
        <div>
            <label for="fromDate">Desde:</label>
            <input type="date" id="fromDate" name="fromDate" required>
        </div>
        <div>
            <label for="toDate">Hasta:</label>
            <input type="date" id="toDate" name="toDate" required>
        </div>
        <button type="submit" class="boton-primario">Exportar</button>
    </form>
</div>
    </form>
</div>
@endsection