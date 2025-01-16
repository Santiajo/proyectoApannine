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
    <form method="POST" action="{{ route('especialistas.guardarEspecialista') }}" class="formularioPiola">
        @csrf
        <h1>{{ isset($especialista) ? 'Editar Especialista' : 'Agregar Especialista' }}</h1>
        <div class="separacionFormulario">
            <!-- ID oculta -->
            <input type="hidden" name="especialistaId" id="especialistaId" value="{{ $especialista->id ?? '' }}">

            <!-- Run especialista -->
            <section class="layoutTelefono">
                <div>
                    <label for="espRut">Rut:</label>
                    <input type="number" name="espRut" id="espRut" value="{{ $especialista->especialistaRut ?? '' }}" placeholder="Solo números">
                    @error('espRut')
                        <div class="alert alert-danger alert2">El Rut no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="espDv">Dv:</label>
                    <input type="text" name="espDv" id="espDv" value="{{ $especialista->especialistaDv ?? '' }}" placeholder="Solo un número o K">
                    @error('espRut')
                        <div class="alert alert-danger alert2">El Dv no cumple con los requisitos!</div>
                    @enderror
                </div>
            </section>
            <!-- Nombre especialista -->
            <div class="layoutNombre">
                <div>
                    <label for="espPNombre">Primer Nombre:</label>
                    <input type="text" name="espPNombre" id="espPNombre"
                        value="{{ $especialista->especialistaPNombre ?? '' }}" placeholder="Menos de 20 caracteres">
                    @error('espPNombre')
                        <div class="alert alert-danger alert2">El primer nombre no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="espSNombre">Segundo Nombre:</label>
                    <input type="text" name="espSNombre" id="espSNombre"
                        value="{{ $especialista->especialistaSNombre ?? '' }}" placeholder="(Opcional)">
                    @error('espSNombre')
                        <div class="alert alert-danger alert2">El segundo nombre no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="espApPaterno">Apellido Paterno:</label>
                    <input type="text" name="espApPaterno" id="espApPaterno"
                        value="{{ $especialista->especialistaApPaterno ?? '' }}" placeholder="Menos de 20 caracteres">
                    @error('espApPaterno')
                        <div class="alert alert-danger alert2">El apellido paterno no cumple con los requisitos!</div>
                    @enderror
                </div>
                <div>
                    <label for="espApMaterno">Apellido Materno:</label>
                    <input type="text" name="espApMaterno" id="espApMaterno"
                        value="{{ $especialista->especialistaApMaterno ?? '' }}" placeholder="Menos de 20 caracteres">
                    @error('espApMaterno')
                        <div class="alert alert-danger alert2">El apellido materno no cumple con los requisitos!</div>
                    @enderror
                </div>
            </div>

            <!-- Teléfono especialista -->
            <label for="espTel">Teléfono:</label>
            <input type="number" name="espTel" id="espTel" value="{{ $especialista->especialistaTelefono ?? '' }}" placeholder="Solo números">
            @error('espTel')
                <div class="alert alert-danger">El teléfono no cumple con los requisitos!</div>
            @enderror

            <!-- Correo especialista -->
            <label for="espEmail">Correo electrónico:</label>
            <input type="email" name="espEmail" id="espEmail" value="{{ $especialista->especialistaCorreo ?? '' }}" placeholder="alguien@ejemplo.com">
            @error('espEmail')
                <div class="alert alert-danger">El correo no cumple con los requisitos!</div>
            @enderror

            <!-- Especialidad -->
            <label for="espEspecialidad">Especialidad:</label>
            <select name="espEspecialidad" id="espEspecialidad">
                @foreach ($especialidades as $especialidad)
                    <option value="{{ $especialidad->id }}" {{ (isset($especialista) && $especialista->especialidad_id == $especialidad->id) ? 'selected' : '' }}>
                        {{ $especialidad->especialidadNombre }} - {{ $especialidad->especialidadAbreviacion }}
                    </option>
                @endforeach
            </select>

        </div>

        <div class="fila2" id="grupoBotones">
            <button type="submit" class="boton-primario">{{ isset($especialista) ? 'Editar' : 'Añadir' }}</button>
            <button type="button" class="boton-secundario" onclick="limpiarInputs()">Cancelar</button>
        </div>
    </form>
</div>

@endsection