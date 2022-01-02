@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Producto</h1>
@stop

@section('content')
<form method="post" action="{{url('/producto/'.$producto->id)}}">

    @csrf
    @method('PATCH')
<h5>Descripcion:</h5>
    <input type="text"  name="descripcion" value="{{$producto->descripcion}}"  class="focus border-primary  form-control">
    @error('descripcion')
    <p>DEBE INGRESAR BIEN SU CI</p>
    @enderror

    <br>
    
    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>
    
</form>
@stop

