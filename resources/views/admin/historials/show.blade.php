<div class="form-group">
    {!!Form::label('fechaRegistro','Fecha Registro')!!}
    {!!Form::text('fechaRegistro',null,['class'=> 'form-control','placeholder' => 'YYYY/MM/DD'])!!}
    @error('fechaRegistro')
    <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group">
    {!!Form::label('paciente_id','Paciente')!!}
    {!!Form::text('paciente_id',null,['class'=> 'form-control','placeholder' => 'CI Paciente'])!!}
    @error('paciente_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
    </div>
    <div class="form-group">
    {!!Form::label('atencion_id','ID De La Atencion')!!}
    {!!Form::text('atencion_id',null,['class'=> 'form-control','placeholder' => 'ID Atencion'])!!}
    @error('atencion_id')
    <span class="text-danger">{{$message}}</span>
    @enderror
</div>