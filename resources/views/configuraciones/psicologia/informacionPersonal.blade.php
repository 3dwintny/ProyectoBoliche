@extends('layouts.app')

@section('content')
<div class="header bg-dark pb-3 pt-xl-5 pt-lg-5 pt-md-2 pt-sm-2">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <h1 class="text-white">Psicología</h1>
                </div>
            </div>
        </div>
    </div>
</div>
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

            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
                <form action="{{route('actualizarPsicologia')}}"   id="register_form" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <fieldset class="card-body bg-light">
                        <div class="form-group">
                            <div class="card">
                                <div class="card-header bg-light mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 mb-3">
                                            <h3 class="card-title text-dark">Editar</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body bg-light">
                                    <h2 class="mb-2">Información personal</h2>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre1" placeholder="Primer nombre" name="nombre1" value="{{$psicologo->nombre1}}" required>
                                                <label for="nombre1">Primer nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre2" placeholder="Segundo nombre" name="nombre2" value="{{$psicologo->nombre2}}">
                                                <label for="nombre2">Segundo nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="nombre3" placeholder="Tercer nombre" name="nombre3" value="{{$psicologo->nombre3}}">
                                                <label for="nombre3">Tercer nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido1" placeholder="Primer apellido" name="apellido1" value="{{$psicologo->apellido1}}" required>
                                                <label for="apellido1">Primer apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido2" placeholder="Segundo apellido" name="apellido2" value="{{$psicologo->apellido2}}">
                                                <label for="apellido2">Segundo apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="apellido_casada" placeholder="Apellido de casada" name="apellido_casada" value="{{$psicologo->apellido_casada}}">
                                                <label for="apellido_casada">Apellido de casada</label>
                                            </div>
                                        </div>                      
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 mb-2">
                                            <div class="form-floating">
                                              <input type="tel" name="telefono" id="telefono" class="form-control text-dark @error('telefono') is-invalid @enderror" aria-describedby="basic-addon2" placeholder="{{ __('Teléfono') }}" value="{{$psicologo->telefono}}" pattern="[0-9]{4}[-][0-9]{4}" title="Formato aceptado: 0000-0000 o 0000 0000">
                                              <label for="telefono">Teléfono</label>
                                              @error('telefono')
                                                <div class="invalid-tooltip">{{ $message }}</div>
                                              @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="correo" placeholder="Correo" name="correo" value="{{$psicologo->correo}}" required>
                                                <label for="correo">Correo</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" value="{{$psicologo->direccion}}">
                                                <label for="direccion">Dirección</label>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-5 col-md-4 col-sm-4 mb-2">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="colegiado" placeholder="Número de colegiado" name="colegiado" value="{{$psicologo->colegiado}}" required>
                                                <label for="colegiado">Número de colegiado</label>
                                            </div>
                                        </div>    
                                        <div class="col-xl-8 col-lg-7 col-md-8 col-sm-8 mb-2">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Inicio de labores</span>
                                                <input class="form-control text-dark" type="date" name="fecha_inicio_labores"
                                            id="fecha_inicio_labores" value="{{$psicologo->fecha_inicio_labores}}" readonly required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                    </fieldset>
                </form>     
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    let controlPrimerosDigitosTelefono = 4;
    const txtTelefono = document.getElementById('telefono');
    if (txtTelefono.innerHTML.trim() === '') {
        controlPrimerosDigitosTelefono = 0;
    }
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

<style type="text/css">
#register_form fieldset:not(:first-of-type) {
    display: none;
}
</style>
@endsection