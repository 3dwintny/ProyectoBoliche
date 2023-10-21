@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
  <div class="container-fluid">
      <div class="header-body">
          <div class="row">
              <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                  <h1 class="text-white">Reporte de Asistencia de {{$mostrarMes}} de {{$obtenerAnio}}</h1>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="container pt-2">
  <div class="justify-content-center">
      <div class="card rounded">
        <div class="card-body">
          <h3>Búsqueda</h3>
          <form action="{{ route('buscar') }}" role="form" method="GET">
            @csrf
            <div class="row justify-content-center">
              <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 mb-2">
                <div class="form-floating">
                  <select class="form-select" name="mes" id="mes">
                    <option selected disabled>Mes</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                  <label for="mes">Mes</label>
                </div>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 mb-2">
                <div class="form-floating">
                  <input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Año" id="anio" type="number" name="anio" value="" required>
                  <label for="anio">Año</label>
                </div>
              </div>
              <div class="col-xl-1 col-lg-2 col-md-2 col-sm-2 mb-2 text-center">
                <button type="submit" class="btn btn-primary">Buscar</button>
              </div>
              <div class="col-xl-1 col-lg-2 col-md-3 col-sm-2 mb-2 text-center">
                <button type="button" class="btn btn-light" onclick="window.location='{{ route('asistencia.index') }}'">Cancelar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>

