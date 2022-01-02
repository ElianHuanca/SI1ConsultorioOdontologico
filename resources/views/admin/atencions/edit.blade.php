@extends('adminlte::page')
@section('title', 'Consultorio')

@section('content_header')
    <h1>Editar atencion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!!Form::model($atencion,['route' => ['admin.atencions.update',$atencion],'method' => 'put'])!!}                
                @include('admin.atencions.show')
                {!!Form::submit('Actualizar Registro',['class' => 'btn btn-primary'])!!}    
            {!!Form::close()!!}
        </div>
    </div>
@stop