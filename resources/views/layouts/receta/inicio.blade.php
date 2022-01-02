@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Listar Recetas</h1>
@stop

@section('content')


<div class="card">
  <div class="card-header">
      <a href="{{url('/receta/create')}}"class="btn btn-primary btb-sm">Registrar Receta</a>
  </div>
</div>
<div class="card">


  <div class="card-body">
      <table class="table table-striped" id="recetas">

        <thead>

         <tr>
        <th>Id</th>
        <th>Descripcion</th>
        <th>Atencion</th>
        <th colspan="2"> Acciones</th>
        </tr>

      </thead>
<tbody>
@foreach ($receta as $recetas)
<tr>
    <td>{{$recetas->id}}</td>
    <td>{{$recetas->descripcion}}</td>
    <td>
      {{$recetas->atencion_id}} --
      {{$atencion=DB::table('atencions')->where('id',$recetas->atencion_id)->value('descripcion')}}
    </td>
    <td >
        <a class="btn btn-info btn-sm" href="{{url('/receta/'.$recetas->id.'/edit')}}"> Editar</a>
    </td>
    <td>

 <form action="{{url('/receta/'.$recetas->id)}}" method="post">
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
         $('#recetas').DataTable();
        } );
    </script>
@stop