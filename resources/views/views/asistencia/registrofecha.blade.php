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
        <h1>Registrar fecha actividad</h1>


        <!-- Subtítulo -->
        <div class="separacionFormulario">
            <!-- Día de la semana -->
            <label for="fecDiaSemana">Día de la semana:</label>
            <select name="fecDiaSemana" id="fecDiaSemana">
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
            <!-- Tiempo actividad -->
            <div class="layoutTiempo">
                <div>
                    <!-- Dia actividad -->
                    <label for="fecDia">Día:</label>
                    <select name="fecDia" id="fecDia">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                </div>
                <div>
                    <!-- Mes actividad -->
                    <label for="fecMes">Día:</label>
                    <select name="fecMes" id="fecMes">
                        <option value="Enero"> Enero</option>
                        <option value="Febrero"> Febrero</option>
                        <option value="Marzo"> Marzo</option>
                        <option value="Abril"> Abril</option>
                        <option value="Mayo"> Mayo</option>
                        <option value="Junio"> Junio</option>
                        <option value="Julio"> Julio</option>
                        <option value="Agosto"> Agosto</option>
                        <option value="Septiembre">Septiembre</option>
                        <option value="Octubre">Octubre</option>
                        <option value="Noviembre">Noviembre</option>
                        <option value="Diciembre">Diciembre</option>
                    </select>
                </div>
                <div>
                    <!-- Año actividad -->
                    <label for="fecAnio">Año:</label>
                    <input type="number" name="fecAnio" id="fecAnio">
                </div>
            </div>

            <!-- Especialista encargado -->
            <label for="fecEspecialista">Especialista encargado:</label>
            <input type="text" name="fecEspecialista" id="fecEspecialista">

            <!-- Objetivos de la sesion -->
            <label for="fecObjetivo">Objetivos de la sesión:</label>
            <textarea name="actDescripcion" id="fecObjetivo" rows="4" cols="50"></textarea>
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-primario" href="{{ route('registrofecha') }}">Añadir</a>
            <a class="boton-secundario" href="{{ route('registrofecha') }}">Cancelar</a>
        </div>

    </form>
</div>
@endsection