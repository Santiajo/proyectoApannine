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
            <h3>Datos beneficiario</h3>

            <!-- Estado del beneficiario -->
            <label for="benEstado">Estado del beneficiario:</label>
            <select name="benEstado" id="benEstado">
                <option value="Activo">Activo</option>
                <option value="Desertor">Inactivo</option>
            </select>

            <!-- Run beneficiario -->
            <section class="layoutTelefono">
                <div>
                    <label for="benRut">Rut:</label>
                    <input type="number" name="benRut" id="benRut">
                </div>
                <div>
                    <label for="benDv">Dv:</label>
                    <input type="text" name="benDv" id="benDv">
                </div>
            </section>

            <!-- Nombre beneficiario -->
            <div class="layoutNombre">
                <div>
                    <label for="benPNombre">Primer Nombre:</label>
                    <input type="text" name="benPNombre" id="benPNombre">
                </div>
                <div>
                    <label for="benSNombre">Segundo Nombre:</label>
                    <input type="text" name="benSNombre" id="benSNombre">
                </div>
                <div>
                    <label for="benApPaterno">Apellido Paterno:</label>
                    <input type="text" name="benApPaterno" id="benApPaterno">
                </div>
                <div>
                    <label for="benApMaterno">Apellido Materno:</label>
                    <input type="text" name="benApMaterno" id="benApMaterno">
                </div>
            </div>

            <!-- Fecha de nacimiento -->
            <label for="benFecNac">Fecha de nacimiento:</label>
            <input type="date" name="benFecNac" id="benFecNac">

            <!-- Números de teléfono -->
            <div class="layoutTelefono">
                <div>
                    <label for="benTel1">Teléfono 1:</label>
                    <input type="number" name="benTel1" id="benTel1">
                </div>
                <div>
                    <label for="benTel2">Teléfono 2:</label>
                    <input type="number" name="benTel2" id="benTel2">
                </div>
            </div>

            <!-- Cobertura médica -->
            <label for="benCobMed">Cobertura médica:</label>
            <select name="benCobMed" id="benCobMed">
                <option value="Isapre">Isapre</option>
                <option value="Fonasa Tramo A">Fonasa Tramo A</option>
                <option value="Fonasa Tramo B">Fonasa Tramo B</option>
            </select>

            <!-- Nacionalidad -->
            <label for="benNac">Nacionalidad:</label>
            <select name="benNac" id="benNac">
                <option value="Chileno">Chileno</option>
                <option value="Argentino">Argentino</option>
                <option value="Peruano">Peruano</option>
                <option value="Boliviano">Boliviano</option>
                <option value="Venozolano">Venozolano</option>
            </select>

            <!-- Domicilio -->
            <div class="layoutDomicilio">
                <div>
                    <label for="benDom">Domicilio:</label>
                    <textarea name="benDom" id="benDom" rows="4" cols="50"></textarea>
                </div>
                <div class="layoutTelefono">
                    <div>
                        <label for="benComuna">Comuna:</label>
                        <select name="benComuna" id="benComuna">
                            <option value="Santiago">Santiago</option>
                            <option value="Cerrillos">Cerrillos</option>
                            <option value="Conchali">Conchalí</option>
                            <option value="Estación Central">Estación Central</option>
                        </select>
                    </div>
                    <div>
                        <label for="benTipViv">La familia vive en casa:</label>
                        <select name="benTipViv" id="benTipViv">
                            <option value="Propia">Propia</option>
                            <option value="Propia con deuda">Propia con deuda</option>
                            <option value="Arrendada">Arrendada</option>
                            <option value="Familiares">Familiares</option>
                            <option value="Allegados">Allegados</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="fila2" id="grupoBotones">
            <a class="boton-secundario" href="{{ route('formularioBeneficiarioColegio') }}">Siguiente</a>
        </div>
    </form>
</div>
@endsection