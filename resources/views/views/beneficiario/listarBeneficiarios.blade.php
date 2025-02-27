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
    <a class="boton-primario" id="benAgregar" href="{{ route('beneficiarios.formularioBeneficiario') }}"><p><i class='bx bxs-user-plus'></i> Agregar beneficiario</p></a>
    <a class="boton-primario" id="benAgregar" href="{{ route('beneficiarios.crudNacionalidad') }}"><p><i class='bx bxs-flag' ></i> Agregar nacionalidad</p></a>
    <a class="boton-primario" id="benAgregar" href="{{ route('beneficiarios.crudComuna') }}"><p>Agregar comuna</p></a>
    <a class="boton-primario" id="benAgregar" href="{{ route('beneficiarios.crudCobMedica') }}"><p><i class='bx bx-plus-medical' ></i> Agregar cobertura medica</p></a>
    <!-- Para buscar productos por texto -->
    <form id='formBuscarBen' class='barraBusqueda' method="GET" action="{{ route('beneficiarios.listarBeneficiarios') }}">
        <input type="text" name="benBuscar" id="benBuscar" placeholder="Buscar..." value="{{ request('benBuscar') }}">
        <button type="submit"><i class='bx bx-search' ></i></button>
        @error('benBuscar')
        <div class="alert alert-danger alert2">El valor ingresado no cumple los requisitos</div>
        @enderror
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
      @foreach ($beneficiarios as $beneficiario)
      <tr>
        <td data-label="Fecha ingreso">{{ $beneficiario->created_at }}</td>
        <td data-label="Rut">{{ $beneficiario->beneficiarioRut }} - {{ $beneficiario->beneficiarioDv }}</td>
        <td data-label="Nombre">{{ $beneficiario->beneficiarioPNombre }} {{ $beneficiario->beneficiarioApPaterno }}</td>
        <td data-label="Nombre cuidador">Juan Manzo</td>
        <td data-label="Teléfono">981267512</td>
        <td data-label="Acciones"><a class="detalles" href="{{ route('beneficiarios.fichaBeneficiario', $beneficiario->id) }}"><i class='bx bxs-file-doc' ></i></a></td>
        <td data-label="Actividad"><a class="detalles" href="actividadBeneficiario"><i class='bx bx-line-chart' ></i></a></td>
        <td data-label="Historial médico"><a class="detalles" href="{{ route('beneficiarios.antMedBeneficiario', $beneficiario->id) }}"><i class='bx bxs-capsule'></i></a></td>
        <td data-label="Horario"><a class="detalles" href="horarioBeneficiario"><i class='bx bxs-calendar'></i></a></td>
        <td data-label="Asistencia"><a class="detalles" href="{{ route('beneficiarioAsistencia') }}"><i class='bx bx-calendar-check' ></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  <br>
  <!-- Selector para cantidad de elementos por página -->
  <form method="GET" action="{{ route('beneficiarios.listarBeneficiarios') }}">
      @csrf
      <label for="items_per_page">Resultados por página:</label>
      <select name="items_per_page" id="items_per_page" onchange="this.form.submit()">
          <option value="10" {{ request('items_per_page') == 10 ? 'selected' : '' }}>10</option>
          <option value="15" {{ request('items_per_page') == 15 ? 'selected' : '' }}>15</option>
          <option value="20" {{ request('items_per_page') == 20 ? 'selected' : '' }}>20</option>
      </select>
      <input type="hidden" name="benBuscar" value="{{ request('benBuscar') }}">
  </form>

  <br>
  <!-- Paginación -->
  <div class="pagination">
      {{ $beneficiarios->links() }}
  </div>

</div>
@endsection