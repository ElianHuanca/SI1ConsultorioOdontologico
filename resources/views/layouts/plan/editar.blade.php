@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Pago</h1>
@stop

@section('content')
<form method="post" action="{{url('/plan/'.$plan->id)}}">

    @csrf
    @method('PATCH')
     <h5>Cantidad de Coutas:</h5>
         <input type="number"  name="cantidadCoutas" value="{{$plan->cantidadCoutas}}" class="focus border-primary  form-control" >

         @error('cantidadCoutas')
         <p>DEBE INGRESAR LA CANTIDAD DE COUTAS</p>
         @enderror



    <br>
    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

