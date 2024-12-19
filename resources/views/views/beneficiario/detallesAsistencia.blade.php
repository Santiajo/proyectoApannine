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
        <h2>Asistencia Juan Manzo</h2>
    </div>
    <hr>
    <br>
    <div class="navPiola">
        <div class="navTitulo">
            <h3>Ver por:</h3>
        </div>
        <hr>
        <div class="navLinks">
            <div class="navEnlace">
                <a href="{{ route('asistenciaBeneficiarios') }}"
                    class="{{ request()->routeIs('detallesAsistencia') ? 'active' : '' }}">Asistencias</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('detallesAusencia') }}"
                    class="{{ request()->routeIs('detallesAusencia') ? 'active' : '' }}">Ausencias</a>
            </div>
        </div>
    </div>
    <div class="fila2">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Actividad</th>
                    <th>Asistencia</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Fecha">04/12/2024</td>
                    <td data-label="Actividad">TO</td>
                    <td data-label="Asistencia">P</td>
                </tr>
                <tr>
                    <td data-label="Fecha">06/12/2024</td>
                    <td data-label="Actividad">KINE</td>
                    <td data-label="Asistencia">P</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="fila4" id="fila1Perso">
        <a class="boton-primario" id="atras" href="{{ route('fichabeneficiario') }}">
            << Atras</a>
                <a class="boton-primario" id="uno" href="{{ route('fichabeneficiario') }}">1</a>
                <a class="boton-primario" id="dos" href="{{ route('fichabeneficiario') }}">2</a>
                <a class="boton-primario" id="adelante" href="{{ route('fichabeneficiario') }}">Adelante >></a>
    </div>
</div>
@endsection