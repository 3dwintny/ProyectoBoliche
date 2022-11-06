@extends('layouts.app')

@section('content')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!--div class="body pb-8 pt-5 pt-lg-1 d-flex align-items-center" style="background-image: url(../argon/img/theme/bol.jpg); background-size: cover; background-position: center top;"!-->
        <div class="header bg-dark pb-4 pt-5 pt-md-6">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                        <h1 class="text-white">Atleta</h1>
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
                               <strong><h1>Inscripcion del Atleta {{$alumno->nombre}}</h1></strong>
                               
                            </div> 
                           </div>
<form method="post" role="form" enctype="multipart/form-data" action="{{route('atletas.store')}}">    
    @csrf
        <div class="form-group">
            <div class="card">
            <div class="card-body bg-light">
            <h2 class="mb-2">Informacion Adicional</h2>
                <div class="row">
                    <div class="col-md-6 mb-2"><div class="input-group mb-2">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Ingreso</span>
                        <input type="text" class=" container form-control text-center" name="fecha_registro" id="fecha_sistema" readonly >
                    </div></div>
                    <div class="col-md-6 mb-2"><input class="form-control text-dark" aria-describedby="basic-addon2" placeholder="Adaptado" type="text" name="adaptado" value="{{ old('Adaptado') }}" required></div>
                    <div class="col-md-6 mb-2"><select name="estado_civil" class="form-control text-dark" required>
                        <option selected disabled>Estado Civil</option>
                        <option value="Soltera/o">Soltera/o</option>
                        <option value="Casada/o">Casada/o</option>
                        <option value="Unión Libre">Unión Libre</option>
                        <option value="Unión de Hecho">Unión de Hecho</option>
                        <option value="Separada/o">Separada/o</option>
                        <option value="Divorciada/o">Divorciada/o</option>
                        <option value="Viuda/o">Viuda/o</option>
                    </select></div>
                    <div class="col-md-6 mb-2"><select name="etnia" class="form-control text-dark" required>
                        <option selected disabled>Etnia</option>
                        <option value="Maya">Maya</option>
                        <option value="Xinka">Xinka</option>
                        <option value="Garífuna">Garifuna</option>
                        <option value="Ladino">Ladino</option>
                    </select></div>
                    <div class="col-md-6 mb-2"><select name="escolaridad" class="form-control text-dark" required>
                        <option selected disabled>Nivel Académico</option>
                        <option value="Primaria">Primaria</option>
                        <option value="Básico">Básico</option>
                        <option value="Diversificado">Diversificado</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Maestría">Maestría</option>
                        <option value="Doctorado">Doctorado</option>
                    </select></div>
                    <div class="col-md-4 mb-2"><select name="centro_id" class="form-control text-dark" required>
                        <option selected disabled>Centro</option>
                        @foreach ($centro as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select></div>
                    <div class="col-md-4 mb-2"><select name="entrenador_id" class="form-control text-dark" required>
                        <option selected disabled>Entrenador</option>
                        @foreach ($entrenador as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select></div>
                    <div class="col-md-4 mb-2"><select name="etapa_deportiva_id" class="form-control text-dark" required>
                        <option selected disabled>Etapa Deportiva</option>
                        @foreach ($estapa as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select></div>
                    <div class="col-md-4 mb-2"><select name="deporte_id" class="form-control text-dark" required>
                        <option selected disabled>Deporte</option>
                        @foreach ($deportes as $item)
                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                        @endforeach
                    </select></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Segundo Nombre') }}" type="text" name="nombre2" value="{{ old('Segundo Nombre') }}"></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" placeholder="{{ __('Tercer Nombre') }}" type="text" name="nombre3" value="{{ old('Tercer Nombre') }}"></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="apellido1" placeholder="Primer Apellido"></div>
                    <div class="col-md-4 mb-2"> <input class="form-control text-dark" type="text" name="apellido2" placeholder="Segundo Apellido"></div>
                    <div class="col-md-4 mb-2"> <input class="form-control text-dark" type="text" name="apellido_casada" placeholder="Apellido Casada"></div>
                    <div class="col-md-6 mb-2"><input class="form-control text-dark"  type="tel"  name="celular" placeholder="Celular"></div>
                    <div class="col-md-6 mb-2"><input  class="form-control text-dark" type="tel" name="telefono_casa" placeholder="Teléfono Residencial"></div>
                    <div class="col-md-6 mb-2"> <input class="form-control text-dark" type="text" name="cui" placeholder="CUI"></div>
                    <div class="col-md-6 mb-2"><input class="form-control text-dark"  type="text" name="pasaporte" placeholder="Pasaporte"></div>
                    
                    

                    <div class="col-md-6 mb-2"><div class="input-group mb-2">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Fecha Nacimiento</span>
                        <input class="form-control text-dark" type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
                    </div></div>
                    
                    <div class="col-md-4 mb-2"><select class="form-control text-dark" name="genero">
                        <option selected disabled>Género</option>
                        <option>Femenino</option>
                        <option>Masculino</option>
                    </select></div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="años_experiencia" placeholder="Años de Experiencia" id=""></div>
                    
                    
                    <div class="col-md-4 mb-2"><input class="form-control text-dark"  type="email" name="correo" placeholder="Correo"></div>                
                    <div class="col-md-4 mb-2">
                    <div class="input-group ">
                        <input class="form-control text-dark" type="file" name="foto" id="inputGroupFile02" required>
                    </div>
                    </div>
                    <div class="col-md-4 mb-2"><input class="form-control text-dark" type="text" name="nit" placeholder="NIT" id=""></div>
                    <div class="col-md-12 mb-2"><input class="form-control text-dark"  type="text" name="direccion" placeholder="Dirección"></div>

                     
                    
                    
                    <div class="col-md-4 mb-2"><select class="form-control text-dark" name="id_nivel_cdag" required>
                    <option selected disabled>Nivel CDAG</option>
                    @foreach ($niveles_cdag as $item)
                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                    @endforeach
                </select></div>
                    <div class="col-md-4 mb-2"><select name="id_nivel_fadn" class="form-control text-dark" required>
            <option selected disabled>Nivel FADN</option>
            @foreach ($niveles_fadn as $item)
            <option value="{{$item->id}}">{{$item->tipo}}</option>
            @endforeach
        </select></div>
        <div class="col-md-4 mb-2"><select name="id_departamento" class="form-control text-dark" required>
            <option selected disabled>Departamento</option>
            @foreach ($departamentos as $item)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endforeach
        </select></div>
        
        <div class="col-md-4 mb-2"><select name="id_tipo_contrato" class="form-control text-dark"    required>
            <option selected disabled>Tipo de Contrato</option>
            @foreach ($tipos_contratos as $item)
            <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select></div>
        <div class="col-md-12 mb-2">
        <select name="id_nacionalidad" class="form-control text-dark" required>
            <option selected disabled>Nacionalidad</option>
            @foreach ($nacionalidades as $item)
            <option value="{{$item->id}}">{{$item->descripcion}}</option>
            @endforeach
        </select></div>

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