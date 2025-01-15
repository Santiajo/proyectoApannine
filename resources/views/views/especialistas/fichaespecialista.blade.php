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
        <a class="boton-primario" id="benAgregar" href="{{ route('formEspecialista') }}">
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
            <tr>
                <td data-label="Rut">20880574-6</td>
                <td data-label="Nombre">Simón Hernández</td>
                <td data-label="Teléfono">9 6687 6669</td>
                <td data-label="Correo electrónico">simon.hernandez.2001@gmail.com</td>
                <td data-label="Especialidad">Terapia Ocupacional</td>
                <td data-label="Abreviación">TO</td>
                <td data-label="Fecha de registro">19/11/2024</td>
                <td data-label="Modificar"><a class="boton-quintiario" id="benAgregar"
                        href="{{ route('verBeneficiario') }}">
                        Modificar</a></td>
                <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                        href="{{ route('especialistas.crudEspecialidad') }}"><i class='bx bx-trash'></i></a></td>
            </tr>
            <tr>
                <td data-label="Rut">18487992-1</td>
                <td data-label="Nombre">Joaquín Muñoz</td>
                <td data-label="Teléfono">9 9412 6722</td>
                <td data-label="Correo electrónico">joaquin.muñoz.2001@gmail.com</td>
                <td data-label="Especialidad">Kinesiología</td>
                <td data-label="Abreviación">KINE</td>
                <td data-label="Fecha de registro">19/11/2024</td>
                <td data-label="Modificar"><a class="boton-quintiario" href="{{ route('verBeneficiario') }}">
                        Modificar</a></td>
                <td data-label="Eliminar"><a class="boton-terciario" href="{{ route('especialistas.crudEspecialidad') }}"><i
                            class='bx bx-trash'></i></a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection