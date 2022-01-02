@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Tratamiento</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">



        <form method="post" action="{{url('/tratamiento')}}" novalidate >

            @csrf


        <h5>Fecha Inicio:</h5>

         <input type="date"  name="fechaInicio" class="focus border-primary  form-control" >

         @error('fechaInicio')
         <p>DEBE INGRESAR LA FECHA DE INICIO</p>
         @enderror

         <h5>Fecha Fin:</h5>

         <input type="date"  name="fechaFin" class="focus border-primary  form-control" >

         @error('fechaFin')
         <p>DEBE INGRESAR LA FECHA DE FINALIZACION</p>
         @enderror




        <h5>Servicio:</h5>
          <select name="servicio_id" id="select-servicio" class="form-control" onchange="habilitar()" >
                        <option value=0>Seleccione un Servicio</option>
                            @foreach ($servicios as $servicio)
                                <option value="{{ $servicio->id }}">{{ $servicio->descripcion }}</option>
                            @endforeach
            </select>
        @error('servicio_id')
            <p>DEBE INGRESAR EL SERVICIO</p>
        @enderror



        <h5>Paciente:</h5>
        <select name="paciente_id" id="select-paciente" class="form-control" onchange="habilitar()" >
            <option value=0>Seleccione un Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">
                        {{ $paciente->nombre }}
                        {{$paciente->apellidoPaterno}}
                        {{$paciente->apellidoMaterno}}
                    </option>
                @endforeach
        </select>
        @error('paciente_id')
            <p>DEBE INGRESAR EL PACIENTE</p>
        @enderror

        <h5>Odontologo:</h5>
        <select name="odontologo_id" id="select-odontologo" class="form-control" onchange="habilitar()" >
            <option value=0>Seleccione un Odontologo</option>
                @foreach ($odontologos as $odontologo)
                    <option value="{{ $odontologo->id }}">
                        {{ $odontologo->nombre }}
                        {{$odontologo->apellidoPaterno}}
                        {{$odontologo->apellidoMaterno}}
                    </option>
                @endforeach
        </select>
        @error('paciente_id')
            <p>DEBE INGRESAR EL ODONTOLOGO</p>
        @enderror







        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop


