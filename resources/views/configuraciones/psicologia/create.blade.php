@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-10 col-sm-6">
                    <h1 class="text-white">Psicología</h1>
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
            <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header text-bold ">
                        <strong>
                            <h2>Nueva(o)</h2>
                        </strong>
                    </div>
                    <form action="{{ route('psicologia.store') }}" id="register_form" method="POST" role="form" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="card-body bg-light">
                            <div class="form-group">
                                <div class="card">
                                    <div class="card-body bg-light">
                                        <h2 class="mb-2">Información personal</h2>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="nombre1" placeholder="Primer nombre" name="nombre1" value="{{old('nombre1')}}" required>
                                                    <label for="nombre1">Primer nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="nombre2" placeholder="Segundo nombre" value="{{old('nombre2')}}" name="nombre2">
                                                    <label for="nombre2">Segundo nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="nombre3" placeholder="Tercer nombre" value="{{old('nombre3')}}" name="nombre3">
                                                    <label for="nombre3">Tercer nombre</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="apellido1" placeholder="Primer apellido" value="{{old('apellido1')}}" name="apellido1" required>
                                                    <label for="apellido1">Primer apellido</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="apellido2" placeholder="Segundo apellido" value="{{old('apellido2')}}" name="apellido2">
                                                    <label for="apellido2">Segundo apellido</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="apellido_casada" placeholder="Apellido de casada" name="apellido_casada" value="{{old('apellido_casada')}}">
                                                    <label for="apellido_casada">Apellido de casada</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                                <div class="form-floating">
                                                <input type="number" name="colegiado" id="colegiado" class="form-control text-dark @error('colegiado') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Colegiado') }}" value="{{ old('colegiado') }}">
                                                <label for="colegiado">Colegiado</label>
                                                @error('colegiado')
                                                    <div class="invalid-tooltip">{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 mb-2">
                                                <div class="form-floating">
                                                <input type="tel" name="telefono" id="telefono" class="form-control text-dark @error('telefono') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono') }}" value="{{ old('telefono') }}" pattern="[0-9]{4}[-][0-9]{4}" title="Formato aceptado: 0000-0000 o 0000 0000">
                                                <label for="telefono">Teléfono</label>
                                                @error('telefono')
                                                    <div class="invalid-tooltip">{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-floating">
                                                <input type="email" name="correo" id="correo" class="form-control text-dark @error('correo') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Correo electrónico') }}" value="{{ old('correo') }}">
                                                <label for="correo">Correo electrónico</label>
                                                @error('correo')
                                                    <div class="invalid-tooltip">{{ $message }}</div>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" value="{{old('direccion')}}">
                                                    <label for="direccion">Dirección</label>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 mb-2 mx-auto">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Fecha de Inicio de Labores</span>
                                                    <input class="form-control text-dark" type="date" name="fecha_inicio_labores"
                                                        id="fecha_inicio_labores" value="{{$hoy->format('Y-m-d')}}" value="{{old('fecha_inicio_labores')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" name="submit" class="btn btn-outline-primary" value="Registrar" />
                        </fieldset>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    let controlPrimerosDigitosTelefono = 0;
    $(document).ready(function() {
        $('#telefono').on('keydown',function(){
            var numeroTelefono = document.getElementById('telefono');
            var codigo = event.which || event.keyCode;
            if(numeroTelefono.value.length <=8){
                if(codigo >=96 && codigo <= 105 || codigo >=48 && codigo <= 57){
                    if(numeroTelefono.value.length<=4){
                        controlPrimerosDigitosTelefono++;
                    }
                }
                else if(codigo == 8){
                    if((controlPrimerosDigitosTelefono > 0 && controlPrimerosDigitosTelefono < 5) && (numeroTelefono.value.length>-1 && numeroTelefono.value.length<5)){
                        controlPrimerosDigitosTelefono--;
                    }
                }
                if(numeroTelefono.value.length==4 && controlPrimerosDigitosTelefono==5){
                    document.getElementById('telefono').value = document.getElementById('telefono').value+"-";
                    if(controlPrimerosDigitosTelefono==5){
                        controlPrimerosDigitosTelefono = 4;
                    }
                }
            }
            else{
                document.getElementById('telefono').readOnly = true;
            }

            if(codigo == 8 && document.getElementById('telefono').readOnly == true){
                document.getElementById('telefono').readOnly = false;
            }
        });
    });
</script>
@endsection


