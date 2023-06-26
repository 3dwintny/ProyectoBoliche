@extends('layouts.app')

@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
<div class="header bg-dark pb-7 pt-5 pt-md-6 mt--5">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <h1 class="text-white">Municipios</h1>
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
                            <h2>Registrar nuevo municipio</h2>
                        </strong>

                    </div>
                <form method="post" role="form" enctype="multipart/form-data" action="{{route('municipio.store')}}">
                    @csrf
                    <div class="card">
                        <div class="card-body bg-light">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombre" placeholder="Municipio" name="nombre" required>
                                <label for="nombre">Municipio</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="departamento_id" id="departamento_id" class="form-control" required>
                                    <option value="" selected disabled></option>
                                    @foreach($departamentos as $item)
                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                    @endforeach 
                                </select>
                                <label for="departamento_id">Departamento</label>
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