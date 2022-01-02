@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
    <h1> Editar Receta</h1>
@stop

@section('content')
<form method="post" action="{{url('/receta/'.$receta->id)}}">

    @csrf
    @method('PATCH')


        <h5>Descripcion:</h5>

         <input type="text"  name="descripcion" value="{{$receta->descripcion}}" class="focus border-primary  form-control" >

         @error('descripcion')
         <p>DEBE INGRESAR LA DESCRIPCION</p>
         @enderror



         <h5>Atencion:</h5>
        <select name="atencion_id" id="select-atencion" class="form-control" onchange="habilitar()" >
            <option value={{$receta->atencion_id}}>
                {{$receta->atencion_id}} --
                {{$actual=DB::table('atencions')->where('id',$receta->atencion_id)->value('descripcion')}}
            </option>
                @foreach ($atenciones as $atencion)
                    @if($atencion->id!=$receta->atencion_id)
                        <option  value="{{ $atencion->id }}">
                            {{$atencion->id}}
                            {{$atencion->descripcion}}
                        </option>
                    @endif
                @endforeach
        </select>
         @error('atencion_id')
         <p>DEBE INGRESAR LA ATENCION</p>
         @enderror
        <br>
    <button type="submit"  class="btn btn-info btn-sm">Guardar</button>

</form>
@stop

