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
    <br>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>Antecedentes de salud</h3>
            <p><span class="letraNegrita">NEE: </span> Cáracter transitorio</p>
            <p><span class="letraNegrita">Enfermedades crónicas: </span> Diábetes tipo 2</p>
            <p><span class="letraNegrita">Tratamientos actuales: </span><br>Consumo de insulina para regular la
                glicemia.</p>
            <p><span class="letraNegrita">¿Ha tenido cirugías?: </span> No</p>
        </div>
        <div class="fila2" id="fila1Perso3">
            <a class="boton-quintiario" id="benAgregar" href="{{ route('formularioBeneficiarioAntSalud') }}">
                <p>Modificar</p>
            </a>
        </div>
    </div>
</div>
@endsection