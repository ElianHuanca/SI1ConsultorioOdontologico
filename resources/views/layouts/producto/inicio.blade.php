@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')


@section('content_header')
    <h1>Lista de Productos</h1>
@stop




@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{url('/producto/create')}}" class="btn btn-primary btb-sm">Registrar Producto</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="productos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Descripcion</th>
    
                        <th scope="col"> Acciones</th>
                       
                    </tr>
                </thead>

                <tbody>
                    @foreach ($producto as $productos)
                        <tr>
                            <td>{{$productos->id}}</td>
                            <td>{{$productos->descripcion}}</td>
                             
                            <td>
                                {{-- <button class="btn btn-danger">Borrar</button> --}}
                                <form action="{{url('/producto/'.$productos->id)}}"method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{url('/producto/'.$productos->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar">Eliminar</button> 
                        
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
         $('#productos').DataTable();
        } );
    </script> 
@stop


