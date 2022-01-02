@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Receta</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{url('/receta')}}" novalidate >

            @csrf

        <h5>Descripcion:</h5>

         <input type="text"  name="descripcion" class="focus border-primary  form-control" >

         @error('descripcion')
         <p>DEBE INGRESAR LA DESCRIPCION</p>
         @enderror



         <h5>Atencion:</h5>

         <select name="atencion_id" id="select-atencion" class="form-control" onchange="habilitar()" >
            <option value="nulo">Seleccione una Atencion</option>
                @foreach ($atenciones as $atencion)
                    <option value="{{$atencion->id}}">
                        {{$atencion->id}} --
                        {{$atencion->descripcion}}
                    </option>
                @endforeach
        </select>
         @error('atencion_id')
         <p>DEBE INGRESAR LA ATENCION</p>
         @enderror


        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form>

    </div>
</div>
@stop


