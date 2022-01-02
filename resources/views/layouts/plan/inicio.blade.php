@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Listar Planes de Pago</h1>
@stop

@section('content')


<div class="card">
        <div class="card-header">
            <a href="{{url('/plan/create')}}"class="btn btn-primary btb-sm">Registrar Plan de Pago</a>
        </div>
  </div>
<div class="card">


  <div class="card-body">
      <table class="table table-striped" id="planes">

        <thead>

         <tr>
        <th>Id</th>
        <th>Tratamiento</th>
        <th>Paciente</th>
        <th>Cantidad Coutas</th>
        <th>Monto por Couta</th>
        <th>Coutas Pagadas</th>
        <th>Saldo Pendiente</th>
        <th>Estado</th>
        <th colspan="2"> Acciones</th>
        </tr>

      </thead>
<tbody>
@foreach ($plan as $planes)
<?php
$pacienteId=DB::table('tabla_tratamiento')->where('id',$planes->tratamiento_id)->value('paciente_id');
$servicioId=DB::table('tabla_tratamiento')->where('id',$planes->tratamiento_id)->value('servicio_id');
?>
<tr>
    <td>{{$planes->id}}</td>
    <td>
      {{$actual=DB::table('tabla_tratamiento')->where('id',$planes->tratamiento_id)->value('id')}} --
      {{$servicios=DB::table('servicios')->where('id',$servicioId)->value('descripcion')}}
    </td>
    <td>
      {{$paciente=DB::table('table__paciente')->where('id',$pacienteId)->value('nombre')}}
      {{$paciente=DB::table('table__paciente')->where('id',$pacienteId)->value('apellidoPaterno')}}
    </td>
    <td>{{$planes->cantidadCoutas}}</td>
    <td>{{$planes->montoCouta}}</td>
    <td>{{$planes->coutasPagadas}}</td>
    <td>{{$planes->saldoPendiente}}</td>
    <td>
      {{$estado=DB::table('tabla_estado_plan')->where('id',$planes->estadoPlan_id)->value('descripcion')}}
    </td>

    <td >
        <a class="btn btn-info btn-sm" href="{{url('/plan/'.$planes->id.'/edit')}}"> Editar</a>
    </td>
    <td>

 <form action="{{url('/plan/'.$planes->id)}}" method="post">
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
         $('#planes').DataTable();
        } );
    </script>
@stop