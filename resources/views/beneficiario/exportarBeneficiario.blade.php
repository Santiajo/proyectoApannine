@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('beneficiarios.listarBeneficiarios') }}">
            < Volver</a>
    </div>

    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">

        <!-- Título formulario -->
        <h1>Exportar beneficiarios</h1>

        <!-- Datos actividad -->
        <div class="separacionFormulario">

            <div class="separacionFormulario">
                <h3>Período de tiempo</h3>
                <div class="separacionFormulario">
                    <label for="expUserDesde">Desde:</label>
                    <input type="date" name="expUserDesde" id="expUserDesde">

                    <label for="expUserDesde">Hasta:</label>
                    <input type="date" name="expUserDesde" id="expUserDesde">
                </div>
                <br>
                <div class="separacionFormulario">
                    <h3>Beneficiarios seleccionados</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Fecha nacimiento</th>
                                <th>Cobertura médica</th>
                                <th>¿Asiste al colegio?</th>
                                <th>NEE</th>
                                <th>Enfermedades crónicas</th>
                                <th>¿Cirugias?</th>
                                <th>Seleccionado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Rut">9835803-k</td>
                                <td data-label="Nombre">Juan Manzo</td>
                                <td data-label="Fecha nacimiento">16/10/1663</td>
                                <td data-label="Cobertura médica">Fonasa tramo b</td>
                                <td data-label="¿Asiste al colegio?">No</td>
                                <td data-label="NEE">Cáracter transitorio</td>
                                <td data-label="Enfermedades crónicas">Diabetes tipo 2</td>
                                <td data-label="¿Cirugias?">Sí</td>
                                <td data-label="Acciones"><input type="checkbox" name="actParticipante"
                                        id="actParticipante">
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Rut">9835803-k</td>
                                <td data-label="Nombre">Juan Manzo</td>
                                <td data-label="Fecha nacimiento">16/10/1663</td>
                                <td data-label="Cobertura médica">Fonasa tramo b</td>
                                <td data-label="¿Asiste al colegio?">No</td>
                                <td data-label="NEE">Cáracter transitorio</td>
                                <td data-label="Enfermedades crónicas">Diabetes tipo 2</td>
                                <td data-label="¿Cirugias?">Sí</td>
                                <td data-label="Acciones"><input type="checkbox" name="actParticipante"
                                        id="actParticipante">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="fila2" id="grupoBotones">
                <a class="boton-cuartiario" href="{{ route('registroactividad') }}">Exportar >></a>
            </div>
    </form>
</div>
@endsection