@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-11 col-sm-9">
                    <h1 class="text-white">Otros programas de atención</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-xl-6 col-lg-6 col-md-10 col-sm-8">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Editar</h2>
                        </strong>
                    </div>
                    <form method="post" role="form" enctype="multipart/form-data" action="{{route('otro-programa-de-atencion.update',encrypt($otro_programa->id))}}">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombre" placeholder="Programa de Atención" name="nombre" value="{{$otro_programa->nombre}}" required>
                                <label for="nombre">Programa de Atención</label>
                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection