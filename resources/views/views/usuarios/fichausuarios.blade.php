@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <h2>Listado de usuarios</h2>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-primario" id="benAgregar" href="{{ route('formulariousuario') }}">
            <p><i class='bx bx-user-plus'></i> Agregar usuario</p>
        </a>
        <a class="boton-secundario" id="benExportar" href="{{ route('exportarUsuarios') }}"><i class='bx bx-export'></i>
            Exportar</a>
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
                <th>Fecha de registro</th>
                <th>Detalles</th>
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
                <td data-label="Fecha de registro">13/11/2024</td>
                <td data-label="Acciones"><a class="detalles" href="{{ route('vistaUsuario') }}"><i
                            class='bx bxs-file-doc'></i></a></td>
                <td data-label="Modificar"><a class="boton-quintiario" href="{{ route('formulariousuario') }}">
                        Modificar</a></td>
                <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                        href="{{ route('fichausuarios') }}"><i class='bx bx-trash'></i>
                        Eliminar</a></td>
            </tr>
            <tr>
                <td data-label="Rut">18487992-1</td>
                <td data-label="Nombre">Joaquín Muñoz</td>
                <td data-label="Teléfono">9 9412 6722</td>
                <td data-label="Correo electrónico">joaquin.muñoz.2001@gmail.com</td>
                <td data-label="Fecha de registro">13/11/2024</td>
                <td data-label="Acciones"><a class="detalles" href="{{ route('vistaUsuario') }}"><i
                            class='bx bxs-file-doc'></i></a></td>
                <td data-label="Modificar"><a class="boton-quintiario" href="{{ route('formulariousuario') }}">
                        Modificar</a></td>
                <td data-label="Eliminar"><a class="boton-terciario" href="{{ route('fichausuarios') }}"><i
                            class='bx bx-trash'></i>
                        Eliminar</a></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection