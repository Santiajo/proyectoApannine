@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <h2>Consultas del día</h2>
    </div>
    <hr>
    <br>
    <table>
        <thead>
            <tr>
                <th>Paciente</th>
                <th>Correo cuidador</th>
                <th>Número cuidador</th>
                <th>Hora de inicio</th>
                <th>Registrar asistencia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Paciente">Juan Manzo</td>
                <td data-label="Correo cuidador">juanmanzo@gmail.com</td>
                <td data-label="Número cuidador">981267512</td>
                <td data-label="Hora de inicio">9:30</td>
                <td data-label="Registrar asistencia"><a class="detalles" href="{{ route('formAsistenciaMedico') }}"><i class='bx bx-calendar-edit' ></i></a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection