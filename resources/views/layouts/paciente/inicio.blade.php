@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')


@section('content_header')
    <h1>Listar Paciente</h1>
@stop

@section('content')

<div class="card">
       <div class="card-header">
        <a href="{{url('/paciente/create')}}">
            <button class="btn btn-primary">Registrar Paciente</button>
        </a>

        <a href="{{route('descargarpdf')}}">
            <button class="btn btn-success" target="_blank"  >Imprimir Pacientes</button>
        </a>
        </div>

        <div class="card-body">
        <table class="table table-striped table-bordered shadow-lg mt-4" id="pacientes">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Ci</th>
            <th scope="col">Nombre</th>
            <th scope="col">ApellidoPaterno</th>
            <th scope="col">ApellidoMaterno</th>
            <th scope="col">Sexo</th>
            <th scope="col">Telefono</th>
            <th scope="col"> Acciones</th>
        </tr>

        </thead>
        <tbody>
        @foreach ($paciente as $pacientes)
        <tr>
            <td>{{$pacientes->id}}</td>
            <td>{{$pacientes->ci}}</td>
            <td>{{$pacientes->nombre}}</td>
            <td>{{$pacientes->apellidoPaterno}}</td>
            <td>{{$pacientes->apellidoMaterno}}</td>
            <td>{{$pacientes->sexo}}</td>
            <td>{{$pacientes->telefono}}</td>
            <td>
            <form action="{{url('/paciente/'.$pacientes->id)}}" method="post">
                @can('Editar paciente')
                <a class="btn btn-info btn-sm" href="{{url('/paciente/'.$pacientes->id.'/edit')}}"> Editar</a>
                @endcan
                @csrf
                @method('delete')
                @can('Eliminar paciente')
                <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button>
                @endcan
                <a class="btn btn-success btn-sm" href="{{url('/historials/'.$pacientes->id.'/edit')}}">Historial</a>
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
      </table>
  </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $('#pacientes').DataTable();
    </script>
@endsection
