@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')


@section('content_header')
    <h1>Listar Odontologos</h1>
@stop




@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{url('/odontologo/create')}}"class="btn btn-primary btb-sm">  </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="odontologos" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">CI</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col"> </th>
                        <th>Estado</th>
                        <th scope="col"> Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($odontologo as $odontologos)
                        <tr>
                            <td>{{$odontologos->id}}</td>
                            <td>{{$odontologos->ci}}</td>
                             <td>{{$odontologos->nombre}}</td>
                             <td>{{$odontologos->apellidoPaterno}}</td>
                            <td>{{$odontologos->apellidoMaterno}}</td>
                             <td>{{$odontologos->sexo}}</td>
                             <td>{{$odontologos->telefono}}</td>
                            <td>
                                @if ($odontologos->estado==='A')
                                    <th><button class="btn btn-warning btn-sm" >Activo</button></th>
                                @else
                                    <th><button class="btn btn-success btn-sm" >Inactivo</button></th>
                                @endif

                            </td>
                            <td>
                                {{-- <button class="btn btn-danger">Borrar</button> --}}
                                <form action="{{url('/odontologo/'.$odontologos->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a class="btn btn-primary btn-sm" href="{{route('odontologo.show', $odontologos)}}">Ver Agenda</a>
                                    @can('Editar odontologo')
                                    <a href="{{url('/odontologo/'.$odontologos->id.'/edit')}}"class="btn btn-info btn-sm">Editar</a>

                                    @endcan
                                    @can('Eliminar odontologo')
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
         $('#odontologos').DataTable();
        } );
    </script>
@stop


