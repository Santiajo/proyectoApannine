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
    <div class="fila2" id="fila1Perso">
        <a class="boton-primario" href="{{ route('formEspecialista') }}">
            <p><i class='bx bx-plus-medical'></i> Agregar especialista</p>
        </a>
    </div>
    <div class="fiftyfifty">
        <form method="POST" class="formularioPiola">
            <h1>Registrar especialidad</h1>
            <div class="separacionFormulario">
                <label for="especialidadNombre">Nombre: </label>
                <input type="text" name="especialidadNombre" id="especialidadNombre">

                <label for="especialidadAbrev">Abreviación: </label>
                <input type="text" name="especialidadAbrev" id="especialidadAbrev">
            </div>
            <div class="fila2" id="grupoBotones">
                <a class="boton-primario" href="{{ route('formEspecialidad') }}">Añadir</a>
                <a class="boton-secundario" href="{{ route('formEspecialidad') }}">Cancelar</a>
            </div>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Abreviación</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Nombre">Terapia Ocupacional</td>
                    <td data-label="Abreviación">TO</td>
                    <td data-label="Modificar"><a class="boton-quintiario" id="benAgregar"
                            href="{{ route('verBeneficiario') }}">
                            Modificar</a></td>
                    <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                            href="{{ route('formEspecialidad') }}"><i class='bx bx-trash'></i>
                            Eliminar</a></td>
                </tr>
                <tr>
                    <td data-label="Nombre">Kinesiología</td>
                    <td data-label="Abreviación">KINE</td>
                    <td data-label="Modificar"><a class="boton-quintiario" id="benAgregar"
                            href="{{ route('verBeneficiario') }}">
                            Modificar</a></td>
                    <td data-label="Eliminar"><a class="boton-terciario" id="benEliminar"
                            href="{{ route('formEspecialidad') }}"><i class='bx bx-trash'></i>
                            Eliminar</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection