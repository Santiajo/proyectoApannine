@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('beneficiarioAsistencia') }}">
            < Volver</a>
    </div>

    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">

        <!-- Título formulario -->
        <h1>Exportar asistencias Juan Manzo</h1>

        <!-- Datos actividad -->
        <div class="separacionFormulario">

            <div class="separacionFormulario">
                <h3>Período de tiempo</h3>
                <div class="separacionFormulario">
                    <label for="expUserDesde">Desde:</label>
                    <input type="date" name="expUserDesde" id="expUserDesde">

                    <label for="expUserDesde">Hasta:</label>
                    <input type="date" name="expUserDesde" id="expUserDesde">
                </div>
            </div>

            <div class="fila2" id="grupoBotones">
                <a class="boton-cuartiario" href="{{ route('registroactividad') }}">Exportar >></a>
            </div>
    </form>
</div>
@endsection