@section('content')
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('cuenta.create') }}">Registrar nuevo usuario</a>
    
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <ul>
    @foreach ($usuarios as $usuario)
        <li>
            {{ $usuario->name }} - {{ $usuario->email }}
            <a href="{{ route('cuenta.edit', $usuario) }}">Editar</a>

            <form action="{{ route('cuenta.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Seguro que quieres eliminar este usuario?')">
                    Eliminar
                </button>
            </form>
        </li>
    @endforeach
    </ul>

