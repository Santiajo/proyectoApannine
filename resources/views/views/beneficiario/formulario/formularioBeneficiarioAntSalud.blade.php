@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <br>

    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver2" href="{{ route('fichabeneficiario') }}">
            < Volver</a>
    </div>

    <div class="navPiola">
        <div class="navTitulo">
            <h3>Ver:</h3>
        </div>
        <hr>
        <div class="navLinks">
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiario') }}"
                    class="{{ request()->routeIs('formularioBeneficiario') ? 'active' : '' }}">Beneficiario</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioColegio') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioColegio') ? 'active' : '' }}">Colegio</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioDerivante') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioDerivante') ? 'active' : '' }}">Derivante</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioFamilia') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioFamilia') ? 'active' : '' }}">Familia</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioAntSalud') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioAntSalud') ? 'active' : '' }}">Antecedentes
                    salud</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioAntSocial') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioAntSocial') ? 'active' : '' }}">Antecedentes
                    sociales</a>
            </div>
            <div class="navEnlace">
                <a href="{{ route('formularioBeneficiarioDiagnostico') }}"
                    class="{{ request()->routeIs('formularioBeneficiarioDiagnostico') ? 'active' : '' }}">Diagnóstico</a>
            </div>
        </div>
    </div>
    <br>
    <!-- Etiqueta formulario -->
    <form class="formularioPiola" method="POST">
        <!-- Subtítulo -->
        <div class="separacionFormulario">
            <h3>Antecedentes salud</h3>

            <!-- Necesidades educativas especiales -->
            <label for="benNee">NEE:</label>
            <textarea name="benNee" id="benNee" rows="4" cols="50"></textarea>

            <!-- Enfermadades crónicas -->
            <label for="benEnfCro">Enfermedades crónicas:</label>
            <textarea name="benEnfCro" id="benEnfCro" rows="4" cols="50"></textarea>

            <!-- Tratamientos -->
            <label for="benTratamientos">Tratamientos actuales:</label>
            <textarea name="benTratamientos" id="benTratamientos" rows="4" cols="50"></textarea>

            <!-- ¿Tuvo cirugías? -->
            <fieldset>
                <legend>¿Cirugías?</legend>

                <input type="radio" id="benCirugiaSi" name="benCirugia" value="Sí">
                <label for="benCirugiaSi">Sí</label>

                <input type="radio" id="benCirugiaNo" name="benCirugia" value="No">
                <label for="benCirugiaNo">No</label>

            </fieldset>

            <!-- Descripción cirugías -->
            <label for="benCirugiaNom">¿Cuales?</label>
            <textarea name="benCirugiaNom" id="benCirugiaNom" rows="4" cols="50"></textarea>

            <!-- Documentos médicos -->
            <label for="benEvidMed">Documentos:</label>
            <input type="file" name="benEvidMed" id="benEvidMed">
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioAntSocial') }}">Siguiente</a>
        </div>
    </form>
</div>
@endsection