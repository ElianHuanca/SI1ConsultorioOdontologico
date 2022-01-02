@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Tratamiento</h1>
@stop

@section('content')
<form method="post" action="{{url('/tratamiento/'.$tratamiento->id)}}">

    @csrf
    @method('PATCH')


        <h5>Fecha Inicio:</h5>

         <input type="date"  name="fechaInicio" value="{{$tratamiento->fechaInicio}}" class="focus border-primary  form-control" >

         @error('fechaInicio')
         <p>DEBE INGRESAR LA FECHA DE INICIO</p>
         @enderror

         <h5>Fecha Fin:</h5>

         <input type="date"  name="fechaFin" value="{{$tratamiento->fechaFin}}" class="focus border-primary  form-control" >

         @error('fechaFin')
         <p>DEBE INGRESAR LA FECHA DE FINALIZACION</p>
         @enderror

         <h5>Estado:</h5>
         <select name="estadoTra_id" id="select-estado" class="form-control" onchange="habilitar()" >
            <option value={{$tratamiento->estadoTra_id}}>
                {{$actual=DB::table('tabla_estado_tra')->where('id',$tratamiento->estadoTra_id)->value('descripcion')}}
            </option>
                @foreach ($estados as $estado)
                    @if($estado->id!=$tratamiento->estadoTra_id)
                        <option  value="{{ $estado->id }}">{{ $estado->descripcion }}</option>
                    @endif
                @endforeach
        </select>
         @error('estadoTra_id')
         <p>DEBE INGRESAR EL ESTADO</p>
         @enderror


        <h5>Servicio:</h5>
        <select name="servicio_id" id="select-servicio" class="form-control" onchange="habilitar()" >
            <option value={{$tratamiento->servicio_id}}>
                {{$actual=DB::table('servicios')->where('id',$tratamiento->servicio_id)->value('descripcion')}}
            </option>
                @foreach ($servicios as $servicio)
                    @if($servicio->id!=$tratamiento->servicio_id)
                        <option  value="{{ $servicio->id }}">{{ $servicio->descripcion }}</option>
                    @endif
                @endforeach
        </select>
        @error('servicio_id')
            <p>DEBE INGRESAR EL SERVICIO</p>
        @enderror



        <h5>Paciente:</h5>
         <select name="paciente_id" id="select-paciente" class="form-control" onchange="habilitar()" >
            <option value={{$tratamiento->paciente_id}}>
                {{$actual=DB::table('table__paciente')->where('id',$tratamiento->paciente_id)->value('nombre')}}
                {{$actual=DB::table('table__paciente')->where('id',$tratamiento->paciente_id)->value('apellidoPaterno')}}
                {{$actual=DB::table('table__paciente')->where('id',$tratamiento->paciente_id)->value('apellidoMaterno')}}
            </option>
                @foreach ($pacientes as $paciente)
                    @if($paciente->id!=$tratamiento->paciente_id)
                        <option  value="{{ $paciente->id }}">
                            {{ $paciente->nombre }}
                            {{$paciente->apellidoPaterno}}
                            {{$paciente->apellidoMaterno}}
                        </option>
                    @endif
                @endforeach
        </select>
        @error('paciente_id')
            <p>DEBE INGRESAR EL PACIENTE</p>
        @enderror

        <h5>Odontologo:</h5>
         <select name="odontologo_id" id="select-odontologo" class="form-control" onchange="habilitar()" >
            <option value={{$tratamiento->odontologo_id}}>
                {{$actual=DB::table('tabla_odontologo')->where('id',$tratamiento->odontologo_id)->value('nombre')}}
                {{$actual=DB::table('tabla_odontologo')->where('id',$tratamiento->odontologo_id)->value('apellidoPaterno')}}
                {{$actual=DB::table('tabla_odontologo')->where('id',$tratamiento->odontologo_id)->value('apellidoMaterno')}}
            </option>
                @foreach ($odontologos as $odontologo)
                    @if($odontologo->id!=$tratamiento->odontologo_id)
                        <option  value="{{ $odontologo->id }}">
                            {{ $odontologo->nombre }}
                            {{$odontologo->apellidoPaterno}}
                            {{$odontologo->apellidoMaterno}}
                        </option>
                    @endif
                @endforeach
        </select>
        @error('paciente_id')
            <p>DEBE INGRESAR EL ODONTOLOGO</p>
        @enderror
    <br>
    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

