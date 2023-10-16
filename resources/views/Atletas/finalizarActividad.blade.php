@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Finalizar práctica</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body pt-2">
    <div class="container text-center">
        @include('components.flash_alerts')
        <form class="row g-3 justify-content-center" method="POST" action="{{route('actividadFinalizada')}}" enctype="multipart/form-data" role="form">
            @csrf
            {{method_field('PUT')}}
            <div class="col-12">
                <input type="hidden" name="actividad" value="{{encrypt($actividadId)}}">
                <label for="fecha">Fotografía</label>
                <div class="form-floating">
                    <input type="file" name="fotografia" id="fotografia" required accept=".jpg, .png, .jpeg">
                </div>
            </div>
            <div class="col-8">
                <textarea  cols="40" rows="5" style="text-align:justify;resize:none;background-color:white;" class="form-control text-dark" aria-describedby="basic-addon2" readonly>{{$actividad[0]->actividad_entreno->actividad}}</textarea>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary mb-3">Aceptar</button>
            </div>
        </form>      
    </div>
</div>
@endsection