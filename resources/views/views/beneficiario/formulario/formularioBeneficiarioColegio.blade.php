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
        <div class="separacionFormulario">
            <!-- Colegio -->
            <h3>Datos colegio</h3>
            <fieldset>
                <legend>¿Asiste al colegio?</legend>

                <input type="radio" id="benAsisColSi" name="benAsisCol" value="Sí">
                <label for="benAsisColSi">Sí</label>

                <input type="radio" id="benAsisColNo" name="benAsisCol" value="No">
                <label for="benAsisColNo">No</label>
            </fieldset>
            <section class="layout">
                <div>
                    <label for="colNom">Nombre Establecimiento:</label>
                    <input type="text" name="colNom" id="colNom">
                </div>
                <div>
                    <label for="colTel">Teléfono Establecimiento:</label>
                    <input type="number" name="colTel" id="colTel">
                </div>
                <div>
                    <label for="benCurso">Curso:</label>
                    <input type="text" name="benCurso" id="benCurso">
                </div>
                <div>
                    <label for="colProfJefe">Profesor(a) Jefe:</label>
                    <input type="text" name="colProfJefe" id="colProfJefe">
                </div>
            </section>
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioDerivante') }}">Siguiente</a>
        </div>
    </form>
</div>
@endsection