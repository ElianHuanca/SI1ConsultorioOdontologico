@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Listar Tratamientos</h1>
@stop

@section('content')

<div class="card">
  <div class="card-header">
      <a href="{{url('/tratamiento/create')}}"class="btn btn-primary btb-sm">Registrar Tratamiento</a>
  </div>
</div>

<div class="card">


  <div class="card-body">
      <table class="table table-striped" id="tratamientos">

        <thead>

         <tr>
        <th>Id</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Estado</th>
        <th>Servicio</th>
        <th>Paciente</th>
        <th>Odontologo</th>
        <th colspan="2"> Acciones</th>
        </tr>

      </thead>
<tbody>
@foreach ($tratamiento as $tratamientos)
<tr>
    <td>{{$tratamientos->id}}</td>
    <td>{{$tratamientos->fechaInicio}}</td>
    <td>{{$tratamientos->fechaFin}}</td>
    <td>
      {{$estados=DB::table('tabla_estado_tra')->where('id',$tratamientos->estadoTra_id)->value('descripcion')}}
    </td>
    <td>
      {{$servicios=DB::table('servicios')->where('id',$tratamientos->servicio_id)->value('descripcion')}}
    </td>
    <td>
        {{$pacientes=DB::table('table__paciente')->where('id',$tratamientos->paciente_id)->value('nombre')}}
        {{$pacientes=DB::table('table__paciente')->where('id',$tratamientos->paciente_id)->value('apellidoPaterno')}}
    </td>
    <td>
        {{$odontologos=DB::table('tabla_odontologo')->where('id',$tratamientos->odontologo_id)->value('nombre')}}
        {{$odontologos=DB::table('tabla_odontologo')->where('id',$tratamientos->odontologo_id)->value('apellidoPaterno')}}
    </td>
    <td >
        <a class="btn btn-info btn-sm" href="{{url('/tratamiento/'.$tratamientos->id.'/edit')}}"> Editar</a>
    </td>
    <td>

 <form action="{{url('/tratamiento/'.$tratamientos->id)}}" method="post">
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
         $('#tratamientos').DataTable();
        } );
    </script>
@stop