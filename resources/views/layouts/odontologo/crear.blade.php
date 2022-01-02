@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Odontologo</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">        
        <form method="post" action="{{url('/odontologo')}}" novalidate >
        
            @csrf
            
         <h5>Ci:</h5>
         <input type="text"  name="ci" class="focus border-primary  form-control" >   

         @error('ci')
         <p>DEBE INGRESAR BIEN SU CI</p>
         @enderror
      

        <h5>Nombre:</h5>
        <input type="text"  name="nombre"  class="focus border-primary  form-control">
        
        @error('nombre')
            <p>DEBE INGRESAR BIEN SU NOMBRE</p>
        @enderror
           


        <h5>Apellido Paterno:</h5>
        <input type="text"  name="apellidoPaterno"  class="focus border-primary  form-control">
        
        @error('apellidoPaterno')
            <p>DEBE INGRESAR BIEN EL APELLIDO PATERNO</p>
        @enderror
        

        <h5>Apellido Materno:</h5>
        <input type="text"  name="apellidoMaterno"  class="focus border-primary  form-control">
        
        
        @error('apellidoMaterno')
            <p>DEBE INGRESAR BIEN EL APELLIDO MATERNO</p>
        @enderror
        
     <div class="form-group">
        <h5>Sexo:</h5>
        <select name="sexo" id=""  class="focus border-primary  form-control">
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
            </select>
     </div>
        
      

        <h5>Telefono:</h5>
        <input type="text" name="telefono"  class="focus border-primary  form-control" >
       
        
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

        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form> 
       
    </div>
</div>  
@stop


