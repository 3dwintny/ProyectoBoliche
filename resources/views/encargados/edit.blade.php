@extends('layouts.app')

@section('content')

<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Encargados</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@include('configuraciones.varnav')
<div class="container-fluid pt-2">
    <div class="header-body text-center mb-7">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12">
                @if (session('status'))
                    <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2> Editar
                            <a href="{{ url('encargados') }}" class="btn btn-danger btn-sm float-right">Regresar</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('encargados.update',$encargados->id) }}" method="POST" role="form" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Primer nombre" type="text"
                                        name="nombre1p" value="{{$encargados->nombre1p}}"">
                                        <label for="formIns">Primer nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Segundo nombre" type="text"
                                        name="nombre2p" value="{{ $encargados->nombre2p }}">
                                        <label for="formIns">Segundo nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Tercer nombre" type="text"
                                        name="nombre3p" value="{{$encargados->nombre3p}}">
                                        <label for="formIns">Tercer nombre</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Primer apellido" type="text"
                                        name="apellido1p" value="{{ $encargados->apellido1p }}">
                                        <label for="formIns">Primer apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Segundo Apellido" type="text"
                                        name="apellido2p" value="{{ $encargados->apellido2p }}">
                                        <label for="formIns">Segundo Apellido</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control text-dark" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Apellido Casada" type="text"
                                        name="apellido_casada" value="{{ $encargados->apellido_casada }}">
                                        <label for="formIns">Apellido Casada</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" type="text" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Direccion"
                                        name="direccionp" value="{{ $encargados->direccionp }}">
                                        <label for="formIns">Dirección</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" type="text" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Celular"
                                        name="celularp" value="{{ $encargados->celularp }}">
                                        <label for="formIns">Celular</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" type="text" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Teléfono residencial"
                                        name="telefono_casa" value="{{ $encargados->telefono_casa }}">
                                        <label for="formIns">Teléfono residencial</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" type="text" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="Correo electrónico"
                                        name="correop" value="{{ $encargados->correop }}">
                                        <label for="formIns">Correo electrónico</label>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="form-floating">
                                        <input class="form-control" type="text" id="formIns"
                                        aria-describedby="basic-addon2"
                                        placeholder="DPI"
                                        name="dpi" value="{{ $encargados->dpi }}">
                                        <label for="formIns">DPI</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
