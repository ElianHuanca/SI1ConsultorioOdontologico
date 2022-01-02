@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Registrar Producto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        
    
        <form method="post" action="{{url('/producto')}}" novalidate >
        
            @csrf
            
         <h5>Descripcion:</h5>
         <input type="text"  name="descripcion" class="focus border-primary  form-control" >   

         @error('descripcion')
         <p>DEBE RELLENAR ESTE CAMPO </p>
         @enderror
    
       
        <br>

        <button  class="btn btn-danger btn-sm" type="submit">Registrar</button>
        </form> 
       
    </div>
</div>  
@stop


