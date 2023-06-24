@extends('layouts.app')

@section('content')
@include('layouts.headers.cards', ['texto' => 'Solicitudes pendientes'])
<div class="pb-5 pt-5 pt-md-2">
  <div class="col-xl-12 col-lg-12">
    <table class="table table-responsive table-hover" style="border-radius: 5px;">
      <thead class="table-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nombre completo</th>
          <th scope="col">CUI</th>
          <th scope="col">Celular</th>
          <th scope="col">Contacto de emergencia</th>
          <th scope="col">Correo</th>
          <th scope="col">Estado</th>
          <th scope="col">Fecha</th>
          <th scope="col">Dirección</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
        $contador = 1;
        @endphp
        @foreach ($alumnos as $alumno)
        <tr>
          <td>{{ $contador }}</td>
          <td>{{$alumno->nombre1}} {{$alumno->nombre2}} {{$alumno->nombre3}} {{$alumno->apellido1}} {{$alumno->apellido2}}</td>
          <td>{{$alumno->cui}}</td>
          <td>{{$alumno->celular}}</td>
          <td>{{$alumno->contacto_emergencia}}</td>
          <td>{{$alumno->correo}}</td>
          <td class="table-danger text-danger">{{$alumno->estado}}</td>
          <td>{{$alumno->fecha}}</td>
          <td>{{$alumno->direccion}}</td>
          <td>
            <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
              <a class="btn btn-sm btn-primary show-modal" data-toggle="modal" data-target="#myModal" data-id="{{ $alumno->id }}" href="{{ route('alumnos.show', $alumno->id) }}">
                <i class="fa fa-fw fa-eye"></i>Ver
              </a>

              <a class="btn btn-sm btn-success" href="{{route('creacion',$alumno->id)}}"><i class="fa fa-fw fa-check"></i>Aceptar</a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i>Rechazar</button>
            </form>
          </td>
        </tr>
        @php
        $contador++;
        @endphp
        @endforeach
      </tbody>
    </table>
    {{$alumnos->links('vendor.pagination.custom')}}
  </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Solicitud de inscripción</h4>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-danger">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
    <div class="card card-profile card-plain">
      <div class="row">
        <div class="col-lg-5">
            <div class="container">
              <div class="blur-shadow-image mb-3">
                <img class="w-100 rounded-3 shadow-lg" id="imgAlumno" alt="No se econtro ninguna fotografia">
              </div>
            </div>
        </div>
        <div class="col-lg-7 ps-0 my-auto">
          <div class="card-body text-left">
            <div class="p-md-0 pt-3">
              <h5 class="font-weight-bolder mb-0" id="nombreAlumno"></h5>
              <p class="text-uppercase text-sm font-weight-bold mb-2" id="cui"></p>
            </div>
            <p class="mb-0" id="celular"></p>
            <p class="mb-0" id="telefono_casa"></p>
            <p class="mb-0" id="correo"></p>
            <p class="mb-0" id="fecha_nacimiento"></p>
            <p class="mb-0" id="origen"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <a class="btn btn-default btn-success" id="aceptar" href="{{route('creacion',$alumno->id)}}">Aceptar</a>
      </div>
    </div>
  </div>
</div>





<!-- Resto de tu código -->

@endsection

@push('js')
<script>
  function obtenerAlumno(id) {
    $.ajax({
      url: '/alumnos/' + id,
      type: 'GET',
      dataType: 'json',
      success: function(response) {

        $('#nombreAlumno').text(response.nombre);
        $('#apellidoAlumno').text(response.apellido);
        $('#cui').text(response.cui);
        $('#celular').text("Celular:  "+response.celular);
        $('#telefono_casa').text("Teléfono casa:  "+response.telefono_casa);
        $('#correo').text("Correo electrónico:  "+response.correo);
        $('#origen').text(response.municipio + "/" + response.departamento);
        var image = document.getElementById("imgAlumno");
        image.src = "{{ asset('uploads/alumnos/') }}" + '/' + response.foto;
        var crear = document.getElementById("aceptar")
        crear.href = "{{ route('creacion', '') }}/" + id;
    
        $('#myModal').modal('show');
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  }

  $(document).ready(function() {
    $('.show-modal').on('click', function(e) {
      e.preventDefault();
      var alumnoId = $(this).data('id');
      obtenerAlumno(alumnoId);
    });

  });
</script>

@endpush