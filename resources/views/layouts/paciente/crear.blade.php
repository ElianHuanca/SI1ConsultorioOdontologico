@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Registrar Paciente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">        
        <form method="post" action="{{url('/paciente')}}" novalidate >
            @csrf
         <h5>Ci:</h5>
         <input type="text"  name="ci" class="focus border-primary  form-control">   

         @error('ci')
            <span class="text-danger">{{$message}}</span>
         @enderror
        

        <h5>Nombre:</h5>
        <input type="text"  name="nombre" class="focus border-primary  form-control">
        
        @error('nombre')
        <span class="text-danger">{{$message}}</span>
        @enderror
          


        <h5>Apellido Paterno:</h5>
        <input type="text"  name="apellidoPaterno" class="focus border-primary  form-control">
        
     
        @error('apellidoPaterno')
        <span class="text-danger">{{$message}}</span>
        @enderror
        

        <h5>Apellido Materno:</h5>
        <input type="text"  name="apellidoMaterno"class="focus border-primary  form-control">
        
        
        @error('apellidoMaterno')
        <span class="text-danger">{{$message}}</span>
        @enderror
        

        <div class="form-group">
            <h5>Sexo:</h5>
            <select name="sexo" id=""  class="focus border-primary  form-control">
                <option value="F">Femenino</option>
                <option value="M">Masculino</option>
                </select>
         </div>
        
        

        <h5>Telefono:</h5>
        <input type="text" name="telefono" class="focus border-primary  form-control" >
        
        
        @error('telefono')
        <span class="text-danger">{{$message}}</span>
        @enderror        
        <br>
        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form> 
       
    </div>
</div>  
@stop


