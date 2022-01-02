@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Factura</h1>
@stop

@section('content')
<form method="post" action="{{url('/factura/'.$factura->id)}}">

    @csrf
    @method('PATCH')
	<h5>Pago ID:</h5>
         <select name="pago_id" id="select-pago" class="form-control" onchange="habilitar()" >
            <option value="{{$factura->pago_id}}">{{$factura->pago_id}}</option>
            @foreach ($pagos as $pago)
                <option value="{{ $pago->id }}">{{ $pago->id }}</option>
            @endforeach
    	</select>
         @error('pago_id')
         <p>DEBE UN PAGO ID</p>
         @enderror


        <h5>Nombre:</h5>
        <input type="text" list="nombres" name="nombre" value="{{$factura->nombre}}" class="focus border-primary  form-control">
        <datalist id="nombres">
            @foreach($pacientes as $paciente)
                <option value="{{$paciente->nombre}} {{$paciente->apellidoPaterno}} {{$paciente->apellidoMaterno}}">
                </option>
            @endforeach
        </datalist>
        @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
        @enderror



        <h5>NIT:</h5>
        <input type="number"  name="nit" value="{{$factura->nit}}"  class="focus border-primary  form-control">

        @error('nit')
            <p>DEBE INGRESAR NIT</p>
        @enderror

    <br>

    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

