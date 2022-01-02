@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Consultorio</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Lista de Permisos</h3>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="permisos">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre de Permiso</th>                    
                </tr>
            </thead>

            <tbody>
                @foreach ($permisos as $permiso)
                    <tr>
                        <td>{{$permiso->id}}</td>
                        <td>{{$permiso->name}}</td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
         $('#permisos').DataTable();
        } );
    </script> 
@stop