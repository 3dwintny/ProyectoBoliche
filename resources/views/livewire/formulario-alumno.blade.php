<div>
    @if ($errors->has('error'))
    <div class="alert alert-danger">{{ $errors->first('error') }}</div>
    @endif
        <form enctype="multipart/form-data">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-danger' }}">1</a>
                    <p>Alumno</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-danger' }}">2</a>
                    <p>Encargados</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-danger' }}" disabled="disabled">3</a>
                    <p>Confirmar</p>
                </div>
            </div>
        </div>
        {{-- Primer formulario, ingreso de información de alumnos --}}
            <div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body bg-light">
                                    <h2 class="mb-2">Información personal</h2>
                                    <div class="row">
                                        <!-- Esta clase es para tener el formulario Ordenado -->
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark"
                                                    aria-describedby="basic-addon2"
                                                    placeholder="{{ __('Primer Nombre') }}" id="formIns"
                                                    type="text" wire:model="nombre1" name="nombre1"
                                                    value="{{ old('Primer Nombre') }}" required>
                                                <!-- Esto es lo que aparece como placeholder, en el fomulario -->
                                                <label for="formIns">Primer nombre</label>
                                                @error('nombre1') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns"
                                                    placeholder="{{ __('Segundo Nombre') }}" type="text"
                                                    wire:model="nombre2" name="nombre2" value="{{ old('Segundo Nombre') }}" required>
                                                <label for="formIns">Segundo nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns"
                                                    placeholder="{{ __('Tercer Nombre') }}" type="text"
                                                    wire:model="nombre3" name="nombre3" value="{{ old('Tercer Nombre') }}">
                                                <label for="formIns">Tercer nombre</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="apellido1" name="apellido1" placeholder="Primer Apellido">
                                                <label for="formIns">Primer apellido</label>
                                                @error('apellido1') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="apellido2" name="apellido2" placeholder="Segundo Apellido">
                                                <label for="formIns">Segundo apellido</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" placeholder="{{ __('CUI') }}" id="cui" type="text"
                                                wire:model="cui">
                                                <label for="cui">CUI</label>
                                                @error('cui') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Fecha
                                                    de nacimiento</span>
                                                <input class="form-control text-dark" type="date"
                                                wire:model="fecha"
                                                    id="fecha">
                                            </div>
                                            <div>
                                                @error('fecha') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"
                                                    id="inputGroup-sizing-sm">Edad</span>
                                                <input class="form-control text-dark" type="text"
                                                    aria-label="edad" value="{{ $edad }}"
                                                    aria-describedby="basic-addon1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" placeholder="{{ __('Peso(Libras)') }}" id="formIns" type="text"
                                                wire:model="peso">
                                                <label for="formIns">Peso(Libras)</label>
                                                @error('peso') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" placeholder="Altura(Metros)" id="formIns" type="text"
                                                wire:model="altura">
                                                <label for="formIns">Altura(Metros)</label>
                                                @error('altura') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <select class="form-control text-dark" placeholder="Género"
                                                    wire:model="genero">
                                                    <option>Femenino</option>
                                                    <option>Masculino</option>
                                                </select>
                                                <label for="formIns">Género</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input type="text" class="form-control text-dark" id="formIns"
                                                wire:model="alergias" name="alergias" placeholder="Alergias">
                                                <label for="formIns">Alergia</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="direccion" name="direccion" placeholder="Dirección">
                                                <label for="formIns">Dirección</label>
                                                @error('direccion') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="telefono" name="telefono_casa" placeholder="Teléfono Residencial">
                                                <label for="formIns">Teléfono residencial</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="celular" name="celular" placeholder="Celular">
                                                <label for="formIns">Celular</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="email"
                                                wire:model="correo" placeholder="Correo">
                                                <label for="formIns">Correo</label>
                                                @error('correo') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="file"
                                                wire:model="foto" accept=".jpg, .jpeg, .png">
                                                <label for="formIns">Fotografía:</label>
                                                @error('foto') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="nit" name="nit" placeholder="NIT">
                                                <label for="formIns">NIT</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="pasaporte" name="pasaporte" placeholder="Pasaporte">
                                                <label for="formIns">Pasaporte</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="">Nacionalidad</label>
                                                <select class="form-control text-dark"
                                                    wire:model="nacionalidad">
                                                    <div class="col-md-4 mb-2">
                                                        @foreach ($nacionalidades as $item)
                                                        <option value="{{$item->id}}">{{$item->descripcion}}
                                                        </option>
                                                        @endforeach
                                                </select>
                                        </div>
                                        <label class="col-md-12 mb-2">Lugar de nacimiento</label>
                                        <div class="col-md-6 mb-2">
                                            <select class="form-control"
                                                wire:model="country" id="departamento_id">
                                                @foreach ($contries as $departamento)
                                                <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2"><select class="form-control"
                                            wire:model="city" id="municipio_id">
                                            @if ($cities->count() == 0)
                                                <option  disabled selected>Seleccione un departamento</option>
                                            @endif
                                            @foreach ($cities as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <label class="col-md-12 mb-2">Lugar de residencia</label>
                                        <div class="col-md-6 mb-2">
                                            <select class="form-control"
                                                wire:model="countryr" id="departamento_id">
                                                @foreach ($contriesr as $departamentor)
                                                <option value="{{$departamentor->id}}">{{$departamentor->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-2"><select class="form-control"
                                            wire:model="cityr" id="municipio_id">
                                            @if ($citiesr->count() == 0)
                                                <option  disabled selected>Seleccione un departamento</option>
                                            @endif
                                            @foreach ($citiesr as $item)
                                                <option value="{{$item->id}}">{{$item->nombre}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                        <label class="col-md-12 mb-2">Contacto de emergencia</label>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="nombre_emergencia"
                                                    placeholder="Nombre completo">
                                                <label for="formIns">Nombre completo</label>
                                                @error('nombre_emergencia') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <div class="form-floating">
                                                <input class="form-control text-dark" id="formIns" type="text"
                                                wire:model="contacto_emergencia"
                                                    placeholder="Número de teléfono">
                                                <label for="formIns">Número de teléfono</label>
                                                @error('contacto_emergencia') <span class="text-danger error">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    @livewireScripts
                                </div>
                            </div>
                        </div>
                        <button class="next-form btn btn-outline-primary" wire:click="firstStepSubmit" type="button" >Siguiente</button>
                    </div>
                </div>
            </div>
            @livewireScripts
            {{-- Segundo formulario, ingreso de información de los encargados --}}
            <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        @if (session()->has('message'))
                        <div class="alert alert-danger">
                        {{ session('message') }}
                        </div>
                        @endif
                    <div class="form-group">
                        <div class="card">
                            @foreach($primernombrep as $indice => $value )
                                <div class="card-body bg-light">
                                    <div class="col-span-6 sm:col-span-6 text-center">
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="remove({{$indice}})" {{ $btnencargados ? 'disabled' : '' }}>Quitar</button>
                                    </div>
                                    <div class="col-md-11"><h2>Información de encargado {{$indice+1}}</h2></div>
                                    <div class="col-md-1">
                                    </div>
                                        <div class=" add-input">
                                            <div class="row">
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Primer nombre" type="text"
                                                        wire:model="primernombrep.{{ $indice }}">
                                                        <label for="formIns">Primer nombre</label>
                                                        @error('primernombrep.'.$indice) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Segundo nombre" type="text"
                                                        wire:model="segundonombrep.{{ $indice }}">
                                                        <label for="formIns">Segundo nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Tercer nombre" type="text"
                                                        wire:model="tercernombrep.{{ $indice }}">
                                                        <label for="formIns">Tercer nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Primer apellido" type="text"
                                                        wire:model="primerapellidop.{{ $indice }}">
                                                        <label for="formIns">Primer apellido</label>
                                                        @error('primerapellidop.'.$indice) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Segundo Apellido" type="text"
                                                        wire:model="segundoapellidop.{{ $indice }}">
                                                        <label for="formIns">Segundo Apellido</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control text-dark" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Apellido Casada" type="text"
                                                        wire:model="apellidocasadap.{{ $indice }}">
                                                        <label for="formIns">Apellido Casada</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Direccion"
                                                        wire:model="direccionp.{{ $indice }}">
                                                        <label for="formIns">Dirección</label>
                                                        @error('direccionp.'.$indice) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Celular"
                                                        wire:model="celularp.{{ $indice }}">
                                                        <label for="formIns">Celular</label>
                                                        @error('celularp.'.$indice) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Teléfono residencial"
                                                        wire:model="telefonop.{{ $indice }}">
                                                        <label for="formIns">Teléfono residencial</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="Correo electrónico"
                                                        wire:model="correop.{{ $indice }}">
                                                        <label for="formIns">Correo electrónico</label>
                                                        @error('correop.'.$indice) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-floating">
                                                        <input class="form-control" type="text" id="formIns"
                                                        aria-describedby="basic-addon2"
                                                        placeholder="DPI"
                                                        wire:model="dpip.{{ $indice }}">
                                                        <label for="formIns">DPI</label>
                                                        @error('dpip.'.$indice) <span class="text-danger error">{{ $message }}</span>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <select class="form-control" wire:model.defer="parentezcop.{{ $indice }}" required>
                                                        <option value="2" selected>Parentesco</option>
                                                        @foreach ($parentezcos as $item)
                                                            <option value="{{ $item->id }}">{{ $item->tipo }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @livewireScripts
                                    </div>
                        @endforeach
                    </div>
                    <input type="button" name="submit" wire:click.prevent="add({{ $i }})" class="submit btn btn-outline-warning" value="+" data-toggle="tooltip" data-original-title="Agregar Encargado" {{ $disabled ? 'disabled' : '' }}/>
                </div>
                    </div>
                        <button class="previous-form btn btn-outline-warning" type="button" wire:click="back(1)">Regresar</button>
                        <button class="next-form btn btn-outline-primary" type="button" wire:click.prevent="secondStepSubmit">Siguiente</button>
                    </div>
            </div>
            {{-- Tercer formulario, vista y confirmación de infirmación --}}
            <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <td colspan="2" class="table-warning">
                                    <strong>Datos del preinscrito</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Primer nombre:</td>
                                <td><strong>{{$nombre1}}</strong></td>
                            </tr>
                            <tr>
                                <td>Segundo nombre:</td>
                                <td><strong>{{$nombre2}}</strong></td>
                            </tr>
                            <tr>
                                <td>Tercer nombre:</td>
                                <td><strong>{{$nombre3}}</strong></td>
                            </tr>
                            <tr>
                                <td>Primer apellido:</td>
                                <td><strong>{{$apellido1}}</strong></td>
                            </tr>
                            <tr>
                                <td>Segundo apellido:</td>
                                <td><strong>{{$apellido2}}</strong></td>
                            </tr>
                            <tr>
                                <td>CUI:</td>
                                <td><strong>{{$cui}}</strong></td>
                            </tr>
                            <tr>
                                <td>Edad:</td>
                                <td><strong>{{$edad}}</strong></td>
                            </tr>
                            <tr>
                                <td>Peso:</td>
                                <td><strong>{{$peso}}</strong></td>
                            </tr>
                            <tr>
                                <td>Altura:</td>
                                <td><strong>{{$altura}}</strong></td>
                            </tr>
                            <tr>
                                <td>Genero:</td>
                                <td><strong>{{$genero}}</strong></td>
                            </tr>
                            <tr>
                                <td>Dirección:</td>
                                <td><strong>{{$direccion}}</strong></td>
                            </tr>
                            <tr>
                                <td>Telefono:</td>
                                <td><strong>{{$telefono}}</strong></td>
                            </tr>
                            <tr>
                                <td>Celulrar:</td>
                                <td><strong>{{$celular}}</strong></td>
                            </tr>
                            <tr>
                                <td>Fotografía:</td>
                                <td>
                                <strong>
                                    @if($foto)
                                    <img src="{{$foto->temporaryUrl()}}" width="13%">
                                    @endif
                                </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Nit:</td>
                                <td><strong>{{$nit}}</strong></td>
                            </tr>
                            <tr>
                                <td>Pasaporte:</td>
                                <td><strong>{{$pasaporte}}</strong></td>
                            </tr>
                            <tr>
                                <td>Alergia:</td>
                                <td><strong>{{$alergias}}</strong></td>
                            </tr>
                            <tr>
                                <td>Nacionalidad:</td>
                                <td><strong>{{$nacionalidad}}</strong></td>
                            </tr>
                            <tr>
                                <td>Departanto de nacicmiento:</td>
                                @foreach($contries as $dpto)
                                @if($dpto->id == $country)
                                    <td><strong>{{$dpto->nombre}}</strong></td>
                                @endif
                                @endforeach

                            </tr>
                            <tr>
                                <td>Municipio de nacimiento:</td>
                                @foreach($cities as $cts)
                                @if($cts->id == $city)
                                    <td><strong>{{$cts->nombre}}</strong></td>
                                @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>Departanto de recidencia:</td>
                                @foreach($contriesr as $dpto)
                                @if($dpto->id == $countryr)
                                    <td><strong>{{$dpto->nombre}}</strong></td>
                                @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td>Municipio de recidencia:</td>
                                @foreach($citiesr as $cts)
                                @if($cts->id == $cityr)
                                    <td><strong>{{$cts->nombre}}</strong></td>
                                @endif
                                @endforeach
                            </tr>
                            <tr>
                                <td colspan="2" class="table-warning">
                                    <strong>Contacto de emergencia</strong>
                                </td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td><strong>{{$nombre_emergencia}}</strong></td>
                            </tr>
                            <tr>
                                <td>Teléfono:</td>
                                <td><strong>{{$contacto_emergencia}}</strong></td>
                            </tr>
                            @if($ex_encargados === false)

                            @else
                                @foreach($primernombrep as $indice => $value )
                                <tr>
                                    <td colspan="2" class="table-warning">
                                        <strong>Datos de encargados</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Primer nombre:</td>
                                    <td><strong>{{$primernombrep[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Segundo nombre:</td>
                                    <td><strong>{{$segundonombrep[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Tercer nombre:</td>
                                    <td><strong>{{$tercernombrep[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Primer apellido:</td>
                                    <td><strong>{{$primerapellidop[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Segundo apellido:</td>
                                    <td><strong>{{$segundoapellidop[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Apellido casada:</td>
                                    <td><strong>{{$apellidocasadap[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Dirección:</td>
                                    <td><strong>{{$direccionp[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Celular:</td>
                                    <td><strong>{{$celularp[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Telefono:</td>
                                    <td><strong>{{$telefonop[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Correo:</td>
                                    <td><strong>{{$correop[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>DPI:</td>
                                    <td><strong>{{$dpip[$indice]}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Parentezco:</td>
                                    <td><strong>{{$parentezcop[$indice]}}</strong></td>
                                </tr>
                                @endforeach
                            @endif
                        </table>
                        <button class="previous-form btn btn-outline-warning" type="button" wire:click="back(2)">Regresar</button>
                        <button class="submit btn btn-outline-success" wire:click="submitForm" {{-- onclick="window.location.href='{{ route('ficha-PDF', '') }}/'+document.getElementById('cui').value;"--}}type="button">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
</div>