@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>CONSULTORIO- SONRIE :)</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($rol, ['route'=>['roles.update',$rol->id],'autocomplete'=>'on', 'files'=>true, 'method'=>'patch']) !!}
                <div class="form-group">
                    {!!Form::label('name','Nombre')!!}
                    {!!Form::text('name',null,['class'=> 'form-control','placeholder' => 'Ingrese el nombre'])!!}
                    @error('name')
                    <br>
                    <span class="text-danger">{{$message}}</span>
                    @enderror <br>  <br>
                        @foreach ($permisos as $permiso)
                        {!! Form::checkbox('permisos[]' , $permiso->id, $rol->hasPermissionTo($permiso->id)) !!}
                        {{$permiso->name}}
                        <br>

                        @endforeach
                </div>
            {!!Form::submit('Actualizar Rol',['class' => 'btn btn-primary'])!!}
            {!!Form::close()!!}
        </div>
    </div>
@stop
