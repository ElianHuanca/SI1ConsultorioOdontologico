@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Agendas</h1>
@stop

@section('content')



<div class="card">


  <div class="card-body">
      <table class="table table-striped">

        <thead>

         <tr>
	        <th scope="col">Id</th>
	        <th scope="col">Nombre</th>
	        <th scope="col"> Acciones</th>
        </tr>

      </thead>
		<tbody>
			@foreach ($odontologos as $odontologo)
			<tr>
			    <td>{{$odontologo->id}}</td>
			    <td>{{$odontologo->ci}}</td>
			    <td>
			    	{{$odontologo->nombre}}
			    	{{$odontologo->apellidoPaterno}}
			    	{{$odontologo->apellidoMaterno}}
			    </td>
			    <td >
			        <a class="btn btn-info btn-sm" href="{{route('agenda.show', $odontologo->id)}}">Ver Agenda</a>
			    </td>
			</tr>

			@endforeach

		</tbody>

     </table>
  </div>
</div>

@stop





@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop