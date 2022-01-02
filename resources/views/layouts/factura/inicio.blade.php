@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')


@section('content_header')
    <h1>Listar Factura</h1>
@stop




@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{url('/factura/create')}}"class="btn btn-primary btb-sm">Registrar Factura</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="facturas" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">NIT</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Pago_id</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($factura as $facturas)
                        <tr>
                            <td>{{$facturas->id}}</td>
                            <td>{{$facturas->nombre}}</td>
                             <td>{{$facturas->nit}}</td>
                             <td>{{$facturas->importe}}</td>
                            <td>{{$facturas->pago_id}}</td>
                            <td>
                                {{-- <button class="btn btn-danger">Borrar</button> --}}
                                <form action="{{url('/factura/'.$facturas->id)}}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{url('/factura/'.$facturas->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
                                    <a class="btn btn-primary btn-sm" href="{{route('factura.show', $facturas)}}">Ver Factura</a>
                                    <a class="btn btn-success btn-sm" href="{{route('download.show',$facturas)}}">Download PDF</a>

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
         $('#facturas').DataTable();
        } );
    </script>
@stop


