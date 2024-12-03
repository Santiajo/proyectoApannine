@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1" id="fila1Perso3">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('asistencia') }}">
            < Volver</a>
    </div>
    <div class="fila1">
        <h2>Asistencia Juan Manzo</h2>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-sextiario" id="benExportar" href="{{ route('registroAsistBeneficiario') }}"><i
                class='bx bxs-calendar-edit'></i> Registrar asistencia</a>
        <a class="boton-secundario" id="benExportar" href="{{ route('exportarBeneficiario') }}"><i
                class='bx bx-export'></i> Exportar</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo apoderado</th>
                <th>%</th>
                <th class="thRotado">03/12/2024</th>
                <th class="thRotado">04/12/2024</th>
                <th class="thRotado">05/12/2024</th>
                <th class="thRotado">06/12/2024</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Rut">9835803-k</td>
                <td data-label="Nombre">Juan Manzo</td>
                <td data-label="Teléfono">981267512</td>
                <td data-label="Correo apoderado">juanmanzo93@gmail.com</td>
                <td data-label="Correo apoderado">50%</td>
                <td data-label="Correo apoderado">P</td>
                <td data-label="Correo apoderado">A</td>
                <td data-label="Correo apoderado">P</td>
                <td data-label="Correo apoderado">J</td>
            </tr>
        </tbody>
    </table>
    <div class="fila4">
        <a class="boton-primario" id="atras" href="{{ route('fichabeneficiario') }}">
            << Atras</a>
                <a class="boton-primario" id="uno" href="{{ route('fichabeneficiario') }}">1</a>
                <a class="boton-primario" id="dos" href="{{ route('fichabeneficiario') }}">2</a>
                <a class="boton-primario" id="adelante" href="{{ route('fichabeneficiario') }}">Adelante >></a>
    </div>
</div>
@endsection