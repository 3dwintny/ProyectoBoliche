@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-7 pt-5 pt-md-6">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
<<<<<<< HEAD
                    <h1 class="text-white">Alergia</h1>
=======
                    <h1 class="text-white">Alergias</h1>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="header-body text-center  mb-7">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
<<<<<<< HEAD
                            <h2> Registrar Nueva Alergia </h2>
=======
                            <h2>Registrar Nueva Alergia</h2>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                        </strong>
                    </div>
<<<<<<< HEAD
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('Alergia.store')}}">
                    @csrf
                    <div class="form-group">
                        <div>Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{$hoy}}" readonly>
                    </div>
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="descripcion" placeholder="Alergia" name="descripcion" required>
                                <label for="descripcion">Alergia</label>
=======
                
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('alergia.store')}}">
                        @csrf
                        <div class="form-group">
                            <div>
                                Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" value="{{\Carbon\Carbon::parse($hoy)->format('d-m-Y')}}" readonly>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                            </div>
                        
                            <div class="card">
                                <div class="card-body bg-light">
                                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                        <div class="form-floating mb-3">
                                            <input class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }} text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Alergia') }}" id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" required>
                                            <label for="nombre">Alergia</label>
                                        </div>
                                            
                                        @if ($errors->has('nombre'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('nombre') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="descripcion" placeholder="Descripción" name="descripcion" value="{{old('descripcion')}}">
                                        <label for="descripcion">Descripción</label>
                                    </div>
                                    <div class="container">
                                        <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registrar</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
</div>
</div>
@endsection
=======
@endsection
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
