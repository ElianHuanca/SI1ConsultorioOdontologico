@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')


@section('content_header')
    <h1>Listar Servicios</h1>
@stop




@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{url('/servicio/create')}}" class="btn btn-primary btb-sm">Registrar Servicio</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="servicios" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Duracion Aproximada</th>
                     
                        
                        <th scope="col"></th>
                        <th>Estado</th>
                        <th scope="col"> Acciones</th>
                       
                    </tr>
                </thead>

                <tbody>
                    @foreach ($servicio as $servicios)
                        <tr>
                            <td>{{$servicios->id}}</td>
                             <td>{{$servicios->descripcion}}</td>
                              <td>{{$servicios->precio}}</td>
                              <td>{{$servicios->duracionAproximada}}</td>
                              <td>
                                @if ($servicios->estado==='A')
                                 <th><button class="btn btn-warning btn-sm" >Activo</button></th>
                                     @else
                                     <th><button class="btn btn-success btn-sm" >Inactivo</button></th> 
                                 @endif
                                
                             </td>
                            <td>
                                {{-- <button class="btn btn-danger">Borrar</button> --}}
                                <form action="{{url('/servicio/'.$servicios->id)}}"method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{url('/servicio/'.$servicios->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>
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
         $('#servicios').DataTable();
        } );
    </script> 
@stop


