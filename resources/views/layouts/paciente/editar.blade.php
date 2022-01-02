@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Paciente</h1>
@stop

@section('content')
<form method="post" action="{{url('/paciente/'.$paciente->id)}}">
    @csrf
    @method('PATCH')
<h5>Ci:</h5>
    <input type="text"  name="ci" value="{{$paciente->ci}}" class="focus border-primary  form-control">
    @error('ci')
    <p>DEBE INGRESAR BIEN SU CI</p>
    @enderror

<h5>Nombre:</h5>
    <input type="text"   name="nombre" value="{{$paciente->nombre}}" class="focus border-primary  form-control">
    @error('nombre')
    <p>DEBE INGRESAR BIEN SU NOMBRE</p>
@enderror

    <h5>Apellido Paterno:</h5>
    <input type="text"  name="apellidoPaterno" value=" {{$paciente->apellidoPaterno}}"  class="focus border-primary  form-control">
    @error('apellidoPaterno')
    <p>DEBE INGRESAR BIEN EL APELLIDO PATERNO</p>
@enderror



    <h5>Apellido Materno:</h5>
    <input type="text"  name="apellidoMaterno" value=" {{$paciente->apellidoMaterno}}" class="focus border-primary  form-control" >
    @error('apellidoMaterno')
    <p>DEBE INGRESAR BIEN EL APELLIDO MATERNO</p>
    @enderror

    <h5>Sexo:</h5>
    <input type="text"  name="sexo" value=" {{$paciente->sexo}}" class="focus border-primary  form-control" >
    @error('sexo')
    <p>DEBE INGRESAR BIEN EL SEXO</p>
    @enderror

    <h5>Telefono:</h5>
    <input type="text" name="telefono" value=" {{$paciente->telefono}}" class="focus border-primary  form-control">
    @error('telefono')
            <p>DEBE INGRESAR BIEN SU TELEFONO</p>
        @enderror

    <br>

    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

