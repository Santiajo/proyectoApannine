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
    <div class="fila2" id="fila1Perso">
            <a class="boton-primario" id="benAgregar" href="{{ route('formularioBeneficiario') }}">
                <p><i class='bx bxs-user-plus'></i> Agregar beneficiario</p>
            </a>
            <a class="boton-primario" id="benAgregar" href="{{ route('beneficiarios.crudNacionalidad') }}">
                <p><i class='bx bxs-flag'></i> Agregar nacionalidad</p>
            </a>
            <a class="boton-primario" id="benAgregar" href="{{ route('beneficiarios.crudComuna') }}">
                <p>Agregar comuna</p>
            </a>
        </a>
    </div>
    <div class="fiftyfifty">
        <form action="{{ route('beneficiarios.guardarCobMedica') }}" method="POST" class="formularioPiola"
            id="formCobMedica">
            @csrf
            <h1>Agregar cobertura medica</h1>
            <div class="separacionFormulario">
                <input type="hidden" name="cobMedId" id="cobMedId">

                <label for="cobMedNombre">Nombre: </label>
                <input type="text" name="cobMedNombre" id="cobMedNombre" placeholder="Máximo 30 caracteres">
                <div class="errores" id="errorCobMedNombre"></div>
                @error('cobMedNombre')
                    <div class="alert alert-danger">El nombre no cumple con los requisitos!</div>
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
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cobMedicas as $cobMedica)
                    <tr>
                        <td data-label="Nombre">{{ $cobMedica->nombreCobMed }}</td>
                        <td data-label="Modificar"><button class="boton-quintiario" id="benAgregar"
                                onclick="editarCobertura({{ $cobMedica }})">Modificar</button>
                        </td>
                        <td data-label="Eliminar">
                            <form action="{{ route('beneficiarios.eliminarCobMedica', $cobMedica->id) }}" method="POST"
                                style="display: inline;" onsubmit="return confirmDelete(event)">
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