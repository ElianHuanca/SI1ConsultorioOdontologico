@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <div class="card bg-light">
        <div class="card-header bg-light">
            <h1 class="bg-light text-center  font-weight-bolder" >CONSULTORIO- SONRIE</h1>
        </div>
    </div>
    
@stop

@section('content')
<div class="col-md-4">
    <div class="card card-user">
      <div class="card-body">
        <p class="card-text">
          <div class="author">
            <a href="#" class="d-flex">
              <img src="{{ asset('/vendor/adminlte/dist/img/avatar2.png') }}" alt="image" class="avatar">
            </a>
            
            <div>
                <span class="text-primary">Usuario: </span>
                {{ $usuario->name }}
            </div> <br>
            <div>
                <span class="text-primary">Rol: </span>
                {{ $rol_name->name }}
            </div> <br> 
            @if ($o > 0)
            <div>
                <span class="text-primary">Nombre: </span>
                {{ $personaO->nombre.' '.$personaO->apellidoPaterno.' '.$personaO->apellidoMaterno }}
            </div> <br>
            @endif

            @if ($r > 0)
            <div>
                <span class="text-primary">Nombre: </span>
                {{ $personaR->nombre.' '.$personaR->apellidoPaterno.' '.$personaR->apellidoMaterno }}
            </div> <br>
            @endif


            <div class="card-footer">
      
                <a class="btn btn-warning btn-sm" href="{{url('/Users/'.$usuario->id.'/changePassword/')}}">Cambiar contraseña</a>
              
            </div>
               
          </div>
        
    
      </div>
      
    </div>
  </div><!--end card user 2-->
  
  
  @stop







@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
