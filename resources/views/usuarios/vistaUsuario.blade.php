@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver1" href="{{ route('fichausuarios') }}">
            < Volver</a>
    </div>
    <div class="fila1">
        <h2>Datos de usuario</h2>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-quintiario" id="benAgregar" href="{{ route('formulariousuario') }}">
            <p>Modificar</p>
        </a>
        <a class="boton-terciario" id="benEliminar" href="{{ route('vistaUsuario', ['id' => $usuario->id]) }}"><i class='bx bx-trash'></i>
            Eliminar</a>
        <a class="boton-secundario" id="benExportar" href="{{ route('vistaUsuario', ['id' => $usuario->id]) }}"><i
                class='bx bx-export'></i>
            Exportar</a> -->
    </div>
    <div class="cardSimple">
        <div class="separacionFormulario">
            <h3>{{ $usuario->nombres }} {{ $usuario->apellidos }}</h3>
            <p><span class="letraNegrita">Rut: </span> {{ $usuario->rut }}</p>
            <p><span class="letraNegrita">Fecha de nacimiento: </span> {{ $usuario->fecha_nacimiento }}</p>
            <p><span class="letraNegrita">Correo electrónico: </span> {{ $usuario->email }}</p>
            <p><span class="letraNegrita">Teléfono: </span> {{ $usuario->telefono }}</p>
            <p><span class="letraNegrita">Fecha de registro: </span> {{ $usuario->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
    <br>
    <form method="POST" class="formularioPiola">
        <div class="separacionFormulario">
            <fieldset>
                <legend><h3>Permisos en la página</h3></legend>
                <input type="checkbox" id="userVista1" name="benBenSoc1" value="Usuarios">
                <label for="userVista1"> Usuarios</label><br>
                <input type="checkbox" id="userVista2" name="userVista2" value="Beneficiarios">
                <label for="userVista2"> Beneficiarios</label><br>
                <input type="checkbox" id="userVista3" name="userVista3" value="Especialistas">
                <label for="userVista3"> Especialistas</label><br>
                <input type="checkbox" id="userVista4" name="userVista4" value="Especialidades">
                <label for="userVista4"> Especialidades</label><br>
                <input type="checkbox" id="userVista5" name="userVista5" value="Asistencias">
                <label for="userVista5"> Asistencias</label><br>
            </fieldset>
        </div>
        <div class="fila2" id="fila1Perso">
            <a class="boton-cuartiario" href="{{ route('vistaUsuario', ['id' => $usuario->id]) }}">Aplicar <i class='bx bx-check'></i></a>
        </div>
    </form>
</div>
@endsection