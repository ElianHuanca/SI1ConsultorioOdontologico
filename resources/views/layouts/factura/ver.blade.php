@extends('adminlte::page')

@section('title', 'Consultorio-Sonrie')

@section('content_header')
	<div class="container">
		<div class="row justify-content-start">
			<div class="col-2">
				<a class="btn btn-danger btn-sm" href="{{route('factura.index')}}">Volver</a>
			</div>
		</div>
	</div>
@stop
<?php
	$pagoId=DB::table('tabla_factura')->where('id',$factura->id)->value('pago_id');
	$planPagoId=DB::table('tabla_pago')->where('id',$pagoId)->value('planPago_id');
	$tratamientoId=DB::table('tabla_plan_pago')->where('id',$planPagoId)->value('tratamiento_id');
	$servicioId=DB::table('tabla_tratamiento')->where('id',$tratamientoId)->value('servicio_id');
?>
@section('content')
<div>
	<div class="container " style="background-color: white">
		<div class="row justify-content-center border border-primary rounded-top">
			<div class="col justify-content-center">

				<div class="row justify-content-center mt-2 text-center">
					<div class="col">
						<h3 class="font-weight-bold">CONSULTORIO ODONTOLOGO "CONSULTORIO-SONRIE" S.R.L</h3>
					</div>
				</div>

				<div class="row  align-items-center">
					<div class="col-1">
						<img class="brand-image img-circle  " style="width: 80px" src="https://i.pinimg.com/originals/8c/20/ea/8c20eaa83e0d3bde17fc9864aed000f1.jpg">
					</div>
					<div class="col-3  d-flex">
						<h3>CONSULTORIO SONRIE</h3>
					</div>
				</div>

				<div class="row justify-content-between mx-1 mb-2">
					<div class="col-4 align-items-center">
						<div class="row ">
							<h5>Casa Matriz</h5>
						</div>
						<div class="row">
							<h5>Av.Roca y Coronado #1234</h5>
						</div>
						<div class="row">
							<h5>Telefono: 3526482</h5>
						</div>
						<div class="row">
							<h5>Santa Cruz - Bolivia</h5>
						</div>
					</div>
					<div class="col-4 ">
						<div class="row">
							<h5>NIT: 12345678</h5>
						</div>
						<div class="row">
							<h5>Nro Factura: {{$factura->id}}</h5>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="row justify-content-center border border-primary  border-top-0 border-bottom-0">
			<div class="col justify-content-center">

				<div class="row justify-content-center mt-2">
					<div class="col text-center ">
						<h3 class="font-weight-bold">FACTURA</h3>
					</div>
				</div>

				<div class="row  align-items-center justify-content-between">
					<div class="col-4">
						<h5>Fecha de Emision: {{$factura->fecha}}</h5>
					</div>
					<div class="col-4">
						<h5>NIT: {{$factura->nit}}</h5>
					</div>
				</div>

				<div class="row  align-items-center justify-content-between">
					<div class="col-4">
						<h5>Se??or(es): {{$factura->nombre}}</h5>
					</div>
					<div class="col-4">
						<h5>Codigo Paciente: {{$pacienteId}}</h5>
					</div>
				</div>
				<div class="row  align-items-center justify-content-between">
					<div class="col-4">
						<h5>Nro de Pago: {{$factura->pago_id}}</h5>
					</div>
					<div class="col-4">
						<h5>Categoria: {{$tipo}}</h5>
					</div>
				</div>

				<div class="row my-2">
					<div class="col">
						@if ($planPagoId===null)
							<table class="table table-striped"  style="width:100%">
								<thead>
									<tr>
										<th>CODIGO</th>
										<th>DESCRIPCION</th>
										<th>IMPORTE Bs</th>
									</tr>

								</thead>
								<tbody>
									@foreach ($servicios as $servicio)
									<?php
										$serviceId=DB::table('servicios')->where('id',$servicio->servicio_id)->value('id');
										$serviceDes=DB::table('servicios')->where('id',$servicio->servicio_id)->value('descripcion');
										$servicePrice=DB::table('servicios')->where('id',$servicio->servicio_id)->value('precio');
									?>
										<tr>
											<td>{{$serviceId}}</td>
											<td>{{$serviceDes}}</td>
											<td>{{$servicePrice}}</td>
										</tr>
									@endforeach
									<tr>
										<td colspan="2">IMPORTE TOTAL</td>
										<td>{{$factura->importe}}</td>
									</tr>
								</tbody>
							</table>
						@endif
						@if ($planPagoId!=null)
							<table class="table table-striped"  style="width:100%">
								<thead>
									<tr>
										<th>CODIGO</th>
										<th>DESCRIPCION</th>
										<th>N?? COUTA</th>
										<th>IMPORTE COUTA Bs</th>
									</tr>

								</thead>
								<tbody>
									<tr>
										<td>{{$tratamientoId}}</td>
										<td>{{$descripcionTra=DB::table('servicios')->where('id',$servicioId)->value('descripcion')}}</td>
										<td>
											{{$nroCouta=DB::table('tabla_pago')->where('id',$pagoId)->value('nroCouta')}}
											/
											{{$cantCoutas=DB::table('tabla_plan_pago')->where('id',$planPagoId)->value('cantidadCoutas')}}
										</td>
										<td>{{$factura->importe}}</td>
									</tr>
									<tr>
										<td colspan="3">IMPORTE TOTAL</td>
										<td>{{$factura->importe}}</td>
									</tr>
								</tbody>
							</table>
						@endif
					</div>
				</div>


			</div>
		</div>
		<div class="row border justify-content-between align-items-center  border-primary rounded-bottom">
			<div class="col-6 m-1">
				<div class="row m-1">
					<p class="h6 font-italic">ESTA FACTURA CONTRIBUYE AL DESARROLLO DEL PAIS, EL USO ILICITO DE ESTA SERA SANCIONADO DE ACUERDO A LEY</p>
				</div>
				<div class="row m-1">
					<p class="h6 font-italic">LEY Nro 453: EL PROVEEDOR DEBERA SUMISTRAR EL SERVICIO EN LAS MODALIDADES Y TERMINOS OFERTADOS O CONVENIDOS</p>
				</div>
			</div>
			<div class="col-2 m-1">
				<img style="width: 120px" src="data:image/png;base64,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">
			</div>
		</div>
	</div>
</div>
<br>
<br>

@stop

