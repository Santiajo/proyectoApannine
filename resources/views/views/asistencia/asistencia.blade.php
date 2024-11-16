@extends('header.base-views')

@section('title', 'Asistencia') 

@section('content')
<div class="content">
    <div class="fila1">
        <h2>Vista de asistencias</h2>
        <h4>Revise las asistencias según actividades, o registre una nueva.</h4>
    </div>
    <hr>
    <div class="fila2">
        <a class="boton-cuartiario" href="{{ route('registroactividad') }}">
            <p><i class='bx bx-bookmark-plus'></i> Agregar actividad</p>
        </a>
        <a class="boton-primario" href="{{ route('registrofecha') }}">
            <p><i class='bx bxs-calendar-plus'></i> Agendar fecha</p>
        </a>
        <!-- Para buscar productos por texto -->
        <form method="POST">
            <input type="text" name="benBuscar" id="benBuscar" placeholder="Buscar...">
            <button type="submit"><i class='bx bx-search'></i></button>
        </form>
    </div>
    <div class="fila1" id="fila1Perso">
        <h3>En progreso</h3>
        <h4>Vea las actividades cuya planificación sigue en progreso.</h4>
        <hr>
    </div>
    <div class="cardSimple">
        <h3>Beneficiarios</h3>
        <h4>Revisar la asistencia de beneficiarios según tiempo o especialista.</h4>
        <div class="fila2" id="btnGroup">
            <a class="boton-cuartiario" href="{{ route('asistenciaBeneficiarios') }}">
                <p>Ver más</p>
            </a>
            <a class="boton-quintiario" href="{{ route('registroactividad') }}">
                <p>Modificar</p>
            </a>
            <a class="boton-terciario" href="{{ route('asistencia') }}"><i class='bx bx-trash'></i>
                Eliminar</a>
        </div>
    </div>
    <div class="fila1">
        <h3>Finalizadas</h3>
        <h4>Vea las actividades que han sido declaradas como finalizadas.</h4>
        <hr>
    </div>
    <div class="cardSimple">
        <h3>Taller yoga</h3>
        <h4>Actividad enfocada a padres con el objetivo de relajarlos.</h4>
        <div class="fila2" id="btnGroup">
            <a class="boton-cuartiario" href="{{ route('asistenciaTallerYoga') }}">
                <p>Ver más</p>
            </a>
            <a class="boton-quintiario" href="{{ route('registroactividad') }}">
                <p>Modificar</p>
            </a>
            <a class="boton-terciario" href="{{ route('asistencia') }}"><i class='bx bx-trash'></i>
                Eliminar</a>
        </div>
    </div>
</div>
@endsection