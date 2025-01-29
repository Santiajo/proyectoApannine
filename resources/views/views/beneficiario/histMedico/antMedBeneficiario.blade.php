@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
    <div class="fila1">
        <!-- Botón para volver a la ficha principal -->
        <a class="boton-primario" id="volver1" href="{{ route('beneficiarios.listarBeneficiarios') }}">
            < Volver</a>
    </div>
    <div class="fila1">
        <h2>Historial medico Juan Manzo</h2>
    </div>
    <hr>
    <br>
    <div class="navPiola">
        <div class="navTitulo">
            <h3>Ver:</h3>
        </div>
        <hr>
        <div class="navLinks">
            <div class="navEnlace">
                <a href="#" id="mostrarSeguimiento">Seguimiento</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarAntecedentes">Antecedentes de salud</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarDiagnostico">Diagnóstico</a>
            </div>
            <div class="navEnlace">
                <a href="#" id="mostrarDocumentos">Documentos</a>
            </div>
        </div>
    </div>
    <div class="fila1" id="apartadoSeguimiento">
        <form method="post" class="formularioPiola" id="formTuneado">
            <div class="separacionFormulario">
                <label for="histMedActividad">Seleccione actividad:</label>
                <select name="histMedActividad" id="histMedActividad">
                    <option value="Terapia Ocupacional">Terapia Ocupacional</option>
                    <option value="Kinesiología">Kinesiología</option>
                    <option value="Fonoaudilogía">Fonoaudilogía</option>
                </select>
            </div>
            <a class="boton-cuartiario" href="{{ route('dia') }}">Filtrar</a>
        </form>
        <div class="fila1">
            <h2>Terapia Ocupacional</h2>
        </div>
        <div class="cardSimple">
            <div class="separacionFormulario">
                <h3>18-12-2024</h3>
                <p><span class="letraNegrita">N° de sesión: </span>1</p>
                <p><span class="letraNegrita">Encargado: </span>Simón Hernández</p>
                <p><span class="letraNegrita">Descripción: </span>Se trataron tales temas y se le hicieron x actividades
                    a
                    Juan Manzo.</p>
            </div>
        </div>
    </div>
    <br>
    <div class="cardSimple" id="apartadoAntecedentes">
        <div class="separacionFormulario">
            <h3>Antecedentes de salud</h3>
            <p><span class="letraNegrita">NEE: </span>{{ $antSal->antSalNEE == null ? 'N/A' : $antSal->antSalNEE }}</p>
            <p><span class="letraNegrita">Enfermedades crónicas:
                </span>{{ $antSal->antSalEnfCronica == null ? 'N/A' : $antSal->antSalEnfCronica }}</p>
            <p><span class="letraNegrita">Tratamientos actuales:
                </span>{{ $antSal->antSalTratamiento == null ? 'N/A' : $antSal->antSalTratamiento }}</p>
            <p><span class="letraNegrita">¿Ha tenido cirugías?: </span>{{ $antSal->antSalCirugia == 1 ? 'Sí' : 'No' }}
            </p>
            <p><span class="letraNegrita">¿Cuáles?:
                </span>{{ $antSal->antSalDescCirugia == null ? 'N/A' : $antSal->antSalDescCirugia }}</p>
        </div>
    </div>
    <div class="cardSimple" id="apartadoDiagnostico">
        <div class="separacionFormulario">
            <h3>Diagnóstico</h3>
            <p>{{ $diagnostico->diagnosticoDesc }}</p>
        </div>
    </div>
    <div class="fila1 fila1Perso" id="apartadoDocumentos">
        <table>
            <thead>
                <tr>
                    <th>Documentos</th>
                    <th>Fecha de subida</th>
                    <th>Descargar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Documentos">{{ $antSal->antSalFilePath == null ? 'N/A' : $antSal->antSalFilePath }}
                    </td>
                    <td data-label="Documentos">{{ $antSal->created_at }}</td>
                    <td data-label="Asistencia"><a class="detalles"
                            href="{{ asset('storage/' . $antSal->antSalFilePath) }}" target="_blank"><i
                                class='bx bx-download'></i></a></td>
                    <td data-label="Eliminar">
                        <form action="{{ route('beneficiarios.eliminarArchivo', $antSal->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="boton-terciario" id="benEliminar"><i
                                    class='bx bx-trash'></i></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection