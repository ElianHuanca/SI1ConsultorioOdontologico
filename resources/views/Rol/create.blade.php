@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Crear Roles</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        
            <form action="{{url('/roles')}}" method="post" novalidate >
                @csrf
                <p>Ingrese el nombre del Rol</p>
                <input type="text" name="name" class="form-control"> <br>
                @error('name')                    
                <small class="text-danger">*{{$message}}</small>
                <br><br>                                            
                @enderror                                                
                

                <p>Asignación de Permisos</p>
                <div class="form-check">
                    @foreach ($permisos as $permiso)
                        <input type="checkbox" value="{{$permiso->id}}" name="permisos[]"       
                               class="form-check-input"> {{$permiso->name}} <br>
                    @endforeach
                </div> <br> 

                <button  class="btn btn-danger btn-sm" type="submit">Crear Rol</button>
            </form> 

    </div>
</div>
<br>
@stop