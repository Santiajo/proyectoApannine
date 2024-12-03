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
        <h2>Historial medico Juan Manzo</h2>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-quintiario" id="benAgregar" href="{{ route('verBeneficiario') }}">
            <p>Modificar</p>
        </a>
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Antecedentes de salud</h3>
            <p><span class="letraNegrita">NEE: </span> Cáracter transitorio</p>
            <p><span class="letraNegrita">Enfermedades crónicas: </span> Diábetes tipo 2</p>
            <p><span class="letraNegrita">Tratamientos actuales: </span><br>Consumo de insulina para regular la
                glicemia.</p>
            <p><span class="letraNegrita">¿Ha tenido cirugías?: </span> No</p>
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
                    <td data-label="Asistencia"><a class="detalles" href="{{ route('histMedBeneficiario') }}"><i class='bx bx-download'></i></a></td>
                    <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                            href="{{ route('histMedBeneficiario') }}"><i class='bx bx-trash'></i></a></td>
                </tr>
                <tr>
                    <td data-label="Documentos">recetaMedicamentos.pdf</td>
                    <td data-label="Documentos">03-12-2023</td>
                    <td data-label="Asistencia"><a class="detalles" href="{{ route('histMedBeneficiario') }}"><i class='bx bx-download'></i></a></td>
                    <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                            href="{{ route('histMedBeneficiario') }}"><i class='bx bx-trash'></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection