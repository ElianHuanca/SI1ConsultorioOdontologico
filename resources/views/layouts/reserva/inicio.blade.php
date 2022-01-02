@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Listar Reservas</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('/reserva/create')}}"class="btn btn-primary btb-sm">Registrar Reserva</a>
        </div>
  </div>
<div class="card">
  <div class="card-body">
      <table class="table table-striped" id="reservas" >

        <thead>

          <tr>
            <th scope="col">Id</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>
            <th scope="col">Odontologo</th>
            <th scope="col">Paciente</th>
            <th>Estado</th>
            <th scope="col"> Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reserva as $reservas)

            <tr>
              <td>{{$reservas->id}}</td>
              <td>{{$reservas->inicio}}</td>
              <td>{{$reservas->fin}}</td>
              <td>
                {{$odontologos=DB::table('tabla_odontologo')->where('id',$reservas->odontologo_id)->value('nombre')}}
                {{$odontologos=DB::table('tabla_odontologo')->where('id',$reservas->odontologo_id)->value('apellidoPaterno')}}
              </td>
              <td>
                {{$pacientes=DB::table('table__paciente')->where('id',$reservas->paciente_id)->value('nombre')}}
                {{$pacientes=DB::table('table__paciente')->where('id',$reservas->paciente_id)->value('apellidoPaterno')}}
              </td>
              <td>
                {{$estados=DB::table('tabla_estado_res')->where('id',$reservas->estadoRes_id)->value('descripcion')}}
              </td>
              <td >
                  <a class="btn btn-info btn-sm" href="{{url('/reserva/'.$reservas->id.'/edit')}}"> Editar</a>
              </td>

              <td >
                  <a class="btn btn-warning btn-sm" href="{{url('/reserva/'.$reservas->id)}}"> Ver</a>
              </td>
              <td>
                <form action="{{url('/reserva/'.$reservas->id)}}" method="post">
                  @csrf
                  @method('delete')
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
         $('#reservas').DataTable();
        } );
    </script>
@stop