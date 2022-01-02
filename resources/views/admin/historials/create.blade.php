@extends('adminlte::page')
@section('title', 'Consultorio')

@section('content_header')
    <h1>Registrar Atencion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!!Form::open(['route'=>'admin.historials.store'])!!}
                @include('admin.historials.show')    
                {!!Form::submit('Registrar atencion',['class' => 'btn btn-primary'])!!}    
            {!!Form::close()!!}
        </div>
    </div>
@stop