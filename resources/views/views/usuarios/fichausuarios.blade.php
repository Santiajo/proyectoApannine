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
            <form id='formBuscarUser' class='barraBusqueda' method="GET" action="{{ route('usuarios.listar') }}">
                <div class="inputBarraBusqueda">
                    <input type="text" name="benBuscar" id="benBuscar" placeholder="Buscar..."
                        value="{{ request('benBuscar') }}">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </div>
                <div id='errorBarraBusqueda' class='errores'></div>
                @error('benBuscar')
                    <div class="alert alert-danger alert2">El valor ingresado no cumple los requisitos</div>
                @enderror
            </form>
        </div>
        @if(isset($usuarios) && count($usuarios) > 0)
            <p>Usuarios cargados correctamente.</p>
        @else
            <p>No hay usuarios registrados.</p>
        @endif
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
                @if(isset($usuarios) && count($usuarios) > 0)
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td data-label="Rut">{{ $usuario->rut }}-{{ $usuario->dv }}</td>
                            <td data-label="Nombre">
                                {{ $usuario->primer_nombre }}
                                {{ $usuario->segundo_nombre ? $usuario->segundo_nombre : '' }}
                                {{ $usuario->apellido_paterno }}
                                {{ $usuario->apellido_materno }}
                            </td>
                            <td data-label="Teléfono">{{ $usuario->telefono }}</td>
                            <td data-label="Correo electrónico">{{ $usuario->email }}</td>
                            <td data-label="Fecha de registro">{{ $usuario->created_at->format('d/m/Y') }}</td>
                            <td data-label="Acciones">
                                <a class="detalles" href="{{ route('vistaUsuario', $usuario->id) }}">
                                    <i class='bx bxs-file-doc'></i>
                                </a>
                            </td>
                            <td data-label="Modificar">
                                <a class="boton-quintiario" href="{{ route('usuarios.edit', $usuario->id) }}">Modificar</a>
                            </td>
                            <td data-label="Eliminar">
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="boton-terciario">
                                        <i class='bx bx-trash'></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8">No hay usuarios registrados.</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <br>
        <!-- Selector para cantidad de elementos por página -->
        <form method="GET" action="{{ route('usuarios.listar') }}">
            <label for="items_per_page">Resultados por página:</label>
            <select name="items_per_page" id="items_per_page" onchange="this.form.submit()">
                <option value="10" {{ request('items_per_page') == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ request('items_per_page') == 15 ? 'selected' : '' }}>15</option>
                <option value="20" {{ request('items_per_page') == 20 ? 'selected' : '' }}>20</option>
            </select>
            <input type="hidden" name="benBuscar" value="{{ request('benBuscar') }}">
        </form>

        <br>
        <!-- Paginación -->
        <div class="pagination">
            {{ $usuarios->links() }}
        </div>
    </div>
@endsection