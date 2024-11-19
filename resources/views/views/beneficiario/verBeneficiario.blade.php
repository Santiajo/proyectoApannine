@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
  <div class="fila1">
    <!-- Botón para volver a la ficha principal -->
    <a class="boton-primario" id="volver1" href="{{ route('fichabeneficiario') }}">
      < Volver</a>
  </div>
  <div class="fila1">
    <h2>Datos de beneficiario</h2>
  </div>
  <hr>
  <div class="fila2">
    <a class="boton-quintiario" id="benAgregar" href="{{ route('verBeneficiario') }}">
      <p>Modificar</p>
    </a>
    <a class="boton-terciario" id="benEliminar" href="{{ route('verBeneficiario') }}"><i class='bx bx-trash'></i>
      Eliminar</a>
    <a class="boton-secundario" id="benExportar" href="{{ route('fichabeneficiario') }}"><i class='bx bx-export'></i>
      Exportar</a>
  </div>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Juan Enrique Manzo Gárate</h3>
      <p><span class="letraNegrita">Estado: </span> ACTIVO</p>
      <p><span class="letraNegrita">Rut: </span> 9835803-k</p>
      <p><span class="letraNegrita">Fecha de nacimiento: </span> 16/10/1663</p>
      <p><span class="letraNegrita">Teléfono 1: </span> 9 8126 7512</p>
      <p><span class="letraNegrita">Teléfono 2: </span> N/A</p>
      <p><span class="letraNegrita">Nacionalidad: </span> Chileno</p>
      <p><span class="letraNegrita">Previsión: </span> Fonasa tramo b</p>
      <p><span class="letraNegrita">Comuna: </span> Melipilla</p>
      <p><span class="letraNegrita">Domicilio: </span> Los prados 117</p>
      <p><span class="letraNegrita">Vive en casa: </span> Propia</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Datos del colegio</h3>
      <p><span class="letraNegrita">¿Asiste al colegio? </span> Sí</p>
      <p><span class="letraNegrita">Nombre: </span>Colegio Particular melipilla</p>
      <p><span class="letraNegrita">Teléfono: </span>9 7490 4931</p>
      <p><span class="letraNegrita">Curso: </span> 8° básico "C"</p>
      <p><span class="letraNegrita">Profesor(a) jefe: </span> Fabiola Jiménez</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Datos del derivante</h3>
      <p><span class="letraNegrita">Nombre: </span>Simon Hernández - TO</p>
      <p><span class="letraNegrita">Observaciones: </span>No sé</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Juan Esteban Manzo Jorquera</h3>
      <p><span class="letraNegrita">Tipo de familiar: Padre</span> </p>
      <p><span class="letraNegrita">Rut: </span> 18487992-1</p>
      <p><span class="letraNegrita">Teléfono: </span>9 7186 4540</p>
      <p><span class="letraNegrita">Correo eletrónico: </span>juanmanzo93@gmail.com</p>
      <p><span class="letraNegrita">Situación laboral: </span> Trabajo estable</p>
      <p><span class="letraNegrita">¿Es cuidador(a)?: </span> Sí</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Rosa Cecilia Jorquera Díaz</h3>
      <p><span class="letraNegrita">Nombre: </span> </p>
      <p><span class="letraNegrita">Rut: </span> 18487992-1</p>
      <p><span class="letraNegrita">Teléfono: </span>9 7156 4000</p>
      <p><span class="letraNegrita">Correo eletrónico: </span>N/A</p>
      <p><span class="letraNegrita">Situación laboral: </span> Sin trabajo</p>
      <p><span class="letraNegrita">¿Es cuidador(a)?: </span> Sí</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Hermanos</h3>
      <ul class="lista">
        <li class="listaElemento">Juan Pablo Manzo Jorquera</li>
        <li class="listaElemento">Carlos Santiago Manzo Jorquera</li>
      </ul>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Antecedentes de salud</h3>
      <p><span class="letraNegrita">NEE: </span> Cáracter transitorio</p>
      <p><span class="letraNegrita">Enfermedades crónicas: </span> Diábetes tipo 2</p>
      <p><span class="letraNegrita">Tratamientos actuales: </span><br>Consumo de insulina para regular la glicemia.</p>
      <p><span class="letraNegrita">¿Ha tenido cirugías?: </span> No</p>
    </div>
  </div>
  <br>
  <div class="cardSimple">
    <div class="separacionFormulario">
      <h3>Antecedentes sociales</h3>
      <p><span class="letraNegrita">¿Cuenta con ficha familiar?: </span> Sí</p>
      <p><span class="letraNegrita">Puntaje: </span> 5to quintil</p>
      <p><span class="letraNegrita">Beneficios: </span><br>
      <ul>
        <li class="listaElemento">Subsidio familiar</li>
        <li class="listaElemento">Becas</li>
      </ul>
      </p>
      <p><span class="letraNegrita">¿Cuenta con credencial de discapacidad?: </span> No</p>
    </div>
  </div>
</div>
@endsection