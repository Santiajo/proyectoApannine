@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <h2>Listado de especialistas</h2>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-primario" id="benAgregar" href="{{ route('especialistas.formularioEspecialista') }}">
            <p><i class='bx bx-user-plus'></i> Agregar especialista</p>
        </a>
        <a class="boton-primario" id="benAgregar" href="{{ route('especialistas.crudEspecialidad') }}">
            <p><i class='bx bx-plus-medical'></i> Agregar especialidad</p>
        </a>
        <a class="boton-secundario" id="benExportar" href="{{ route('exportarEspecialistas') }}"><i
                class='bx bx-export'></i> Exportar</a>
        <!-- Para buscar productos por texto -->
        <form method="POST">
            <input type="text" name="benBuscar" id="benBuscar" placeholder="Buscar...">
            <button type="submit"><i class='bx bx-search'></i></button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo electrónico</th>
                <th>Especialidad</th>
                <th>Abreviación</th>
                <th>Fecha de registro</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($especialistas as $especialista)
                <tr>
                    <td data-label="Rut">{{ $especialista->especialistaRut }}-{{ $especialista->especialistaDv }}</td>
                    <td data-label="Nombre">{{ $especialista->especialistaPNombre }}
                        {{ $especialista->especialistaSNombre }}
                    </td>
                    <td data-label="Teléfono">{{ $especialista->especialistaTelefono }}</td>
                    <td data-label="Correo electrónico">{{ $especialista->especialistaCorreo }}</td>
                    @foreach ($especialidades as $especialidad)
                        @if ($especialista->especialidad_id == $especialidad->id)
                            <td data-label="Especialidad">{{ $especialidad->especialidadNombre }}</td>
                            <td data-label="Abreviación">{{ $especialidad->especialidadAbreviacion }}</td>
                        @endif
                    @endforeach
                    <td data-label="Fecha de registro">{{ $especialista->created_at }}</td>
                    <td data-label="Modificar">
                        <a class="boton-quintiario" id="benAgregar"
                            href="{{ route('especialistas.formularioEspecialistaRelleno', $especialista->id) }}">
                            Modificar</a>
                    </td>
                    <td data-label="Eliminar">
                        <form action="{{ route('especialistas.eliminarEspecialista', $especialista->id) }}" method="POST"
                            style="display: inline;" onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button class="boton-terciario" type="submit"><i class='bx bx-trash'></i></button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection