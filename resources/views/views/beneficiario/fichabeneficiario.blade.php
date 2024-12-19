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
        <th>Fecha ingreso</th>
        <th>Rut</th>
        <th>Nombre</th>
        <th>Nombre cuidador</th>
        <th>Teléfono cuidador</th>
        <th>Detalles</th>
        <th>Actividad</th>
        <th>Historial médico</th>
        <th>Horario</th>
        <th>Asistencias</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-label="Fecha ingreso">03-12-2023</td>
        <td data-label="Rut">9835803-k</td>
        <td data-label="Nombre">Juan Manzo</td>
        <td data-label="Nombre cuidador">Juan Manzo</td>
        <td data-label="Teléfono">981267512</td>
        <td data-label="Acciones"><a class="detalles" href="{{ route('verBeneficiario') }}"><i class='bx bxs-file-doc' ></i></a></td>
        <td data-label="Actividad"><a class="detalles" href="actividadBeneficiario"><i class='bx bx-line-chart' ></i></a></td>
        <td data-label="Historial médico"><a class="detalles" href="histMedBeneficiario"><i class='bx bxs-capsule'></i></a></td>
        <td data-label="Horario"><a class="detalles" href="horarioBeneficiario"><i class='bx bxs-calendar'></i></a></td>
        <td data-label="Asistencia"><a class="detalles" href="{{ route('beneficiarioAsistencia') }}"><i class='bx bx-calendar-check' ></i></a></td>
      </tr>
      <tr>
        <td data-label="Fecha ingreso">03-12-2023</td>
        <td data-label="Rut">9835803-k</td>
        <td data-label="Nombre">Juan Manzo</td>
        <td data-label="Nombre cuidador">Juan Manzo</td>
        <td data-label="Teléfono">981267512</td>
        <td data-label="Acciones"><a class="detalles" href="{{ route('verBeneficiario') }}"><i class='bx bxs-file-doc' ></i></a></td>
        <td data-label="Actividad"><a class="detalles" href="actividadBeneficiario"><i class='bx bx-line-chart' ></i></a></td>
        <td data-label="Historial médico"><a class="detalles" href="histMedBeneficiario"><i class='bx bxs-capsule'></i></a></td>
        <td data-label="Horario"><a class="detalles" href="#"><i class='bx bxs-calendar'></i></a></td>
        <td data-label="Asistencia"><a class="detalles" href="{{ route('beneficiarioAsistencia') }}"><i class='bx bx-calendar-check' ></i></a></td>
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