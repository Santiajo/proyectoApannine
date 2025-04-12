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
    <div class="fila2" id="fila1Perso">
        <a class="boton-primario" href="{{ route('especialistas.formularioEspecialista') }}">
            <p><i class='bx bx-plus-medical'></i> Agregar especialista</p>
        </a>
    </div>
    <div class="fiftyfifty">
        <form action="{{ route('especialistas.guardarEspecialidad') }}" method="POST" class="formularioPiola"
            id="formEspecialidad">
            @csrf
            <h1>Agregar especialidad</h1>
            <div class="separacionFormulario">
                <input type="hidden" name="especialidadId" id="especialidadId">

                <label for="especialidadNombre">Nombre: </label>
                <input type="text" name="especialidadNombre" id="especialidadNombre" placeholder="Máximo 20 caracteres">
                <div class="errores" id="errorEspecialidadNombre"></div>
                @error('especialidadNombre')
                    <div class="alert alert-danger">El nombre no cumple con los requisitos!</div>
                @enderror

                <label for="especialidadAbrev">Abreviación: </label>
                <input type="text" name="especialidadAbrev" id="especialidadAbrev" placeholder="Máximo 5 caracteres">
                <div class="errores" id="errorespecialidadAbrev"></div>
                @error('especialidadAbrev')
                    <div class="alert alert-danger">La abreviación no cumple con los requisitos!</div>
                @enderror
            </div>
            <div class="fila2" id="grupoBotones">
                <button class="boton-primario" type="submit">Añadir</button>
                <button class="boton-secundario" type="button" onclick="limpiarInputs()">Cancelar</button>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Abreviación</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($especialidades as $especialidad)
                    <tr>
                        <td data-label="Nombre">{{ $especialidad->especialidadNombre }}</td>
                        <td data-label="Abreviación">{{ $especialidad->especialidadAbreviacion }}</td>
                        <td data-label="Modificar"><button class="boton-quintiario" id="benAgregar"
                                onclick="editarEspecialidad({{ $especialidad }})">Modificar</button>
                        </td>
                        <td data-label="Eliminar">
                            <form action="{{ route('especialistas.eliminarEspecialidad', $especialidad->id) }}"
                                method="POST" style="display: inline;" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button class="boton-terciario" type="submit"><i class='bx bx-trash'></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection