@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            <form action="{{url('/Users/'.$user->id)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Ingrese el nombre de usuario</label>
                        <input type="text" name="name" class="form-control" value="{{old('name', $user->name)}}" id="name">
                        @error('name')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="check_password">Nueva contraseña</label>
                        <input type="checkbox" name="activar-contraseña" id="check_password" onclick="cambiarEstado()" >
                        <input type="password" name="password" class="form-control" value="{{old('password')}}" id="passwordInput" placeholder="Escriba la nueva contraseña">
                        @error('password')
                            <small>*{{$message}}</small>
                            <br><br>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="select-roles">Seleccione un rol</label>
                    <select name="roles" id="select-roles" class="form-control" onchange="habilitar()" >
                        <option value={{$rol->role_id}}>{{$rol_name->name}}</option>
                            @foreach ($roles as $role)
                                @if ($role->id <> $rol->role_id)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>

                                @endif
                            @endforeach
                    </select>
                    @error('roles')
                    <small>*{{$message}}</small>
                    <br><br>
                @enderror
                </div>
                <br>

                <div>
                    <label for="select-odontologos">Seleccione un odontólogo</label>
                    <select name="odontologos" class="form-control" id="select-odontologos" disabled="" onchange="elegirO()">
                        @if ( $o > 0)
                            <option value="{{ $personaO->id }}">{{$personaO->nombre.' '.$personaO->apellidoPaterno.' '.$personaO->apellidoMaterno}}</option>
                            <option value=0>Seleccione al Recepcionista</option>
                            @foreach ($odontologos as $odontologo)
                                @if ($odontologo->id <> $personaO->id)
                                <option value="{{ $odontologo->id }}">{{ $odontologo->nombre.' '.$odontologo->apellidoPaterno.' '.$odontologo->apellidoMaterno }}</option>
                                @endif
                            @endforeach
                        @else
                            <option value=0>Seleccione un Odontologo</option>
                            @foreach ($odontologos as $odontologo)
                                <option value="{{ $odontologo->id }}">{{ $odontologo->nombre.' '.$odontologo->apellidoPaterno.' '.$odontologo->apellidoMaterno }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <br>

                <div>
                    <label for="select-recepcionistas">Seleccione un recepcionista</label>
                    <select name="recepcionistas" id="select-recepcionistas" class="form-control"  disabled="" onchange="elegirR()">
                        @if ( $r > 0)
                            <option value="{{ $personaR->id }}">{{$personaR->nombre.' '.$personaR->apellidoPaterno.' '.$personaR->apellidoMaterno}}</option>
                            <option value=0>Seleccione al Recepcionista</option>
                            @foreach ($recepcionistas as $recepcionista)
                                @if ($recepcionista->id <> $personaR->id)
                                <option value="{{ $recepcionista->id }}">{{ $recepcionista->nombre.' '.$recepcionista->apellidoPaterno.' '.$recepcionista->apellidoMaterno }}</option>
                                @endif
                            @endforeach
                        @else
                            <option value=0>Seleccione un Recepcionista</option>
                            @foreach ($recepcionistas as $recepcionista)
                                <option value="{{ $recepcionista->id }}">{{ $recepcionista->nombre.' '.$recepcionista->apellidoPaterno.' '.$recepcionista->apellidoMaterno }}</option>
                            @endforeach
                        @endif


                    </select>
                </div>

                <br>

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar Usuario</button>
            </form>

    </div>
</div>

<script>
    //alert('script');
    var rol = document.getElementById('select-roles');
    var odontologos = document.getElementById('select-odontologos');
    var recepcionistas = document.getElementById('select-recepcionistas');
    document.addEventListener('DOMContentLoaded', cargar, false);
    var checkP = document.getElementById('check_password');
    var contra = document.getElementById('passwordInput');

    function cambiarEstado(){
        if(contra.disabled == true){
            contra.disabled = false
        }else{
        if(contra.disabled == false){
            contra.disabled = true
            contra.value = ''
        }
        }
    }

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

    function cargar(){
        if(rol.value == 2){
            odontologos.disabled = false
            recepcionistas.disabled = true
            recepcionistas.value = 0
            contra.disabled = true
            contra.value = ''
        }else{

        if(rol.value == 3){
            recepcionistas.disabled = false
            odontologos.disabled = true
            odontologos.value = 0
            contra.disabled = true
            contra.value = ''
        }else{
            odontologos.disabled = true
            recepcionistas.disabled = true
            // odontologos.value = 0
            // recepcionistas.value = 0
            contra.disabled = true
            contra.value = ''
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop