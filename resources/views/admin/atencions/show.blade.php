<div class="form-group">
    {!!Form::label('descripcion','Descripcion')!!}
    {!!Form::text('descripcion',null,['class'=> 'form-control','placeholder' => 'Ingrese alguna Descripcion '])!!}
    @error('descripcion')
    <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group">
    
        <!--{!!Form::label('fechaInicio','Fecha')!!}
        {!!Form::text('fechaInicio',null,['class'=> 'form-control','placeholder' => 'YYYY/MM/DD'])!!}-->
        <h5>Fecha Inicio:</h5>
        <input type="datetime-local"  name="fechaInicio" class="focus border-primary  form-control" >
    @error('fechaInicio')
    <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group">
    <!--{!!Form::label('hora','Hora')!!}
    {!!Form::text('hora',null,['class'=> 'form-control','placeholder' => '00:00:00'])!!}-->
        <h5>Fecha Inicio:</h5>

        <input type="datetime-local"  name="fechaFin" class="focus border-primary  form-control" >

    @error('hora')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>