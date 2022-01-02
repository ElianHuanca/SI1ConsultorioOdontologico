@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Factura</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/factura')}}" novalidate >

            @csrf

         <h5>Pago ID:</h5>
         <select name="pago_id" id="select-pago" class="form-control" onchange="habilitar()" >
            <option value="">Seleccione un Pago</option>
            @foreach ($pagos as $pago)
                <option value="{{ $pago->id }}">{{ $pago->id }}</option>
            @endforeach
    	</select>
         @error('pago_id')
         <p>DEBE UN PAGO ID</p>
         @enderror


        <h5>Nombre:</h5>
        <input type="text" list="nombres" name="nombre"  class="focus border-primary  form-control">
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
        <input type="number"  name="nit"  class="focus border-primary  form-control">

        @error('nit')
            <p>DEBE INGRESAR NIT</p>
        @enderror




        <br>

        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop


