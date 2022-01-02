@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')


@section('content_header')
    <h1>Listar Recepcionista</h1>
@stop




@section('content')
    @can('Crear recepcionista')
        <div class="card">
            <div class="card-header">
                <a href="{{url('/recepcionista/create')}}"class="btn btn-primary btb-sm">Registrar Recepcionista</a>
            </div>
        </div>
    @endcan

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="recepcionistas" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">CI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col"> Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($recepcionista as $recepcionistas)
                        <tr>
                            <td>{{$recepcionistas->id}}</td>
                            <td>{{$recepcionistas->ci}}</td>
                              <td>{{$recepcionistas->nombre}}</td>
                              <td>{{$recepcionistas->apellidoPaterno}}</td>
                                <td>{{$recepcionistas->apellidoMaterno}}</td>
                                   <td>{{$recepcionistas->sexo}}</td>
                                  <td>{{$recepcionistas->telefono}}</td>

                            <td>
                                {{-- <button class="btn btn-danger">Borrar</button> --}}
                                <form action="{{url('/recepcionista/'.$recepcionistas->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    @can('Editar recepcionista')
                                    <a href="{{url('/recepcionista/'.$recepcionistas->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
                                    @endcan
                                    @can('Eliminar recepcionista')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                                    @endcan
                        
                                </form>
                            </td>                            
                          
                            
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
         $('#recepcionistas').DataTable();
        } );
    </script> 
@stop


