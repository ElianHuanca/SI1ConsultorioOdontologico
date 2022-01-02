@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Pago</h1>
@stop

@section('content')
<form method="post" action="{{url('/pago/'.$pago->id)}}">

    @csrf
    @method('PATCH')
    <h5>Fecha:</h5>
     <input type="date"  name="fecha" default="{{$pago->fecha}}" class="focus border-primary  form-control" >

     @error('fecha')
     <p>DEBE INGRESAR LA FECHA</p>
     @enderror

	<h5>Atencion:</h5>
        <input type="number"  name="atencion_id" value="{{$pago->atencion_id}}" list="atenciones" class="focus border-primary  form-control">
        <datalist id="atenciones">

            <option value="1">Atencion</option>


          </datalist>
        @error('atencion_id')
            <p>DEBE INGRESAR EL ID DE ATENCION</p>
        @enderror

        <h5>Plan de Pago:</h5>
        <input type="number"  name="planPago_id" value="{{$pago->planPago_id}}" list="planesNames" class="focus border-primary  form-control">
        <datalist id="planesNames">
            @foreach ($planes as $plan)
                <option value="{{$plan->id}}">Plan</option>
            @endforeach

          </datalist>
        @error('planPago_id')
            <p>DEBE INGRESAR EL PLAN DE PAGO</p>
        @enderror

         <h5>Monto Total:</h5>
         <input type="number"  name="montoTotal" value="{{$pago->montoTotal}}" class="focus border-primary  form-control" >

         @error('montoTotal')
         <p>DEBE INGRESAR EL MONTO TOTAL</p>
         @enderror
    <br>
    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

