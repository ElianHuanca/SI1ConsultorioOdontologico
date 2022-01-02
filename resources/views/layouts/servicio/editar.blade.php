@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Servicio</h1>
@stop

@section('content')
<form method="post" action="{{url('/servicio/'.$servicio->id)}}">

    @csrf
    @method('PATCH')
<h5>Descripcion:</h5>
    <input type="text"  name="descripcion" value="{{$servicio->descripcion}}"  class="focus border-primary  form-control">
    @error('descripcion')
    <p>DEBE INGRESAR BIEN LA DESCRIPCION</p>
    @enderror

<h5>Precio:</h5>
    <input type="number"   name="precio" value="{{$servicio->precio}}"  class="focus border-primary  form-control">
    @error('precio')
    <p>DEBE INGRESAR BIEN EL PRECIO</p>
@enderror
  
    <h5>Duracion Aproximada:</h5>
    <input type="time"  name="duracionAproximada" value=" {{$servicio->duracionAproximada}}"  class="focus border-primary  form-control">
    @error('duracionAproximada')
    <p>DEBE INGRESAR BIEN EL CAMPO</p>
@enderror
   
           
        <div class="form-group">
            <h5>Estado:</h5>
            <select name="estado" id=""  class="focus border-primary  form-control">
                <option value="A">Activo</option>
                <option value="I">Inactivo</option>
                </select>
         </div>
    <br>
    
    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>
    
</form>
@stop

