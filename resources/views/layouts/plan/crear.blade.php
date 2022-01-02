@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Plan de Pago</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">



        <form method="post" action="{{url('/plan')}}" novalidate >

            @csrf


        <h5>Tratamiento:</h5>
        <select name="tratamiento_id" id="select-tratamiento" class="form-control" onchange="habilitar()" >
            <option value="nulo">Seleccione un Tratamiento</option>
                @foreach ($tratamientos as $tratamiento)
                    <option value="{{$tratamiento->id}}">
                        {{$tratamiento->id}} --
                        {{$paciente=DB::table('table__paciente')->where('id',$tratamiento->paciente_id)->value('nombre')}}
                        {{$paciente=DB::table('table__paciente')->where('id',$tratamiento->paciente_id)->value('apellidoPaterno')}}--
                        {{$servicios=DB::table('servicios')->where('id',$tratamiento->servicio_id)->value('descripcion')}}
                    </option>
                @endforeach
        </select>
        @error('tratamiento_id')
            <p>DEBE INGRESAR EL ID DE TRATAMIENTO</p>
        @enderror

         <h5>Cantidad de Coutas:</h5>
         <input type="number"  name="cantidadCoutas" class="focus border-primary  form-control" >

         @error('cantidadCoutas')
         <p>DEBE INGRESAR LA CANTIDAD DE COUTAS</p>
         @enderror












        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop


