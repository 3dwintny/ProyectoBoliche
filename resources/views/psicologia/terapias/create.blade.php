@extends('layouts.app')

@section('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
        <div class="header bg-dark pb-4 pt-5 pt-md-3">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                        <h1 class="text-white">Terapias</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="header-body text-center  mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-8">
                        <div class="card">
                            <div class="card-header text-bold ">
                               <strong><h1> Registrar nuevo entrenador </h1></strong>
                               <div">Fecha <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" readonly disabled></div>
                            </div> 
                           </div>
<form method="post" role="form" enctype="multipart/form-data" action="{{route('entrenadores.store')}}">    

        <div class="form-group">
            <div class="card">
            <div class="card-body bg-light">
            <h2 class="mb-2">Información Personal</h2>
                <div class="row">
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="{{ __('Primer Nombre') }}" type="text" name="nombre1" value="{{ old('Primer Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Segundo Nombre') }}" type="text" name="nombre2" value="{{ old('Segundo Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Tercer Nombre') }}" type="text" name="nombre3" value="{{ old('Tercer Nombre') }}" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="apellido1" placeholder="Primer Apellido"></div>
                    <div class="col-md-4 mb-2"> <input class="form-control text-dark" type="text" name="apellido2" placeholder="Segundo Apellido"></div>
                    <div class="col-md-4 mb-2"> <input class="form-control text-dark" type="text" name="apellido_casada" placeholder="Apellido Casada"></div>
                    <div class="col-md-6 mb-2"><input class="form-control text-dark"  type="tel"  name="celular" placeholder="Celular"></div>
                    <div class="col-md-6 mb-2"><input class="form-control text-dark"  type="email" name="correo" placeholder="Correo"></div>   
                    <div class="col-md-6 mb-2"><input  class="form-control text-dark" type="tel" name="telefono_casa" placeholder="Teléfono Residencial"></div>
                    <div class="col-md-6 mb-2"> <input class="form-control text-dark" type="text" name="cui" placeholder="CUI"></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark"  type="text" name="pasaporte" placeholder="Pasaporte"></div>
                    <div class="col-md-4 mb-2"> <input class="form-control text-dark"  type="date" name="fecha_inicio_labores" id="" required></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="años_experiencia" placeholder="Años de Experiencia" id=""></div>
                    <div class="col-md-12 mb-2"><input class="form-control text-dark" type="text" name="direccion" placeholder="Dirección de Residencia" id="" required></div>

                     

                </div>   
                <div class="container">
        <div class="col-md-4 mb-10 center"><button type="submit" class="btn btn-outline-primary">Registar</button></div>
        </div>
                </form>

                
        </div>
        </div>
                    </div>
                </div>
                
            </div>
            
        
        
        
    </div>
    <script type="text/javascript">

$(document).ready(function () {
        $('#fecha_nacimiento').on('change', function () {
            function calcularEdad(fechas) {
            var hoy = new Date();
            var cumpleanos = new Date(fechas);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();

            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }

            return edad;
        }
        document.getElementById('_edad').value=calcularEdad(document.getElementById('fecha_nacimiento').value);
        });
    });
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth()+1;
    day = date.getDate();
    document.getElementById("fecha_sistema").value = year+"/"+month+"/"+day;
</script>
@endsection