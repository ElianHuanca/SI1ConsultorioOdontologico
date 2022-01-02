@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Odontologo</h1>
@stop

@section('content')
<form method="post" action="{{url('/odontologo/'.$odontologo->id)}}">

    @csrf
    @method('PATCH')
<h5>Ci:</h5>
    <input type="text"  name="ci" value="{{$odontologo->ci}}"  class="focus border-primary  form-control">
    @error('ci')
    <p>DEBE INGRESAR BIEN SU CI</p>
    @enderror

<h5>Nombre:</h5>
    <input type="text"   name="nombre" value="{{$odontologo->nombre}}"  class="focus border-primary  form-control">
    @error('nombre')
    <p>DEBE INGRESAR BIEN SU NOMBRE</p>
@enderror
  
    <h5>Apellido Paterno:</h5>
    <input type="text"  name="apellidoPaterno" value=" {{$odontologo->apellidoPaterno}}"  class="focus border-primary  form-control">
    @error('apellidoPaterno')
    <p>DEBE INGRESAR BIEN EL APELLIDO PATERNO</p>
@enderror
   
   
    <h5>Apellido Materno:</h5>
    <input type="text"  name="apellidoMaterno" value=" {{$odontologo->apellidoMaterno}}" class="focus border-primary  form-control" >
    @error('apellidoMaterno')
    <p>DEBE INGRESAR BIEN EL APELLIDO MATERNO</p>
@enderror
    


    <h5>Telefono:</h5>
    <input type="text" name="telefono" value=" {{$odontologo->telefono}}" class="focus border-primary  form-control">
    @error('telefono')
            <p>DEBE INGRESAR BIEN SU TELEFONO</p>
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

