@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Listar Pagos</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{url('/pago/create')}}"class="btn btn-primary btb-sm">Registrar Pago</a>
    </div>
</div>

<div class="card">


  <div class="card-body">
      <table class="table table-striped" id="pagos">

        <thead>

         <tr>
        <th>Id</th>
        <th>Fecha</th>
        <th>Monto Total</th>
        <th>Plan de Pago</th>
        <th>Nro de Couta</th>
        <th>Atencion</th>
        <th> Acciones</th>
        </tr>

      </thead>
<tbody>
@foreach ($pago as $pagos)
<tr>
    <td>{{$pagos->id}}</td>
    <td>{{$pagos->fecha}}</td>
    <td>{{$pagos->montoTotal}}</td>
    <td>{{$pagos->planPago_id}}</td>
    <td>{{$pagos->nroCouta}}</td>
    <td>{{$pagos->atencion_id}}</td>
    <td>
        <form action="{{url('/pago/'.$pagos->id)}}" method="post">
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
         $('#pagos').DataTable();
        } );
    </script>
@stop