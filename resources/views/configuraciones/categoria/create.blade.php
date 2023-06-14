@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
@include('layouts.headers.cards', ['texto' => 'Categorias'])
<div class="container-fluid mt--6">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Registrar Nueva Categoría</h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('categoria.store')}}">
                    @csrf
                    <div class="form-group">
                        <div>Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{\Carbon\Carbon::parse($hoy)->format('d-m-Y')}}" readonly>
                    </div>
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="form-group{{ $errors->has('tipo') ? ' has-danger' : '' }}">
                                <div class="form-floating mb-3">
                                    <input class="form-control {{ $errors->has('tipo') ? ' is-invalid' : '' }} text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Categoría') }}" id="tipo" type="text" name="tipo" value="{{ old('tipo') }}" required>
                                    <label for="tipo">Categoría</label>
                                </div>
                                    
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="rango_edades" placeholder="Rango de Edades" name="rango_edades" value="{{old('rango_edades')}}">
                                <label for="rango_edades">Rango de Edades</label>
                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registrar</button></div>
                            </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection