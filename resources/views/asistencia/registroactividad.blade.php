@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('asistencia') }}">
            < Volver</a>
    </div>

    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">

        <!-- Título formulario -->
        <h1>Crear actividad</h1>


        <!-- Datos actividad -->
        <div class="separacionFormulario">
            <h3>Datos actividad</h3>

            <label for="actEstado">Estado de la actividad:</label>
            <select name="actEstado" id="actEstado">
                <option value="En progreso">En progreso</option>
                <option value="Finalizada">Finalizada</option>
            </select>

            <!-- Nombre actividad -->
            <label for="actNombre">Nombre:</label>
            <input type="text" name="actNombre" id="actNombre">

            <!-- Descripcion actividad -->
            <div class="textarea">
                <label for="actDescripcion">Descripción:</label>
                <textarea name="actDescripcion" id="actDescripcion" rows="4" cols="50"></textarea>
            </div>

            <!-- Tipo de participances -->
            <label for="actTipPart">Tipo de participantes:</label>
            <select name="actTipPart" id="actTipPart">
                <option value="Beneficiarios">Beneficiarios</option>
                <option value="Apoderados">Apoderados</option>
                <option value="Hermanos">Hermanos</option>
                <option value="Beneficiarios y apoderados">Beneficiarios y apoderados</option>
                <option value="Todos">Todos</option>
            </select>
        </div>

        <div class="separacionFormulario">
            <h3>Participantes</h3>
            <hr>
            <div class="fila2" id="todos">
                <input type="checkbox" name="actTodos" id="actTodos">
                <label for="actTodos">Añadir todos</label>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Rut</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Cobertura médica</th>
                        <th>NEE</th>
                        <th>Enfermedades crónicas</th>
                        <th>Añadir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Rut">9835803-k</td>
                        <td data-label="Nombre">Juan Manzo</td>
                        <td data-label="Teléfono">981267512</td>
                        <td data-label="Cobertura médica">Fonasa tramo b</td>
                        <td data-label="NEE">Cáracter transitorio</td>
                        <td data-label="Enfermedades crónicas">Diabetes tipo 2</td>
                        <td data-label="Acciones"><input type="checkbox" name="actParticipante" id="actParticipante"></td>
                    </tr>
                    <tr>
                        <td data-label="Rut">9835803-k</td>
                        <td data-label="Nombre">Juan Manzo</td>
                        <td data-label="Teléfono">981267512</td>
                        <td data-label="Cobertura médica">Fonasa tramo b</td>
                        <td data-label="¿Asiste al colegio?">No</td>
                        <td data-label="NEE">Cáracter transitorio</td>
                        <td data-label="Acciones"><input type="checkbox" name="actParticipante" id="actParticipante"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="fila2" id="grupoBotones">
            <a class="boton-primario" href="{{ route('registroactividad') }}">Añadir</a>
            <a class="boton-secundario" href="{{ route('registroactividad') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection