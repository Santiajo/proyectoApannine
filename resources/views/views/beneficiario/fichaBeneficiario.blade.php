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
    <h2>Datos de beneficiario</h2>
  </div>
  <hr>
  <div class="fila2">

  </div>
  <form class="formularioPiola" id="formTuneado2"
    action="{{ route('beneficiarios.eliminarBeneficiario', $beneficiario->id) }}" method="POST"
    onsubmit="return confirmDelete(event)">
    @csrf
    @method('DELETE')
    <a class="boton-quintiario" id="benAgregar" href="{{ route('beneficiarios.formBenRelleno', $beneficiario->id) }}">
      <p>Modificar</p>
    </a>
    <button type="submit" class="boton-terciario"><i class='bx bx-trash'></i> Eliminar</button>
    <a class="boton-secundario" id="benExportar" href="{{ route('beneficiarios.listarBeneficiarios') }}"><i
        class='bx bx-export'></i>
      Exportar</a>
  </form>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>{{ $beneficiario->beneficiarioPNombre }} {{ $beneficiario->beneficiarioSNombre }}
        {{ $beneficiario->beneficiarioApPaterno }} {{ $beneficiario->beneficiarioApMaterno }}
      </h3>
      <p><span class="letraNegrita">Estado: </span> {{ $beneficiario->beneficiarioEstado }}</p>
      <p><span class="letraNegrita">Rut: </span> {{ $beneficiario->beneficiarioRut }} -
        {{ $beneficiario->beneficiarioDv }}
      </p>
      <p><span class="letraNegrita">Fecha de nacimiento: </span> {{ $beneficiario->beneficiarioFecNac }}</p>
      <p><span class="letraNegrita">Teléfono 1: </span> {{ $beneficiario->beneficiarioTelefono }}</p>
      <p><span class="letraNegrita">Nacionalidad: </span> {{ $nacionalidad->nombreNacionalidad }}</p>
      <p><span class="letraNegrita">Previsión médica: </span> {{ $cobMedica->nombreCobMed }}</p>
      <p><span class="letraNegrita">Comuna: </span> {{ $comuna->nombreComuna }}</p>
      <p><span class="letraNegrita">Domicilio: </span> {{ $beneficiario->beneficiarioDomicilio }}</p>
      <p><span class="letraNegrita">Vive en casa: </span> {{ $beneficiario->beneficiarioTipDom }}</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Datos del colegio</h3>
      <p><span class="letraNegrita">¿Asiste al colegio? </span> {{ $colegio->colegioAsiste == 1 ? 'Sí' : 'No' }}</p>
      <p><span class="letraNegrita">Nombre: </span>
        {{ $colegio->colegioNombre == null ? 'N/A' : $colegio->colegioNombre }}</p>
      <p><span class="letraNegrita">Teléfono: </span>
        {{ $colegio->colegioTelefono == null ? 'N/A' : $colegio->colegioTelefono }}</p>
      <p><span class="letraNegrita">Curso: </span> {{ $colegio->colegioCurso == null ? 'N/A' : $colegio->colegioCurso }}
      </p>
      <p><span class="letraNegrita">Profesor(a) jefe: </span>
        {{ $colegio->colegioProfJefe == null ? 'N/A' : $colegio->colegioProfJefe }}</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Datos del derivante</h3>
      <p><span class="letraNegrita">Nombre:
        </span>{{ $derivante->derivanteNombre == null ? 'N/A' : $derivante->derivanteNombre }}</p>
      <p><span class="letraNegrita">Observaciones:
        </span>{{ $derivante->derivanteObservaciones == null ? 'N/A' : $derivante->derivanteObservaciones }}</p>
    </div>
  </div>
  <br>
  @if($familiares->isEmpty())
    <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Familiares</h3>
      <p><span class="letraNegrita">No hay familiares asociados!</span></p>
    </div>
    </div>
  @else
    @foreach($familiares as $familiar)
      <div class="cardSimple">
      <div class="separacionFormulario">
        <h3>{{ $familiar->familiarPNombre }} {{ $familiar->familiarSNombre }} {{ $familiar->familiarApPaterno }}</h3>
        <p><span class="letraNegrita">Parentesco: </span>{{ $familiar->familiarParentesco }}</p>
        <p><span class="letraNegrita">Rut: </span>{{ $familiar->familiarRut }}-{{ $familiar->familiarDv }}</p>
        <p><span class="letraNegrita">Teléfono: </span>{{ $familiar->familiarTelefono }}</p>
        <p><span class="letraNegrita">Correo eletrónico: </span>{{ $familiar->familiarCorreo }}</p>
        <p><span class="letraNegrita">Situación laboral: </span>{{ $familiar->familiarSitLaboral }}</p>
        <p><span class="letraNegrita">¿Es cuidador(a)?: </span>{{ $familiar->familiarCuidador == 1 ? 'Sí' : 'No' }}</p>
      </div>
      </div>
      <br>
    @endforeach
  @endif
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Antecedentes de salud</h3>
      <p><span class="letraNegrita">NEE: </span>{{ $antSal->antSalNEE == null ? 'N/A' : $antSal->antSalNEE }}</p>
      <p><span class="letraNegrita">Enfermedades crónicas:
        </span>{{ $antSal->antSalEnfCronica == null ? 'N/A' : $antSal->antSalEnfCronica }}</p>
      <p><span class="letraNegrita">Tratamientos actuales:
        </span>{{ $antSal->antSalTratamiento == null ? 'N/A' : $antSal->antSalTratamiento }}</p>
      <p><span class="letraNegrita">¿Ha tenido cirugías?: </span>{{ $antSal->antSalCirugia == 1 ? 'Sí' : 'No' }}</p>
      <p><span class="letraNegrita">¿Cuales?:
        </span>{{ $antSal->antSalDescCirugia == null ? 'N/A' : $antSal->antSalDescCirugia }}</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Antecedentes sociales</h3>
      <p><span class="letraNegrita">¿Cuenta con ficha familiar?:
        </span>{{ $antSoc->antSocFichaFamiliar == 1 ? 'Sí' : 'No' }}</p>
      <p><span class="letraNegrita">Puntaje: </span>{{ $antSoc->antSocPtj == null ? 'N/A' : $antSoc->antSocPtj }}</p>
      <p><span class="letraNegrita">Beneficios:
        </span>{{ $antSoc->antSocBeneficio == null ? 'N/A' : $antSoc->antSocBeneficio }}</p>
      <p><span class="letraNegrita">¿Cuenta con credencial de discapacidad?:
        </span>{{ $antSoc->antSocCredDiscapacidad == 1 ? 'Sí' : 'No' }}</p>
    </div>
  </div>
</div>
@endsection