<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva</title>
</head>
<body>
    <table class= class="table table-striped table-bordered shadow-lg mt-4"  id="reserva">


        <a href="#" class="d-flex">
            <img src="{{ asset('/vendor/adminlte/dist/img/avatar.png') }}" alt="image" class="avatar">
          </a>
        <thead>
       <tr>
           <th>

           </th>
     
       </tr>

        </thead>
        <tbody>
        
        <tr>
            
           <th>  <h2 class="font-weight-bold">{{$pacientes=DB::table('table__paciente')->where('id',$reserva->paciente_id)->value('nombre')}}
                {{$pacientes=DB::table('table__paciente')->where('id',$reserva->paciente_id)->value('apellidoPaterno')}}</h2>
            </th>
           
                <p class="description">
                Reserva Id:   {{$reserva->id}} <br>
              Fecha Hora Inicio:   {{$reserva->inicio}} <br>
              Fecha Hora Fin: {{$reserva->fin}} <br>
                Odontologo:
              {{$odontologos=DB::table('tabla_odontologo')->where('id',$reserva->odontologo_id)->value('nombre')}}
              {{$odontologos=DB::table('tabla_odontologo')->where('id',$reserva->odontologo_id)->value('apellidoPaterno')}}
    
              </p>
           
        
            <p> <div class="card-description">
      
                <h7 class="font-weight-bolder">Servicios a Realizar</h7>
                <br>
                @foreach ($reserva->Servicio as $servicio)
            
                <a href="">{{$servicio->descripcion}}</a>
                <br>
            @endforeach
              </div>
            </p>
      
    </tr>

</table>
        
      
</body>
</html>