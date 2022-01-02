@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Servicio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        
    
        <form method="post" action="{{url('/servicio')}}" novalidate >
        
            @csrf
            
         <h5>Descripcion:</h5>
         <input type="text"  name="descripcion" class="focus border-primary  form-control" >   

         @error('descripcion')
         <p>DEBE RELLENAR ESTE CAMPO </p>
         @enderror
      

        <h5>Precio:</h5>
        <input type="number"  name="precio"  class="focus border-primary  form-control">
        
        @error('precio')
            <p>CAMPO DE TIPO NUMERICO</p>
        @enderror
           

        <h5>Duracion Aproximada:</h5>
        <input type="time"  name="duracionAproximada"  class="focus border-primary  form-control">
        
        @error('duracionAproximada')
            <p>DEBE RELLENAR ESTE CAMPO</p>
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


