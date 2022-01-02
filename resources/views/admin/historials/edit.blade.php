@extends('adminlte::page')
@section('title', 'Consultorio')

@section('content_header')
    <h1 style="text-align:center;">Historial Del Paciente</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 style="text-align:center;">Datos Del Paciente</h4>
    </div>
    <div class="card-body">
        <form method="post" action="{{url('/paciente/'.$paciente->id)}}">
        @csrf
        @method('PATCH')
        <label>CI:</label>
        <input type="text"  name="ci" value="{{$paciente->ci}}" class="focus border-primary  form-control" readonly="true" >
        <label>Nombre</label>
        <input type="text"   name="nombre" value="{{$paciente->nombre}}" class="focus border-primary  form-control" readonly="true">
        <label>Apellido Paterno:</label>
        <input type="text"  name="apellidoPaterno" value=" {{$paciente->apellidoPaterno}}"  class="focus border-primary  form-control" readonly="true">
        <label>Apellido Materno:</label>
        <input type="text"  name="apellidoMaterno" value=" {{$paciente->apellidoMaterno}}" class="focus border-primary  form-control" readonly="true">
        <label>Telefono:</label>
        <input type="text" name="telefono" value=" {{$paciente->telefono}}" class="focus border-primary  form-control" readonly="true">
        </form>
        <br>
        <a href="{{url('/paciente')}}" class="btn btn-primary">Volver</a>
<<<<<<< HEAD
        <a class="btn btn-success " href="{{route('descarga',$paciente)}}"  target="_blank"> Imprimir</a>
=======
        <a class="btn btn-success " href="{{route('descarga',$paciente)}}"  target="_blank"> Imprimir</a> 
       
     
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
    </div>
</div>
<div class="card">
        <div class="card-header">
           <h4 style="text-align:center;">Atenciones Del Paciente</h4>
              </div>
                   <div class="card-body">
                       <table class="table table-striped table-bordered shadow-lg mt-4" id="historials">
                <thead>
                    <tr>
                        <th scope="col">NroAten.</th>
                        <th scope="col">Diagnostico</th>
                        <th scope="col">FechaInicio</th>
                        <th scope="col">FechaFin</th>
                        <th scope="col">Odontologo</th>
                        <th scope="col">receta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($atencions as $atencion)
                        <tr>
                            <td>{{$atencion->id}}</td>
                            <td>{{$atencion->descripcion}}</td>
                            <td>{{$atencion->fechaInicio}}</td>
                            <td>{{$atencion->fechaFin}}</td>
                            @foreach($reservas as $reserva)
                                @if($reserva->id == $atencion->reserva_id)
                                    @foreach($odontologos as $odontologo)
                                        @if($odontologo->id == $reserva->odontologo_id)
                                            <td>{{$odontologo->nombre}}  {{$odontologo->apellidoPaterno}}</td>
                                            @break;
                                        @endif
                                    @endforeach
                                    @break;
                                @endif
                            @endforeach
                            @foreach($recetas as $receta)
                                @if($receta->atencion_id == $atencion->id)
                                    <td>{{$receta->descripcion}} </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
</div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#historials').DataTable();
    </script>
@endsection