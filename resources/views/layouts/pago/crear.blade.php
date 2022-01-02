@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Pago</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">



        <form method="post" action="{{url('/pago')}}" novalidate >

            @csrf

        <h5>Plan de Pago:</h5>
        <select name="planPago_id" id="select-planPago" class="form-control"  onchange="elegirP()" >
            <option value="">Seleccione un Plan de Pago</option>
                @foreach ($planes as $plan)
                <?php
                  $pacienteId=DB::table('tabla_tratamiento')->where('id',$plan->tratamiento_id)->value('paciente_id');
                  $servicioId=DB::table('tabla_tratamiento')->where('id',$plan->tratamiento_id)->value('servicio_id');
                ?>
                    <option value="{{$plan->id}}">
                        {{$plan->id}} --
                        {{$paciente=DB::table('table__paciente')->where('id',$pacienteId)->value('nombre')}}
                        {{$paciente=DB::table('table__paciente')->where('id',$pacienteId)->value('apellidoPaterno')}}--
                        {{$servicios=DB::table('servicios')->where('id',$servicioId)->value('descripcion')}}
                    </option>
                @endforeach
        </select>
        @error('planPago_id')
            <p>DEBE INGRESAR EL PLAN DE PAGO</p>
        @enderror


        <h5>Atencion:</h5>
        <select name="atencion_id" id="select-atencion" class="form-control"  onchange="elegirA()" >
            <option value="">Seleccione una Atencion</option>
                @foreach ($atenciones as $atencion)
                    <option value="{{$atencion->id}}">
                        {{$atencion->id}} --
                        {{$atencion->descripcion}}
                    </option>
                @endforeach
        </select>
        @error('atencion_id')
            <p>DEBE INGRESAR EL ID DE ATENCION</p>
        @enderror


        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop


