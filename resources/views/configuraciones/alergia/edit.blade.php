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
                    <h1 class="text-white">Alergias</h1>
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
                            <h2>Editar Alergia </h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('alergias.update',$alergia->id)}}">
=======
                            <h2>Editar</h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('alergia.update',encrypt($alergia->id))}}">
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                    @csrf
                    {{method_field('PUT')}}
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="form-floating mb-3">
<<<<<<< HEAD
                                <input type="text" class="form-control" id="descripcion" placeholder="Alergia" name="descripcion" value="{{$alergia->descripcion}}" required>
                                <label for="descripcion">Alergia</label>
=======
                                <input type="text" class="form-control" id="nombre" placeholder="Alergia" name="nombre" value="{{$alergia->nombre}}" required>
                                <label for="nombre">Alergia</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="descripcion" placeholder="Descripción" name="descripcion" value="{{$alergia->descripcion}}">
                                <label for="descripcion">Descripción</label>
>>>>>>> 03e7a231be7f35737b46212c52a6ad402453e6df
                            </div>
                            <div class="container">
                                <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Actualizar</button></div>
                            </div>
                </form>


            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
