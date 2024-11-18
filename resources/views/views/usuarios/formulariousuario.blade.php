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
    <form method="POST" class="formularioPiola">
        <h1>Registrar usuario</h1>
        <div class="separacionFormulario">
            <!-- Run especialista -->
            <section class="layoutTelefono">
                <div>
                    <label for="userRut">Rut:</label>
                    <input type="number" name="userRut" id="userRut">
                </div>
                <div>
                    <label for="userDv">Dv:</label>
                    <input type="text" name="userDv" id="userDv">
                </div>
            </section>
            <!-- Nombre especialista -->
            <div class="layoutNombre">
                <div>
                    <label for="userPNombre">Primer Nombre:</label>
                    <input type="text" name="userPNombre" id="userPNombre">
                </div>
                <div>
                    <label for="userSNombre">Segundo Nombre:</label>
                    <input type="text" name="userSNombre" id="userSNombre">
                </div>
                <div>
                    <label for="userApPaterno">Apellido Paterno:</label>
                    <input type="text" name="userApPaterno" id="userApPaterno">
                </div>
                <div>
                    <label for="userApMaterno">Apellido Materno:</label>
                    <input type="text" name="userApMaterno" id="userApMaterno">
                </div>
            </div>
            <!-- Teléfono especialista -->
            <label for="userTel">Teléfono:</label>
            <input type="number" name="userTel" id="userTel">
            <!-- Correo especialista -->
            <label for="userEmail">Correo electrónico:</label>
            <input type="email" name="userEmail" id="userEmail">
            <!-- Contraseña -->
            <label for="userPass">Contraseña:</label>
            <input type="password" name="userPass" id="userPass">
            <!-- Contraseña2 -->
            <label for="userPass2">Confirmar contraseña:</label>
            <input type="password" name="userPass2" id="userPass2">
            <!-- Accesos del usuario a la página -->
            <fieldset>
                <legend>Vistas a la página:</legend>

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
        <div class="fila2" id="grupoBotones">
            <a class="boton-primario" href="{{ route('formularioBeneficiario') }}">Añadir</a>
            <a class="boton-secundario" href="{{ route('formularioBeneficiario') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection