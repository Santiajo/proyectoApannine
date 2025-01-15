@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver1" href="{{ route('especialistas.listarEspecialistas') }}">
            < Volver</a>
    </div>
    <div class="fila2">
        <a class="boton-primario" id="benAgregar" href="{{ route('especialistas.crudEspecialidad') }}">
            <p><i class='bx bx-plus-medical'></i> Agregar especialidad</p>
        </a>
    </div>
    <form method="POST" class="formularioPiola">
        <h1>Agregar especialista</h1>
        <div class="separacionFormulario">
            <!-- Run especialista -->
            <section class="layoutTelefono">
                <div>
                    <label for="espRut">Rut:</label>
                    <input type="number" name="espRut" id="espRut">
                </div>
                <div>
                    <label for="espDv">Dv:</label>
                    <input type="text" name="espDv" id="espDv">
                </div>
            </section>
            <!-- Nombre especialista -->
            <div class="layoutNombre">
                <div>
                    <label for="espPNombre">Primer Nombre:</label>
                    <input type="text" name="espPNombre" id="espPNombre">
                </div>
                <div>
                    <label for="espSNombre">Segundo Nombre:</label>
                    <input type="text" name="espSNombre" id="espSNombre">
                </div>
                <div>
                    <label for="espApPaterno">Apellido Paterno:</label>
                    <input type="text" name="espApPaterno" id="espApPaterno">
                </div>
                <div>
                    <label for="espApMaterno">Apellido Materno:</label>
                    <input type="text" name="espApMaterno" id="espApMaterno">
                </div>
            </div>
            <!-- Teléfono especialista -->
            <label for="espTel">Teléfono:</label>
            <input type="number" name="espTel" id="espTel">
            <!-- Correo especialista -->
            <label for="espEmail">Correo electrónico:</label>
            <input type="email" name="espEmail" id="espEmail">
            <!-- Especialidad -->
            <label for="espEspecialidad">Especialidad:</label>
            <select name="espEspecialidad" id="espEspecialidad">
                @foreach ($especialidades as $especialidad)
                    <option value="{{ $especialidad->id }}">{{ $especialidad->especialidadNombre }} - {{ $especialidad->especialidadAbreviacion }}</option>
                @endforeach
            </select>
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-primario" href="{{ route('formularioBeneficiario') }}">Añadir</a>
            <a class="boton-secundario" href="{{ route('formularioBeneficiario') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection