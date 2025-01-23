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
            <p><i class='bx bxs-calendar-plus'></i> Programar fecha</p>
        </a>
    </div>
    <div class="fila1" id="fila1Perso2">
        <div class="navPiola">
            <div class="navTitulo">
                <h3>Ver por:</h3>
            </div>
            <hr>
            <div class="navLinks">
                <div class="navEnlace">
                    <a href="{{ route('asistenciaBeneficiarios') }}"
                        class="{{ request()->routeIs('asistenciaBeneficiarios') ? 'active' : '' }}">Todos</a>
                </div>
                <div class="navEnlace">
                    <a href="{{ route('buscarBeneficiario') }}"
                        class="{{ request()->routeIs('buscarBeneficiario') ? 'active' : '' }}">Beneficiario</a>
                </div>
                <div class="navEnlace">
                    <a href="{{ route('especialistas') }}"
                        class="{{ request()->routeIs('especialistas') ? 'active' : '' }}">Especialistas</a>
                </div>
                <div class="navEnlace">
                    <a href="{{ route('dia') }}" class="{{ request()->routeIs('dia') ? 'active' : '' }}">Día
                        de la semana</a>
                </div>
            </div>
        </div>
    </div>
    <div class="fila1" id="fila1Perso">
        <div class="cardSimple">
            <form method="post" class="formularioPiola2">
                <input type="text" name="benBuscar" id="benBuscar" placeholder="BUSCAR BENEFICIARIO...">
                <button><i class='bx bx-search'></i></button>
            </form>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo apoderado</th>
                <th>%</th>
                <th class="thRotado">03/12/2024</th>
                <th class="thRotado">04/12/2024</th>
                <th class="thRotado">05/12/2024</th>
                <th class="thRotado">06/12/2024</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Rut">9835803-k</td>
                <td data-label="Nombre">Juan Manzo</td>
                <td data-label="Teléfono">981267512</td>
                <td data-label="Correo apoderado">juanmanzo93@gmail.com</td>
                <td data-label="%">50%</td>
                <td data-label="Correo apoderado">P</td>
                <td data-label="Correo apoderado">A</td>
                <td data-label="Correo apoderado">P</td>
                <td data-label="Correo apoderado">J</td>
            </tr>
        </tbody>
    </table>
    <div class="fila4">
        <a class="boton-primario" id="atras" href="{{ route('beneficiarios.listarBeneficiarios') }}">
            << Atras</a>
                <a class="boton-primario" id="uno" href="{{ route('beneficiarios.listarBeneficiarios') }}">1</a>
                <a class="boton-primario" id="dos" href="{{ route('beneficiarios.listarBeneficiarios') }}">2</a>
                <a class="boton-primario" id="adelante" href="{{ route('beneficiarios.listarBeneficiarios') }}">Adelante >></a>
    </div>
</div>
@endsection