@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1>Datos de Reserva</h1>
@stop

@section('content')


<div class="col-md-4">
  <div class="card card-user">
    <div class="card-body">
      <p class="card-text">
        <div class="author">
          <a href="#" class="d-flex">
            <img src="{{ asset('/vendor/adminlte/dist/img/avatar.png') }}" alt="image" class="avatar">
          </a>
          <h5 class="font-weight-bold">{{$pacientes=DB::table('table__paciente')->where('id',$reserva->paciente_id)->value('nombre')}}
            {{$pacientes=DB::table('table__paciente')->where('id',$reserva->paciente_id)->value('apellidoPaterno')}}</h5>
          <p class="description">
            Reserva Id:   {{$reserva->id}} <br>
          Fecha Hora Inicio:   {{$reserva->inicio}} <br>
          Fecha Hora Fin: {{$reserva->fin}} <br>
            Odontologo:
          {{$odontologos=DB::table('tabla_odontologo')->where('id',$reserva->odontologo_id)->value('nombre')}}
          {{$odontologos=DB::table('tabla_odontologo')->where('id',$reserva->odontologo_id)->value('apellidoPaterno')}}

          </p>
        </div>
      </p>
      <div class="card-description">

        <h7 class="font-weight-bolder">Servicios a Realizar</h7>
        <br>
        @foreach ($reserva->Servicio as $servicio)
    
        <a href="">{{$servicio->descripcion}}</a>
        <br>
    @endforeach
      </div>
    </div>
    <div class="card-footer">
      
        <a class="btn btn-warning btn-sm" href="{{url('/reserva')}}"> Volver</a>
        <a class="btn btn-success btn-sm" href="{{route('des.pdf',$reserva)}}"  target="_blank"> Imprimir</a>
      
    </div>
  </div>
</div><!--end card user 2-->


@stop