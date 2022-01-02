@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Reserva</h1>
@stop

@section('content')
<form method="post" action="{{url('/reserva/'.$reserva->id)}}">

    @csrf
    @method('PATCH')


        <h5>Fecha Inicio:</h5>

         <input type="datetime"  name="inicio" value="{{$reserva->inicio}}" class="focus border-primary  form-control" >

         @error('inicio')
            <span class="text-danger">{{$message}}</span>
        @enderror

        <h5>Fecha Fin:</h5>
         <input type="datetime"  name="fin" value="{{$reserva->inicio}}" class="focus border-primary  form-control" >

         @error('fin')
            <span class="text-danger">{{$message}}</span>
        @enderror




        <h5>Odontologo:</h5>
        <select name="odontologo_id" id="select-odontologo" class="form-control" onchange="habilitar()" >
            <option value={{$reserva->odontologo_id}}>
                {{$actual=DB::table('tabla_odontologo')->where('id',$reserva->odontologo_id)->value('nombre')}}
                {{$actual=DB::table('tabla_odontologo')->where('id',$reserva->odontologo_id)->value('apellidoPaterno')}}
                {{$actual=DB::table('tabla_odontologo')->where('id',$reserva->odontologo_id)->value('apellidoMaterno')}}
            </option>
                @foreach ($odontologos as $odontologo)
                    @if($odontologo->id!=$reserva->odontologo_id)
                        <option  value="{{ $odontologo->id }}">
                            {{$odontologo->nombre}}
                            {{$odontologo->apellidoPaterno}}
                            {{$odontologo->apellidoMaterno}}
                        </option>
                    @endif
                @endforeach
        </select>
         @error('odontologo_id')
         <p>DEBE INGRESAR EL ODONTOLOGO</p>
         @enderror




        <h5>Paciente:</h5>
        <select name="paciente_id" id="select-paciente" class="form-control" onchange="habilitar()" >
            <option value={{$reserva->paciente_id}}>
                {{$actual=DB::table('table__paciente')->where('id',$reserva->paciente_id)->value('nombre')}}
                {{$actual=DB::table('table__paciente')->where('id',$reserva->paciente_id)->value('apellidoPaterno')}}
                {{$actual=DB::table('table__paciente')->where('id',$reserva->paciente_id)->value('apellidoMaterno')}}
            </option>
                @foreach ($pacientes as $paciente)
                    @if($paciente->id!=$reserva->paciente_id)
                        <option  value="{{ $paciente->id }}">
                            {{$paciente->nombre}}
                            {{$paciente->apellidoPaterno}}
                            {{$paciente->apellidoMaterno}}
                        </option>
                    @endif
                @endforeach
        </select>
        @error('paciente_id')
            <p>DEBE INGRESAR EL PACIENTE</p>
        @enderror




        <h5>Estado:</h5>
        <select name="estadoRes_id" id="select-estado" class="form-control" onchange="habilitar()" >
            <option value={{$reserva->estadoRes_id}}>
                {{$actual=DB::table('tabla_estado_res')->where('id',$reserva->estadoRes_id)->value('descripcion')}}
            </option>
                @foreach ($estados as $estado)
                    @if($estado->id!=$reserva->estado_id)
                        <option  value="{{ $estado->id }}">
                            {{$estado->descripcion}}
                        </option>
                    @endif
                @endforeach
        </select>
        @error('estadoRes_id')
            <p>DEBE INGRESAR EL ESTADO</p>
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
    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

