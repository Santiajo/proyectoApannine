@extends('header.base-views')

@section('title', 'Ficha Beneficiario')

@section('content')

<!-- Div para que el sidebar no moleste -->
<div class="content">
  <div class="fila1">
    <h2>Listado de beneficiarios</h2>
  </div>
  <hr>
  <div class="fila2">
    <a class="boton-primario" id="benAgregar" href="{{ route('formularioBeneficiario') }}"><p><i class='bx bxs-user-plus'></i> Agregar beneficiario</p></a>
    <a class="boton-secundario" id="benExportar" href="{{ route('exportarBeneficiario') }}"><i class='bx bx-export' ></i> Exportar</a>
    <!-- Para buscar productos por texto -->
    <form method="POST">
      <input type="text" name="benBuscar" id="benBuscar" placeholder="Buscar...">
      <button type="submit"><i class='bx bx-search' ></i></button>
    </form>
  </div>
  <table>
    <thead>
      <tr>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Fecha nacimiento</th>
        <th>Teléfono</th>
        <th>Cobertura médica</th>
        <th>¿Asiste al colegio?</th>
        <th>NEE</th>
        <th>Enfermedades crónicas</th>
        <th>¿Cirugias?</th>
        <th>Detalles</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-label="Rut">9835803-k</td>
        <td data-label="Nombre">Juan Manzo</td>
        <td data-label="Fecha nacimiento">16/10/1663</td>
        <td data-label="Teléfono">981267512</td>
        <td data-label="Cobertura médica">Fonasa tramo b</td>
        <td data-label="¿Asiste al colegio?">No</td>
        <td data-label="NEE">Cáracter transitorio</td>
        <td data-label="Enfermedades crónicas">Diabetes tipo 2</td>
        <td data-label="¿Cirugias?">Sí</td>
        <td data-label="Acciones"><a class="detalles" href="{{ route('verBeneficiario') }}"><i class='bx bxs-file-doc' ></i></a></td>
      </tr>
      <tr>
        <td data-label="Rut">9835803-k</td>
        <td data-label="Nombre">Juan Manzo</td>
        <td data-label="Fecha nacimiento">16/10/1663</td>
        <td data-label="Teléfono">981267512</td>
        <td data-label="Cobertura médica">Fonasa tramo b</td>
        <td data-label="¿Asiste al colegio?">No</td>
        <td data-label="NEE">Cáracter transitorio</td>
        <td data-label="Enfermedades crónicas">Diabetes tipo 2</td>
        <td data-label="¿Cirugias?">Sí</td>
        <td data-label="Acciones"><a class="detalles" href="{{ route('verBeneficiario') }}"><i class='bx bxs-file-doc' ></i></a></td>
      </tr>
    </tbody>
  </table>
  <div class="fila4">
  <a class="boton-primario" id="atras" href="{{ route('fichabeneficiario') }}"><< Atras</a>
  <a class="boton-primario" id="uno" href="{{ route('fichabeneficiario') }}">1</a>
  <a class="boton-primario" id="dos" href="{{ route('fichabeneficiario') }}">2</a>
  <a class="boton-primario" id="adelante" href="{{ route('fichabeneficiario') }}">Adelante >></a>
  </div>
</div>
@endsection