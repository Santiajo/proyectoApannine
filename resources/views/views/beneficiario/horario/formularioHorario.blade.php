@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('horarioBeneficiario') }}">
            < Volver</a>
    </div>
    <br>
    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">
        <!-- Subtítulo -->
        <div class="separacionFormulario">
            <h3>Agregar horario a Juan Manzo</h3>

            <!-- Tipo de actividad -->
            <label for="fecTipAct">Actividad:</label>
            <select name="fecTipAct" id="fecTipAct">
                <option value="Taller de yoga">Terapia Ocupacional - TO</option>
                <option value="Beneficiarios">Kinesiología - KINE</option>
                <option value="Beneficiarios">Fonoaudiología - FONO</option>
            </select>

            <!-- Especialista encargado -->
            <label for="horarioEspecialista">Especialista encargado:</label>
            <select name="horarioEspecialista" id="horarioEspecialista">
                <option value="Simón Hernández TO">Simón Hernández TO</option>
                <option value="Joaquín Muñoz KINE">Joaquín Muñoz KINE</option>
            </select>

            <!-- Fecha de inicio -->
            <label for="horarioFecInicio">Fecha de inicio:</label>
            <input type="date" name="horarioFecInicio" id="horarioFecInicio">

            <!-- Día de la semana -->
            <label for="horariofecDiaSemana">Día de la semana:</label>
            <select name="horariofecDiaSemana" id="horariofecDiaSemana">
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>

            <!-- Hora -->
            <section class="layoutTelefono">
                <div>
                    <label for="horarioHora">Hora:</label>
                    <input type="number" name="horarioHora" id="horarioHora">
                </div>
                <div>
                    <label for="horarioMinutos">Minutos:</label>
                    <input type="text" name="horarioMinutos" id="horarioMinutos">
                </div>
            </section>
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-primario" href="{{ route('formularioHorario') }}">Añadir</a>
            <a class="boton-secundario" href="{{ route('formularioHorario') }}">Cancelar</a>
        </div>
    </form>
</div>
@endsection