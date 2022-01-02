<<<<<<< HEAD
=======

>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>HistorialPaciente</title>
  </head>

  <style>
    h3{
     color: rgb(5, 188, 194);

    }
    h4{
        font: oblique bold 170% cursive
        color: rgb(0, 1, 3);
       }
<<<<<<< HEAD

=======
       
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442

       #his{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100;
    }
    #his td, #his th {
        border:1px solid rgb(238, 231, 231);
        padding: 8px;
        width: 10px;
<<<<<<< HEAD

=======
       
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
    }
    #his th{
     padding-top:12px;
     padding-bottom:12px;
     text-align: left;
     background-color: rgb(5, 188, 194);
     color: rgb(255, 255, 255);
    }
</style>

	<body>
		<section class="container">
			<div class="container " style="background-color: white">
				<div class="row justify-content-center border border-primary rounded-top">
					<div class="col justify-content-center">

						<div class="row justify-content-center mt-2 text-center">
							<div class="col">
								<h3 class="font-weight-bold"   >HISTORIAL CLÍNICO "CONSULTORIO-SONRIE." </h3>
							</div>
<<<<<<< HEAD
                            <div class="col-1" style="float:right">
                                <a href="#" class="d-flex">
                                    <img src="{{ asset('/vendor/adminlte/dist/img/Diente11.jpeg') }}"  style="width: 120px" alt="image" class="brand-image img-circle  ">
=======
                            <div class="col-1" style="float:right">     
                                <a href="#" class="d-flex">
                                    <img src="{{ asset('/vendor/adminlte/dist/img/Diente11.png') }}"  style="width: 120px" alt="image" class="brand-image img-circle  ">
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
                                  </a>
                            </div>
						</div>
						<br>

						<br>
<<<<<<< HEAD

=======
						
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
					</div>
				</div>
				<br>
				<div class="row justify-content-center border border-primary  border-top-0 border-bottom-0">
					<div class="col justify-content-center">

						<div class="row justify-content-center mt-2">
							<div class="col text-center ">
								<h4 class="font-weight-bold">DATOS DEL PACIENTE.</h4>
							</div>
						</div>

						<div class="row  align-items-center justify-content-between">
							<div class="col-4">
								<h6 class="font-weight-bold">Ci:
                                    <h6 class="font-weight-normal">{{$paciente->ci}}</h6>
								</h6>
							</div>
<<<<<<< HEAD

=======
							
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
						</div>

						<div class="row  align-items-center justify-content-between">
							<div class="col-4">
								<h6 class="font-weight-bold">Nombre:
                                    <h6 class="font-weight-normal">{{$paciente->nombre}}</h6>
								</h6>
							</div>
							<div class="col-4" style="float:right">
								<h6 class="font-weight-bold">Codigo Paciente:
<<<<<<< HEAD
                                    <h6 class="font-weight-normal">{{$paciente->id}}</h6>
=======
                                    <h6 class="font-weight-normal">{{$paciente->id}}</h6> 
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
								</h6>
							</div>
						</div>

						<div class="row  align-items-center justify-content-between">
							<div class="col-4">
								<h6 class="font-weight-bold">Apellidos:
<<<<<<< HEAD
                                    <h6 class="font-weight-normal">{{$paciente->apellidoPaterno}}  {{$paciente->apellidoMaterno}}</h6>
=======
                                    <h6 class="font-weight-normal">{{$paciente->apellidoPaterno}}  {{$paciente->apellidoMaterno}}</h6>	
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
								</h6>
							</div>
							<div class="col-4" style="float:right">
								<h6 class="font-weight-bold">Telefono:
<<<<<<< HEAD
                                    <h6 class="font-weight-normal">{{$paciente->telefono}}</h6>
=======
                                    <h6 class="font-weight-normal">{{$paciente->telefono}}</h6>	
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
								</h6>
							</div>
						</div>

						<br><br>

                        <h4 style="text-align:center;"  class="font-weight-bold">ATENCIONES DEL PACIENTE.</h4>
                        <br>

                        <div class="row justify-content-center border border-primary  border-top-0 border-bottom-0">
                            <table class="table table-striped"  id="his" >
                                <thead>
                                    <tr>
                                        <th>NroAten</th>
                                        <th>Diagnostico</th>
                                        <th>FechaInicio</th>
                                        <th>FechaFin</th>
                                        <th>Odontologo</th>
                                        <th>receta</th>
                                    </tr>
<<<<<<< HEAD

=======
                
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
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
<<<<<<< HEAD
                                                        @break;
=======
                                                        @break; 
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
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
<<<<<<< HEAD

                                </tbody>
                            </table>
=======
                                    
                                </tbody>
                            </table>	
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
                      </div>

					</div>
				</div>
			</div>
		</section>
<<<<<<< HEAD


=======
       
       
>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442

		<br>
		<br>
		<!-- Bootstrap JavaScript Libraries -->
	    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	  </body>
<<<<<<< HEAD
	</html>
=======
	</html>


>>>>>>> 19d7cb86666d0a862c766b3263fc7b82ae72f442
