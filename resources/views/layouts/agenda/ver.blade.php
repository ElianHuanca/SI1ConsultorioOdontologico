@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Agenda para el Odontologo: {{$odontologo->nombre}} {{$odontologo->apellidoPaterno}} {{$odontologo->apellidoMaterno}}</h1>
@stop

@section('content')



<div class="card">
    <div class="card-header">
        <div class="p-3">
          <h5>Buscar Reservas por fechas</h5>
          <form method="get" action="{{route('agenda.show', $odontologo->id)}}" novalidate>
            <input type="date" name="fechaElegir">
              <button class="btn btn-primary btn-sm" type="submit">Ver por fecha</button>
           </form>
        </div>
    </div>
</div>

<div class="card">

  <div class="card-body">

      <table class="table table-striped" id="showAgenda">

        <thead>

         <tr>
            <th scope="col">Id</th>
            <th scope="col">Fecha Inicio</th>
            <th scope="col">Fecha Fin</th>
            <th scope="col">Paciente</th>
            <th >Estado</th>
            <th scope="col"> Acciones</th>
        </tr>

      </thead>
<tbody>
<?php
if ($date!=null){
  $fecha=date_create($date);
  $reserva=DB::table('tabla_reserva')->where([
            ['odontologo_id',$odontologo->id],
            ['estadoRes_id','1'],
            ['inicio','>=', date_format($fecha,'Y-m-d').' 00:00:00'],
            ['inicio','<=', date_format($fecha,'Y-m-d').' 23:59:59'],])
        ->orderBy('inicio','asc')->get();
}
?>

@foreach ($reserva as $reservas)

<tr>
    <td>{{$reservas->id}}</td>
    <td>{{$reservas->inicio}}</td>
    <td>{{$reservas->fin}}</td>
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
         $('#showAgenda').DataTable();
        } );
    </script>
@stop