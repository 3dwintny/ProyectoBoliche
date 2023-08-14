@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12">
                    <h1 class="text-white">Información de encagados</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@if(count($cantidadEncargados)==0 or $alumno->edad>17)
    <div class="container-fluid pt-2">
        <div class="alert alert-info textoNegrita textoCentrado" role="alert">
            NO SE HAN ENCONTRADO RESULTADOS
        </div>
    </div>
@else
    <div class="container-fluid pt-2">
        <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="col-xl-9 col-lg-11 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="card-header text-bold ">
                            <strong>
                                <h3>Editar</h3>
                            </strong>
                        </div>
                    </div>
                    <form action="{{route('actualizarInformacionEncargados')}}" method="POST" enctype="multipart/form-data" role="form">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <input type="hidden" name="encargado1" id="encargado1" value="{{encrypt($encargados[0]->id)}}">
                                    <h5 class="mb-2">Primer encargado</h5>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="primer_nombre_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Primer nombre" type="text" name="primer_nombre_primer_encargado"  required value="{{$encargados[0]->nombre1p}}">
                                                <label for="primer_nombre_primer_encargado">Primer nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="segundo_nombre_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Segundo nombre" type="text" name="segundo_nombre_primer_encargado" value="{{$encargados[0]->nombre2p}}">
                                                <label for="segundo_nombre_primer_encargado">Segundo nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="tercer_nombre_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Tercer nombre" type="text" name="tercer_nombre_primer_encargado" value="{{$encargados[0]->nombre3p}}">
                                                <label for="tercer_nombre_primer_encargado">Tercer nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="primer_apellido_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Primer apellido" type="text" name="primer_apellido_primer_encargado"  required value="{{$encargados[0]->apellido1p}}">
                                                <label for="primer_apellido_primer_encargado">Primer apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="segundo_apellido_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Segundo apellido" type="text" name="segundo_apellido_primer_encargado" value="{{$encargados[0]->apellido2p}}">
                                                <label for="segundo_apellido_primer_encargado">Segundo apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="apellido_casada_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Apellido de casada" type="text" name="apellido_casada_primer_encargado" value="{{$encargados[0]->apellido_casada}}">
                                                <label for="apellido_casada_primer_encargado">Apellido de casada</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-5 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="dpi_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="DPI" type="text" name="dpi_primer_encargado"  required value="{{$encargados[0]->dpi}}">
                                                <label for="dpi_primer_encargado">DPI</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-3 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="celular_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Celular" type="tel" name="celular_primer_encargado"  required value="{{$encargados[0]->celularp}}">
                                                <label for="celular_primer_encargado">Celular</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-4 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="telefono_casa_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Teléfono de casa" type="tel" name="telefono_casa_primer_encargado" value="{{$encargados[0]->telefono_casap}}">
                                                <label for="telefono_casa_primer_encargado">Teléfono de casa</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="correo_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Correo electrónico" type="text" name="correo_primer_encargado" value="{{$encargados[0]->correop}}">
                                                <label for="correo_primer_encargado">Correo electrónico</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                            <div class="form-floating">
                                                <select name="parentesco_primer_encargado" id="parentesco_primer_encargado" class="form-control text-dark" required>
                                                    <option selected disabled>Parentesco</option>
                                                    @foreach ($parentescos as $item)
                                                        <option value="{{encrypt($item->id)}}" {{$encargados[0]->parentezco_id == $item->id ? 'selected':''}}>{{$item->tipo}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="parentesco_primer_encargado">Parentesco</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-2 mb-2">
                                            <div class="form-floating">
                                                <input id="direccion_primer_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Dirección" type="text" name="direccion_primer_encargado"  required value="{{$encargados[0]->direccionp}}">
                                                <label for="direccion_primer_encargado">Dirección</label>
                                            </div>
                                        </div>
                                        @if(count($cantidadEncargados)==2)
                                            <h5 class="mb-2">Segundo encargado</h5>
                                            <input type="hidden" name="encargado2" value="{{encrypt($encargados[1]->id)}}">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="primer_nombre_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Primer nombre" type="text" name="primer_nombre_segundo_encargado"  required value="{{$encargados[1]->nombre1p}}">
                                                    <label for="primer_nombre_segundo_encargado">Primer nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="segundo_nombre_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Segundo nombre" type="text" name="segundo_nombre_segundo_encargado" value="{{$encargados[1]->nombre2p}}">
                                                    <label for="segundo_nombre_segundo_encargado">Segundo nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="tercer_nombre_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Tercer nombre" type="text" name="tercer_nombre_segundo_encargado" value="{{$encargados[1]->nombre3p}}">
                                                    <label for="tercer_nombre_segundo_encargado">Tercer nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="primer_apellido_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Primer apellido" type="text" name="primer_apellido_segundo_encargado"  required value="{{$encargados[1]->apellido1p}}">
                                                    <label for="primer_apellido_segundo_encargado">Primer apellido</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="segundo_apellido_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Segundo apellido" type="text" name="segundo_apellido_segundo_encargado" value="{{$encargados[1]->apellido2p}}">
                                                    <label for="segundo_apellido_segundo_encargado">Segundo apellido</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="apellido_casada_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Apellido de casada" type="text" name="apellido_casada_segundo_encargado" value="{{$encargados[1]->apellido_casada}}">
                                                    <label for="apellido_casada_segundo_encargado">Apellido de casada</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-5 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="dpi_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="DPI" type="text" name="dpi_segundo_encargado"  required value="{{$encargados[1]->dpi}}">
                                                    <label for="dpi_segundo_encargado">DPI</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-3 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="celular_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Celular" type="tel" name="celular_segundo_encargado"  required value="{{$encargados[1]->celularp}}">
                                                    <label for="celular_segundo_encargado">Celular</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-4 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="telefono_casa_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Teléfono de casa" type="tel" name="telefono_casa_segundo_encargado" value="{{$encargados[1]->telefono_casap}}">
                                                    <label for="telefono_casa_segundo_encargado">Teléfono de casa</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="correo_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Correo electrónico" type="text" name="correo_segundo_encargado" value="{{$encargados[1]->correop}}">
                                                    <label for="correo_segundo_encargado">Correo electrónico</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 mb-2">
                                                <div class="form-floating">
                                                    <select name="parentesco_segundo_encargado" id="parentesco_segundo_encargado" class="form-control text-dark" required>
                                                        <option selected disabled>Parentesco</option>
                                                        @foreach ($parentescos as $item)
                                                            <option value="{{encrypt($item->id)}}" {{$encargados[1]->parentezco_id == $item->id ? 'selected':''}}>{{$item->tipo}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="parentesco_segundo_encargado">Parentesco</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-2 mb-2">
                                                <div class="form-floating">
                                                    <input id="direccion_segundo_encargado" class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Dirección" type="text" name="direccion_segundo_encargado"  required value="{{$encargados[1]->direccionp}}">
                                                    <label for="direccion_segundo_encargado">Dirección</label>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="container">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 center">
                                                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection
@push('styles')
    <link rel="stylesheet" href="css/general.css">
@endpush