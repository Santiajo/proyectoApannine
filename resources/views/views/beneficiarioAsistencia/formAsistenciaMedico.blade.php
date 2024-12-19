@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('asistenciasEspecialistas') }}">
            < Volver</a>
    </div>
    <br>
    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">
        <!-- Subtítulo -->
        <div class="separacionFormulario">
            <h3>Registro de Asistencia Juan Manzo - Kinesiología - 20-12-2024 </h3>

            <!-- Asistencia del beneficiario -->
            <label for="regAsistBen">Asistencia:</label>
            <select name="regAsistBen" id="regAsistBen">
                <option value="Presente">Presente</option>
                <option value="Justificado">Justificado</option>
                <option value="Justificado">Ausente</option>
            </select>

            <!-- Justificación -->
            <label for="regAsisJustificion">Justificación:</label>
            <textarea name="regAsisJustificion" id="regAsisJustificion" col="50" rows="4"></textarea>

            <!-- Seguimiento -->
            <label for="regAsisSeguimiento">Seguimiento:</label>
            <textarea name="regAsisSeguimiento" id="regAsisSeguimiento" col="50" rows="4"></textarea>

        <div class="fila2" id="grupoBotones">
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioColegio') }}">Cancelar</a>
            <a class="boton-primario" href="{{ route('formularioBeneficiarioColegio') }}">Registrar</a>
        </div>
    </form>
</div>
@endsection