@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('fichausuarios') }}">
            < Volver</a>
    </div>

    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">

        <!-- Título formulario -->
        <h1>Exportar Usuarios</h1>

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
                    <h3>Participantes seleccionados</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo electrónico</th>
                                <th>Seleccionado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td data-label="Rut">20880574-6</td>
                                <td data-label="Nombre">Simón Hernández</td>
                                <td data-label="Teléfono">9 6687 6669</td>
                                <td data-label="Correo electrónico">simon.hernandez.2001@gmail.com</td>
                                <td data-label="Acciones"><input type="checkbox" name="actParticipante"
                                        id="actParticipante">
                                </td>
                            </tr>
                            <tr>
                                <td data-label="Rut">18487992-1</td>
                                <td data-label="Nombre">Joaquín Muñoz</td>
                                <td data-label="Teléfono">9 9412 6722</td>
                                <td data-label="Correo electrónico">joaquin.muñoz.2001@gmail.com</td>
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