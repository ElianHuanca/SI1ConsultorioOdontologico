@extends('adminlte::page')
@section('title', 'Consultorio')

@section('content_header')
    <h1>Registrar Atencion</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{url('/atencions')}}" novalidate >
                @csrf
            <h5>Diagnostico:</h5>
            <input type="String"  name="descripcion" class="focus border-primary  form-control" >
            @error('descripcion')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <br>
            <button  class="btn btn-danger" type="submit">Registrar</button>
            <!--a class="btn btn-secondary" href="/atencions">Cancelar</a -->
            </form>
        </div>
    </div>
@stop