<div class="container-fluid pt-2">
  <div class="header-body text-center mb-7">
    <div class="row">
      <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
        <div class="d-flex">
          <button class="btn btn-outline-info" type="button" data-bs-toggle="modal" data-bs-target="#modalAsistenciaPDF"><i class="fa fa-fw fa-regular fa-file-pdf"></i></button>
          <form action="{{route('exportar')}}" method="get">
            <input type="hidden" name="meses" id="meses" value="{{$obtenerMes}}" readonly>
            <input type="hidden" name="anios" id="anios" value="{{$obtenerAnio}}" readonly>
            <button type="submit" class="btn btn-outline-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
          </form>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="modal fade" id="modalAsistenciaPDF" tabindex="-1" aria-labelledby="modalAsistenciaPDFLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="modalAsistenciaPDFLabel">PDF Asistencia</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="GET" action="{{route('asistenciasPDF')}}" enctype="multipart/form-data" role="form" target="_blank">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-control" name="entrenador" id="entrenador" required>
                        <option selected disabled></option>
                        @foreach ($entrenador as $item)
                        <option value="{{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}">{{$item->nombre1}} {{$item->nombre2}} {{$item->nombre3}} {{$item->apellido1}} {{$item->apellido2}} {{$item->apellido_casada}}</option>
                        @endforeach
                      </select>
                      <label for="entrenador">Entrenador</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-control" name="centro_entrenamiento" id="centro_entrenamiento" required>
                        <option selected disabled></option>
                        @foreach ($centro_entrenamiento as $item)
                        <option value="{{encrypt($item->id)}}">{{$item->nombre}}</option>
                        @endforeach
                      </select>
                      <label for="centro_entrenamiento">Centro de entrenamiento</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-control" name="departamento_id" id="departamento_id" required>
                        <option selected disabled>Departamento</option>
                        @foreach ($departamento as $item)
                        <option value="{{encrypt($item->id)}}" {{$item->nombre=='Quetzaltenango' ? 'selected':''}}>{{$item->nombre}}</option>
                        @endforeach
                      </select>
                      <label for="departamento_id">Departamento</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-control" name="municipio_id" id="municipio_id">
                        @foreach ($municipio as $item)
                        <option value="{{$item->nombre}}" {{$item->nombre=='Quetzaltenango' ? 'selected' : ''}}>{{$item->nombre}}</option>
                        @endforeach
                      </select>
                      <label for="municipio_id">Municipio</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="dias" type="text" name="dias" placeholder="Días de entrenamiento" required>
                      <label for="dias">Días de entrenamiento</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <input class="form-control" id="fechaAprobacion" type="date" name="fechaAprobacion" required>
                      <label for="fechaAprobacion">Fecha de aprobación</label>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="meses" id="meses" value="{{$obtenerMes}}" readonly>
                <input type="hidden" name="anios" id="anios" value="{{$obtenerAnio}}" readonly>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-1">
        <table class="table table-responsive table-hover" style="border-radius: 5px;">
          @php
              $contador = 1;   
          @endphp
          <thead class="table-dark">
              <tr>
                  <th>No</th>
                  <th>Atleta</th>
                  <th>Edad</th>
                  <th>Género</th>
                  <th>Categoría</th>
                  <th>Modalidad</th>
                  @for ($i=0;$i<count($fechas);$i++)
                      <th>{{Carbon\Carbon::parse($fechas[$i])->format('d')}}</th>
                  @endfor
                  <th>Días Entrenados</th>
                  <th>% de Asistencia</th>
                  <th>Etapa Deportiva</th>
              </tr>
          </thead>
          <tbody>
              @php
              $s=0;
              $c=0;
              @endphp
              @foreach($atleta as $item)
                  <tr id="{{$c}}" style="text-align: center;">
                      <td>{{$contador}}</td>
                      <td>
                          {{$item->alumno->nombre1}} {{$item->alumno->nombre2}}
                          {{$item->alumno->nombre3}}
                          {{$item->alumno->apellido1}} {{$item->alumno->apellido2}}
                      </td>
                      <td>{{$item->alumno->edad}}</td>
                      <td>{{$item->alumno->genero}}</td>
                      <td>{{$item->categoria->tipo}}</td>
                      <td>{{$item->modalidad->nombre}}</td>
                      @for($i=$s;$i<count($fechas)+$s;$i++) <td>{{$estado[$i]}}</td>
                          @endfor
                      <td>{{$contarDias[$c]}}</td>
                      <td>
                      @if($promedio[$c]>=0 && $promedio[$c]<=30)
                        <div class="d-flex align-items-center justify-content-center">
                          <span class="me-2 text-xs font-weight-bold">{{$promedio[$c]}}</span>
                          <div>
                            <div class="progress">
                              <div class="progress-bar bg-gradient-danger" role="progressbar" 
                                aria-valuenow="{{$promedio[$c]}}" aria-valuemin="0" 
                                aria-valuemax="{{$promedio[$c]}}" style="width: {{$promedio[$c]}}%;">
                              </div>
                            </div>
                          </div>
                        </div>
                      @elseif($promedio[$c]>=31 && $promedio[$c]<=50)
                      <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">{{$promedio[$c]}}</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-warning" role="progressbar" 
                              aria-valuenow="{{$promedio[$c]}}" aria-valuemin="0" 
                              aria-valuemax="{{$promedio[$c]}}" style="width: {{$promedio[$c]}}%;">
                            </div>
                          </div>
                        </div>
                      </div>
                      @elseif($promedio[$c]>=51 && $promedio[$c]<=80)
                      <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">{{$promedio[$c]}}</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-info" role="progressbar" 
                              aria-valuenow="{{$promedio[$c]}}" aria-valuemin="0" 
                              aria-valuemax="{{$promedio[$c]}}" style="width: {{$promedio[$c]}}%;">
                            </div>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2 text-xs font-weight-bold">{{$promedio[$c]}}</span>
                        <div>
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" 
                              aria-valuenow="{{$promedio[$c]}}" aria-valuemin="0" 
                              aria-valuemax="{{$promedio[$c]}}" style="width: {{$promedio[$c]}}%;">
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif  
                      </td>
                      <td>{{$item->etapa_deportiva->nombre}}</td>
                      @php
                          $contador++;
                      @endphp
                  </tr>

                  @php
                      $c=$c+1;
                      $s=$s+count($fechas)
                  @endphp
              @endforeach
          </tbody>
        </table>
        {{-- {{$atleta->appends(['mes'=>$obtenerMes,'anio'=>$obtenerAnio])->links('vendor.pagination.custom')}} --}}
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        $('#departamento_id').on('change', function () {
            var dptoId = this.value;
            $('#municipio_id').html('');
            $.ajax({
                url: '{{ route("municipios") }}?departamento_id='+dptoId,
                type: 'get',
                success: function (res) {
                    $('#municipio_id').html('<option value="">Municipio</option>');
                    $.each(res, function (key, value) {
                        $('#municipio_id').append('<option value="' + value.id
                            + '">' + value.nombre + '</option>');
                    });
                }
            });
        });
    });
</script>

@endsection