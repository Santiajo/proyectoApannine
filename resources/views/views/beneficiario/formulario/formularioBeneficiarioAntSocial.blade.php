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

    <div class="navPiola">
        <div class="navTitulo">
            <h3>Ver:</h3>
        </div>
        <hr>
        <div class="navLinks">
            <div class="navEnlace">
                <a href="{{ route('beneficiarios.formularioBeneficiario') }}"
                    class="{{ request()->routeIs('beneficiarios.formularioBeneficiario') ? 'active' : '' }}">Beneficiario</a>
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
            <h3>Antecedentes sociales</h3>

            <!-- ¿Cuenta con ficha familiar? -->
            <fieldset>
                <legend>¿Cuenta con ficha familiar?</legend>

                <input type="radio" id="benFicFamSi" name="benFicFam" value="Sí">
                <label for="benFicFamSi">Sí</label>

                <input type="radio" id="benFicFamNo" name="benFicFam" value="No">
                <label for="benFicFamNo">No</label>

            </fieldset>

            <!-- Puntaje ficha familiar -->
            <label for="benFicFamPtje">Puntaje:</label>
            <input type="number" name="benFicFamPtje" id="benFicFamPtje">

            <!-- Beneficios sociales -->
            <fieldset>
                <legend>Beneficios sociales:</legend>

                <input type="checkbox" id="benBenSoc1" name="benBenSoc1" value="Subsidio familiar">
                <label for="vehicle1"> Subsidio familiar</label><br>
                <input type="checkbox" id="benBenSoc2" name="benBenSoc2" value="Pensiones">
                <label for="vehicle2"> Pensiones</label><br>
                <input type="checkbox" id="benBenSoc3" name="benBenSoc3" value="Becas">
                <label for="vehicle3"> Becas</label><br>
                <input type="checkbox" id="benBenSoc4" name="benBenSoc4" value="Chile solidario">
                <label for="vehicle3"> Chile solidario</label><br>
                <input type="checkbox" id="benBenSoc5" name="benBenSoc5" value="Programa puente">
                <label for="vehicle3"> Programa puente</label><br>
                <input type="checkbox" id="benBenSoc6" name="benBenSoc6" value="Subsidio ético familiar">
                <label for="vehicle3"> Subsidio ético familiar</label><br>
            </fieldset>

            <!-- Anotar beneficio social extra -->
            <label for="benBenSocOtro">Otro:</label>
            <input type="text" name="benBenSocOtro" id="benBenSocOtro">

            <!-- ¿Cuenta con credencial de discapacidad? -->
            <fieldset>
                <legend>¿Cuenta con credencial de discapacidad?</legend>

                <input type="radio" id="benCredDiscSi" name="benCredDisc" value="Sí">
                <label for="benCredDiscSi">Sí</label>

                <input type="radio" id="benCredDiscNo" name="benCredDisc" value="No">
                <label for="benCredDiscNo">No</label>
            </fieldset>
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioDiagnostico') }}">Siguiente</a>
        </div>
    </form>
</div>
@endsection