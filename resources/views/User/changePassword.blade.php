@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')    

@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('updatePassword') }}" method="POST">
                @csrf
                {{-- @method('PATCH') --}}
                <div >
                    <span>Escriba su contraseña</span>
                    <input type="password" name="contraseña" class="form-control">
                </div>
                @error('contraseña')                    
                    <small>*{{$message}}</small>
                    <br><br>                                            
                @enderror
                <br>

                <div>
                    <span>Nueva Contraseña:</span>
                    <input type="password" name="nueva" class="form-control">
                </div>
                @error('nueva')                    
                    <small>*{{$message}}</small>
                    <br><br>                                            
                @enderror
                <br>

                <div>
                    <span>Confirme su nueva contraseña</span>
                    <input type="password" name="confirmacion" class="form-control">
                </div>
                @error('confirmacion')                    
                    <small>*{{$message}}</small>
                    <br><br>                                            
                @enderror
                <br>
                <button  class="btn btn-danger btn-sm" type="submit">Actualizar contraseña</button>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
