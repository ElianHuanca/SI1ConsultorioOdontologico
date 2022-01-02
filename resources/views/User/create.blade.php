@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Crear Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

            <form action="{{url('/Users')}}" method="post" novalidate >
                @csrf
                <p>Ingrese el nombre de usuario</p>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                @error('name')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror

                <p>Ingrese la contraseña</p>
                <input type="password" name="password" class="form-control" value="{{old('password')}}">
                @error('password')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror


                <div>
                    <p>Seleccione un rol</p>
                    <select name="roles" id="select-roles" class="form-control" onchange="habilitar()" >
                        <option value=0>Seleccione un rol</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @endforeach
                    </select>
                    @error('roles')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                </div>

                <div>
                    <p>Seleccione un odontologo</p>
                    <select name="odontologos" class="form-control" id="select-odontologos" disabled="" onchange="elegirO()">
                        <option value=0 >Seleccione al odontólogo</option>
                            @foreach ($odontologos as $odontologo)
                                <option value="{{ $odontologo->id }}">{{ $odontologo->nombre.' '.$odontologo->apellidoPaterno.' '.$odontologo->apellidoMaterno}}</option>
                            @endforeach
                    </select>
                </div>

                <div>
                    <p >Seleccione un recepcionista</p>
                    <select name="recepcionistas" id="select-recepcionistas" class="form-control"  disabled="" onchange="elegirR()">
                        <option value=0 >Seleccione al Recepcionista</option>
                            @foreach ($recepcionistas as $recepcionista)
                                <option value="{{ $recepcionista->id }}">{{ $recepcionista->nombre.' '.$recepcionista->apellidoPaterno.' '.$recepcionista->apellidoMaterno }}</option>
                            @endforeach

                    </select>
                </div>

                <br>

                <button  class="btn btn-danger btn-sm" type="submit">Crear Usuario</button>
            </form>

    </div>
</div>

<script>
    //alert('script');
    var rol = document.getElementById('select-roles');
    var odontologos = document.getElementById('select-odontologos');
    var recepcionistas = document.getElementById('select-recepcionistas');

    function habilitar(){
        if(rol.value == 2){
            odontologos.disabled = false
            recepcionistas.disabled = true
            recepcionistas.value = 0
        }else{

            if(rol.value == 3){
                recepcionistas.disabled = false
                odontologos.disabled = true
                odontologos.value = 0
            }else{
                odontologos.disabled = false
                recepcionistas.disabled = false
                odontologos.value = 0
                recepcionistas.value = 0
            }
        }
    }

    function elegirR(){
        if(recepcionistas.value > 0){
            recepcionistas.disabled = false
            odontologos.disabled = true
            odontologos.value = 0
        }
        if(recepcionistas.value == 0){
            odontologos.disabled = false
        }
    }

    function elegirO(){
        if(odontologos.value > 0){
            odontologos.disabled = false
            recepcionistas.disabled = true
            recepcionistas.value = 0
        }
        if(odontologos.value == 0){
            recepcionistas.disabled = false
        }
    }
</script>

@stop

{{-- @section('js')
    <script src="{{ asset('js/User/create.js') }}"></script>
@stop --}}

