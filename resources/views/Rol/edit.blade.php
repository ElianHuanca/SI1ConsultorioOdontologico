@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Consultorio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body"> 
        
            <form action="{{url('/roles/'.$rol->id)}}" method="post"  >
                @csrf
                @method('PATCH') 
                <p>Ingrese el nombre del Rol</p>
                <input type="text" name="name" class="form-control" value="{{$rol->name}}"> <br>
                                                                
                

                <p>Asignación de Permisos</p>
                <div class="form-check">
                    @foreach ($permisos as $permiso)
                        <input type="checkbox" value="permisos[]" name="permisos[]"       
                               class="form-check-input"> {{$permiso->name}} <br>
                    @endforeach
                </div> <br> 

                <button  class="btn btn-danger btn-sm" type="submit">Actualizar Rol</button>
            </form>

    </div>
</div>
<br>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
