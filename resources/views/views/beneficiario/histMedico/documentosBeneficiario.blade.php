@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver1" href="{{ route('beneficiarios.listarBeneficiarios') }}">
            < Volver</a>
    </div>
    <div class="fila1">
        <h2>Historial medico Juan Manzo</h2>
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
                <a href="{{ route('histMedBeneficiario') }}"
                    class="{{ request()->routeIs('histMedBeneficiario') ? 'active' : '' }}">Seguimiento</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('antMedBeneficiario') }}"
                    class="{{ request()->routeIs('antMedBeneficiario') ? 'active' : '' }}">Antecedentes de salud</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('diagnosticoBeneficiario') }}"
                    class="{{ request()->routeIs('diagnosticoBeneficiario') ? 'active' : '' }}">Diagnóstico</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('documentosBeneficiario') }}"
                    class="{{ request()->routeIs('documentosBeneficiario') ? 'active' : '' }}">Documentos</a>
            </div>
        </div>
    </div>
    <div class="fila1">
        <table>
            <thead>
                <tr>
                    <th>Documentos</th>
                    <th>Fecha de subida</th>
                    <th>Descargar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Documentos">diagnosticoDiabetes.pdf</td>
                    <td data-label="Documentos">03-12-2023</td>
                    <td data-label="Asistencia"><a class="detalles" href="{{ route('histMedBeneficiario') }}"><i
                                class='bx bx-download'></i></a></td>
                    <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                            href="{{ route('histMedBeneficiario') }}"><i class='bx bx-trash'></i></a></td>
                </tr>
                <tr>
                    <td data-label="Documentos">recetaMedicamentos.pdf</td>
                    <td data-label="Documentos">03-12-2023</td>
                    <td data-label="Asistencia"><a class="detalles" href="{{ route('histMedBeneficiario') }}"><i
                                class='bx bx-download'></i></a></td>
                    <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                            href="{{ route('histMedBeneficiario') }}"><i class='bx bx-trash'></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection