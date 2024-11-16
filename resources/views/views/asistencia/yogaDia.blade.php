@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1" id="fila1Perso3">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('asistencia') }}">
            < Volver</a>
    </div>
    <div class="fila1">
        <h2>Asistencia beneficiarios</h2>
        <h4>Vea la asistencia de los beneficiarios en las diferentes sesiones programadas.</h4>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-primario" id="benAgregar" href="{{ route('registrofecha') }}">
            <p><i class='bx bxs-calendar-plus'></i> Agendar fecha</p>
        </a>
        <a class="boton-secundario" id="benExportar" href="{{ route('fichabeneficiario') }}"><i
                class='bx bx-export'></i> Exportar</a>
    </div>
    <div class="fila1" id="fila1Perso2">
        <div class="navPiola">
            <div class="navTitulo">
                <h3>Ver por:</h3>
            </div>
            <hr>
            <div class="navLinks">
                <div class="navEnlace">
                    <a href="{{ route('asistenciaTallerYoga') }}"
                        class="{{ request()->routeIs('asistenciaTallerYoga') ? 'active' : '' }}">Todos</a>
                </div>
                <div class="navEnlace">
                    <a href="{{ route('yogaDia') }}" class="{{ request()->routeIs('yogaDia') ? 'active' : '' }}">Día
                        de la semana</a>
                </div>
            </div>
        </div>
    </div>
    <div class="fila1" id="fila1Perso">
        <form method="post" class="formularioPiola" id="formTuneado">
            <div class="separacionFormulario">
                <label for="benEstado">Seleccione día:</label>
                <select name="benEstado" id="benEstado">
                    <option value="Lunes">Lunes</option>
                    <option value="Martes">Martes</option>
                    <option value="Miércoles">Miércoles</option>
                    <option value="Jueves">Jueves</option>
                    <option value="Viernes">Viernes</option>
                    <option value="Sábado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                </select>
            </div>
            <a class="boton-cuartiario" href="{{ route('dia') }}">Filtrar</a>
        </form>
    </div>
    <div class="fila1" id="fila1Perso">
        <h3>Martes</h3>
        <hr>
    </div>
    <table>
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th class="thRotado">03/12/2024</th>
                <th class="thRotado">04/12/2024</th>
                <th class="thRotado">05/12/2024</th>
                <th class="thRotado">06/12/2024</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Rut">18487992-1</td>
                <td data-label="Nombre">Juan Esteban Manzo</td>
                <td data-label="Teléfono">9 7186 454</td>
                <td data-label="Correo">juanmanzo93@gmail.com</td>
                <td data-label="03/12/2024">P</td>
                <td data-label="04/12/2024">A</td>
                <td data-label="05/12/2024">P</td>
                <td data-label="06/12/2024">J</td>
            </tr>
        </tbody>
    </table>
    <div class="fila4">
        <a class="boton-primario" id="atras" href="{{ route('fichabeneficiario') }}">
            << Atras</a>
                <a class="boton-primario" id="uno" href="{{ route('fichabeneficiario') }}">1</a>
                <a class="boton-primario" id="dos" href="{{ route('fichabeneficiario') }}">2</a>
                <a class="boton-primario" id="adelante" href="{{ route('fichabeneficiario') }}">Adelante >></a>
    </div>
</div>
@endsection