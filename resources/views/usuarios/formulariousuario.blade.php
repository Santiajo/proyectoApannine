@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver1" href="{{ route('usuarios.listar') }}">
            < Volver
        </a>
    </div>
    <form method="POST" action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('usuarios.store') }}" class="formularioPiola" onsubmit="return validarFormularioUsuario();">
    @csrf
    @if(isset($usuario))
        @method('PUT')
    @endif

    <h1>{{ isset($usuario) ? 'Editar usuario' : 'Registrar usuario' }}</h1>

    <div class="separacionFormulario">
        <!-- RUT usuario -->
        <section class="layoutTelefono">
            <div>
                <label for="userRut">Rut:</label>
                <input type="text" name="userRut" id="userRut" pattern="\d{7,8}" title="Ingrese un RUT válido sin puntos ni guion"
                    value="{{ old('userRut', $usuario->rut ?? '') }}"  placeholder="Solo números">
                @error('userRut') 
                <div class="alert alert-danger alert2">El rut no es válido!</div> 
                @enderror
            </div>
            <div>
                <label for="userDv">Dv:</label>
                <input type="text" name="userDv" id="userDv" maxlength="1" value="{{ old('userDv', $usuario->dv ?? '') }}" placeholder="Solo un número o K">
                @error('userDv') 
                <div class="alert alert-danger alert2">El Dv no cumple con los requisitos!</div> 
                @enderror
            </div>
        </section>

        <!-- Nombre usuario -->
        <div class="layoutNombre">
            <div>
                <label for="userPNombre">Primer Nombre:</label>
                <input type="text" name="userPNombre" id="userPNombre" value="{{ old('userPNombre', $usuario->primer_nombre ?? '') }}" placeholder="Menos de 20 caracteres">
                @error('userPNombre') 
                <div class="alert alert-danger alert2">El primer nombre no cumple con los requisitos!</div> 
                @enderror
            </div>
            <div>
                <label for="userSNombre">Segundo Nombre:</label>
                <input type="text" name="userSNombre" id="userSNombre" value="{{ old('userSNombre', $usuario->segundo_nombre ?? '') }}" placeholder="(Opcional)">
                @error('userSNombre') 
                <div class="alert alert-danger alert2">El segundo nombre no cumple con los requisitos!</div> 
                @enderror
            </div>
            <div>
                <label for="userApPaterno">Apellido Paterno:</label>
                <input type="text" name="userApPaterno" id="userApPaterno" value="{{ old('userApPaterno', $usuario->apellido_paterno ?? '') }}" placeholder="Menos de 20 caracteres">
                @error('userApPaterno') 
                <div class="alert alert-danger alert2">El primer nombre no cumple con los requisitos!</div> 
                @enderror
            </div>
            <div>
                <label for="userApMaterno">Apellido Materno:</label>
                <input type="text" name="userApMaterno" id="userApMaterno" value="{{ old('userApMaterno', $usuario->apellido_materno ?? '') }}" placeholder="Menos de 20 caracteres">
                @error('userApMaterno') 
                <div class="alert alert-danger alert2">El primer nombre no cumple con los requisitos!</div> 
                @enderror
            </div>
        </div>

        <!-- Teléfono -->
        <label for="userTel">Teléfono:</label>
        <input type="tel" name="userTel" id="userTel" value="{{ old('userTel', $usuario->telefono ?? '') }}" placeholder="Solo números">
        <div class="errores" id="errorEspEmail"></div>
        @error('userTel') 
        <div class="alert alert-danger alert">El primer nombre no cumple con los requisitos!</div> 
        @enderror

        <!-- Correo usuario -->
        <label for="userEmail">Correo electrónico:</label>
        <input type="email" name="" id="userEmail" value="{{ old('userEmail', $usuario->email ?? '') }}" placeholder="alguien@ejemplo.com">
        <div class="errores" id="errorEspEmail"></div>
        @error('userEmail') 
        <div class="alert alert-danger alert">El primer nombre no cumple con los requisitos!</div> 
        @enderror

        <!-- Contraseña (si es edición, solo si se quiere cambiar) -->
        <label for="userPass">{{ isset($usuario) ? 'Nueva contraseña (opcional):' : 'Contraseña:' }}</label>
        <input type="password" name="userPass" id="userPass">

        <label for="userPass2">{{ isset($usuario) ? 'Confirmar nueva contraseña:' : 'Confirmar contraseña:' }}</label>
        <input type="password" name="userPass_confirmation" id="userPass2">
        


        <!-- Accesos del usuario a la página -->
        <fieldset>
            <legend>Vistas a la página:</legend>

            @php
                $vistasSeleccionadas = isset($usuario) ? [
                    'usuarios' => $usuario->usuarios,
                    'beneficiarios' => $usuario->beneficiarios,
                    'especialistas' => $usuario->especialistas,
                    'talleres' => $usuario->talleres,
                    'asistencias' => $usuario->asistencias
                ] : [];
            @endphp

            @foreach(['usuarios', 'beneficiarios', 'especialistas', 'talleres', 'asistencias'] as $vista)
                <input type="checkbox" id="userVista_{{ $vista }}" name="vistas[]" value="{{ $vista }}" 
                    {{ isset($usuario) && $vistasSeleccionadas[$vista] ? 'checked' : '' }}>
                <label for="userVista_{{ $vista }}"> {{ ucfirst($vista) }}</label><br>
                @endforeach
            </fieldset>
        </div>

        <!-- Botones -->
        <div class="fila2" id="grupoBotones">
            <button type="submit" class="boton-primario">{{ isset($usuario) ? 'Actualizar' : 'Añadir' }}</button>
            <a class="boton-secundario" href="{{ route('fichausuarios') }}">Cancelar</a>
        </div>
    </form>



</div>
@endsection