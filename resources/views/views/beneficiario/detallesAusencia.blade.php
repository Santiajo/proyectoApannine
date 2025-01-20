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
                <a href="{{ route('detallesAsistencia') }}"
                    class="{{ request()->routeIs('detallesAsistencia') ? 'active' : '' }}">Asistencias</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('detallesAusencia') }}"
                    class="{{ request()->routeIs('detallesAusencia') ? 'active' : '' }}">Ausencias</a>
            </div>
        </div>
    </div>
    <div class="fila1">
        <h2>Terapia ocupacional</h2>
    </div>
    <hr>
    <div class="fila2">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Asistencia</th>
                    <th>Justificación</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Fecha">03/12/2024</td>
                    <td data-label="Asistencia">A</td>
                    <td data-label="Justificación">No tiene</td>
                </tr>
                <tr>
                    <td>05/12/2024</td>
                    <td data-label="Asistencia">J</td>
                    <td data-label="Justificación">Tenía hora al médico ya que se enfermó</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="fila1" id="fila1Perso">
        <h2>Kinesiología</h2>
    </div>
    <hr>
    <div class="fila4">
        <h3>Este paciente no ha faltado a sesiones de Kinesiología</h3>
    </div>
    <div class="fila1">
        <h2>Fonoaudiología</h2>
    </div>
    <hr>
    <div class="fila4">
        <h3>Este paciente no ha faltado a sesiones de Fonoaudiología</h3>
    </div>
    <div class="fila4" id="fila1Perso">
        <a class="boton-primario" id="atras" href="{{ route('beneficiarios.listarBeneficiarios') }}">
            << Atras</a>
                <a class="boton-primario" id="uno" href="{{ route('beneficiarios.listarBeneficiarios') }}">1</a>
                <a class="boton-primario" id="dos" href="{{ route('beneficiarios.listarBeneficiarios') }}">2</a>
                <a class="boton-primario" id="adelante" href="{{ route('beneficiarios.listarBeneficiarios') }}">Adelante >></a>
    </div>
</div>
@endsection