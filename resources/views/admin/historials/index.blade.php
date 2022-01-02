@extends('adminlte::page')
@section('title', 'Consultorio')

@section('content_header')
    <h1>Lista de historiales</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-head">
            <a class="btn btn-succesfull" href="{{route('admin.historials.create')}}">Agregar historial</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>fechaRegistro</th>
                        <th>Paciente</th>
                        <th>Atencion</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($historials as $historial)
                        <tr>
                            <td>{{$historial->id}}</td>
                            <td>{{$historial->fechaRegistro}}</td>
                            @foreach($pacientes as $paciente)
                                @if($historial->paciente_id == $paciente->id)
                                    <td>{{$paciente->nombre}}</td>
                                    @break;
                                @endif
                            @endforeach
                            <td>{{$historial->atencion_id}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.historials.edit',$historial)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.historials.destroy', $historial)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop