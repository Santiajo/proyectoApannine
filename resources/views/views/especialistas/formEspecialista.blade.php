@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver1" href="{{ route('fichaespecialista') }}">
            < Volver</a>
    </div>
    <div class="fila2">
        <a class="boton-primario" id="benAgregar" href="{{ route('formEspecialidad') }}">
            <p><i class='bx bx-plus-medical'></i> Agregar especialidad</p>
        </a>
    </div>
    <form method="POST" class="formularioPiola">
        <h1>Registrar especialista</h1>
        <div class="separacionFormulario">
            <!-- Run especialista -->
            <section class="layoutTelefono">
                <div>
                    <label for="benRut">Rut:</label>
                    <input type="number" name="benRut" id="benRut">
                </div>
                <div>
                    <label for="benDv">Dv:</label>
                    <input type="text" name="benDv" id="benDv">
                </div>
            </section>
            <!-- Nombre especialista -->
            <div class="layoutNombre">
                <div>
                    <label for="espPNombre">Primer Nombre:</label>
                    <input type="text" name="espPNombre" id="espPNombre">
                </div>
                <div>
                    <label for="espSNombre">Segundo Nombre:</label>
                    <input type="text" name="espPNombre" id="espPNombre">
                </div>
                <div>
                    <label for="espApPaterno">Apellido Paterno:</label>
                    <input type="text" name="espPNombre" id="espPNombre">
                </div>
                <div>
                    <label for="espApMaterno">Apellido Materno:</label>
                    <input type="text" name="espPNombre" id="espPNombre">
                </div>
            </div>
            <!-- Teléfono especialista -->
            <label for="espTel">Teléfono:</label>
            <input type="number" name="espTel" id="espTel">
            <!-- Correo especialista -->
            <label for="famEmail">Correo electrónico:</label>
            <input type="email" name="famEmail" id="famEmail">
            <!-- Especialidad -->
            <label for="espEspecialidad">Especialidad:</label>
            <select name="espEspecialidad" id="espEspecialidad">
                <option value="Terapia Ocupacional">Terapia Ocupacional</option>
                <option value="Kinesiología">Kinesiología</option>
            </select>
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-primario" href="{{ route('formularioBeneficiario') }}">Añadir</a>
            <a class="boton-secundario" href="{{ route('formularioBeneficiario') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection