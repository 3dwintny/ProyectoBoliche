@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-6 col-lg-6 col-md-10 col-sm-10">
                  <h1 class="text-white">Solicitudes pendientes</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="pt-2">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
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
          <th scope="col">Fecha de nacimiento</th>
          <th scope="col">Dirección</th>
        </tr>
      </thead>
      <tbody class="table-hover">
        @php
        $contador = 1;
        @endphp
        @if(count($alumnos)<=0)
          <tr>
            <td colspan="10" class="textoCentrado textoNegrita">SIN SOLICITUDES PENDIENTES</td>
          </tr>
        @else
          @foreach ($alumnos as $alumno)
            <tr>
              <td>{{ $contador }}</td>
              <td>{{$alumno->nombre1}} {{$alumno->nombre2}} {{$alumno->nombre3}} {{$alumno->apellido1}} {{$alumno->apellido2}}</td>
              <td>{{$alumno->cui}}</td>
              <td>{{$alumno->celular}}</td>
              <td>{{$alumno->contacto_emergencia}}</td>
              <td>{{$alumno->correo}}</td>
              <td class="table-danger text-danger">{{$alumno->estado}}</td>
              <td>{{\Carbon\Carbon::parse($alumno->fecha)->format("d-m-Y")}}</td>
              <td>{{$alumno->direccion}}</td>
              <td>
                <form action="{{ route('alumnos.destroy',$alumno->id) }}" method="POST">
                  <a class="btn btn-sm btn-primary show-modal" data-toggle="modal" data-target="#myModal" data-id="{{ $alumno->id }}" href="{{ route('alumnos.show', $alumno->id) }}">
                    <i class="fa fa-fw fa-eye"></i>
                  </a>
                  <a class="btn btn-sm btn-success" href="{{route('creacion',encrypt($alumno->id) )}}"><i class="fa fa-fw fa-check"></i></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></button>
                </form>
              </td>
              <td>
                <form action="{{route('reinscripcionPDF')}}" target="_blank">
                  <button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-regular fa-file-pdf"></i></button>
                  <input type="hidden" value="{{encrypt($alumno->id)}}" name="informacionAspirante">
                </form>
              </td>
            </tr>
            @php
            $contador++;
            @endphp
          @endforeach
        @endif
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
      </div>
    </div>
  </div>
</div>
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
        if(response.celular!=null){
          $('#celular').text("Celular:  "+response.celular);
        }
        if(response.telefono_casa!=null){
          $('#telefono_casa').text("Teléfono casa:  "+response.telefono_casa);
        }
        $('#correo').text("Correo electrónico:  "+response.correo);
        $('#origen').text(response.municipio + "/" + response.departamento);
        var image = document.getElementById("imgAlumno");
        image.src = "{{ asset('uploads/alumnos/') }}" + '/' + response.foto;

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
@push('styles')
  <link rel="stylesheet" href="css/general.css">
@endpush
