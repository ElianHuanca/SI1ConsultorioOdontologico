@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Reserva</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/reserva')}}" novalidate >
            @csrf
        <h5>Fecha Inicio:</h5>

        <input type="datetime-local"  name="inicio" class="focus border-primary  form-control" >

         @error('inicio')
         <p>DEBE INGRESAR LA FECHA DE INICIO</p>
         @enderror




        <h5>Odontologo:</h5>
        <select name="odontologo_id" id="select-odontologo" class="form-control" onchange="habilitar()" >
            <option value="nulo">Seleccione un Odontologo</option>
                @foreach ($odontologos as $odontologo)
                    <option value="{{$odontologo->id}}">
                        {{$odontologo->nombre}}
                        {{$odontologo->apellidoPaterno}}
                        {{$odontologo->apellidoMaterno}}
                    </option>
                @endforeach
        </select>
        @error('odontologo_id')
        <p>DEBE INGRESAR EL ODONTOLOGO</p>
        @enderror

        <h5>Paciente:</h5>
        <select name="paciente_id" id="select-paciente" class="form-control" onchange="habilitar()" >
            <option value="nulo">Seleccione un Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{$paciente->id}}">
                        {{$paciente->nombre}}
                        {{$paciente->apellidoPaterno}}
                        {{$paciente->apellidoMaterno}}
                    </option>
                @endforeach
        </select>
        @error('paciente_id')
            <p>DEBE INGRESAR EL PACIENTE</p>
        @enderror



        <div class="form-check">
            <p class="font-weight-bold">Servicios</p>
            @foreach ($servicios as $servicio)
            @if ($servicio->estado==='A')
            <input type="checkbox" value="{{$servicio->id}}" name="servicios[]"
            class="form-check-input"> {{$servicio->descripcion}} <br>
            @endif

            @endforeach
        </div>
        @error('servicios')
            <p>DEBE  SELECIONAR POR LO MENOS UN SERVICIO</p>
        @enderror


        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop


