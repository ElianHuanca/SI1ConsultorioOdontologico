@extends('adminlte::page')
@section('title', 'Consultorio')

@section('content_header')
    <h1>Lista de atenciones</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <a class="btn btn-primary" href="{{route('admin.atencions.create')}}">Agregar atencion</a>
        </div>

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>FechaInicio</th>
                        <th>FechaFin</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atencions as $atencion)
                        <tr>
                            <td>{{$atencion->id}}</td>
                            <td>{{$atencion->descripcion}}</td>
                            <td>{{$atencion->fechaInicio}}</td>
                            <td>{{$atencion->fechaFin}}</td>
                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.atencions.edit',$atencion)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.atencions.destroy', $atencion)}}" method="POST">
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