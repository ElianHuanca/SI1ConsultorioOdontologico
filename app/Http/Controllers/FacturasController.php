<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['factura']=Factura::paginate(50);
        return view('layouts.factura.inicio',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pagos=DB::table('tabla_pago')->get();
        $pacientes=DB::table('table__paciente')->get();
        return view('layouts.factura.crear',['pagos'=>$pagos,'pacientes'=>$pacientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago=request('pago_id');
        $importe=DB::table('tabla_pago')->where('id',$pago)->value('montoTotal');
        $atencion=DB::table('tabla_pago')->where('id',$pago)->value('atencion_id');
        $reserva=DB::table('atencions')->where('id',$atencion)->value('reserva_id');
        $servicios=DB::table('reserva_servicio')->where('reserva_id',$reserva)->get();
        $planPago=DB::table('tabla_pago')->where('id',$pago)->value('planPago_id');
        $tratamiento=DB::table('tabla_plan_pago')->where('id',$planPago)->value('tratamiento_id');
        $nroCouta=DB::table('tabla_pago')->where('id',$pago)->value('nroCouta');
        if ($atencion===null){
            $descripcion="TratamientoId: ".$tratamiento."Plan: ".$planPago." NroCouta: ".$nroCouta;
        }
        if ($planPago===null){
            $descripcion="Atencion: ".$atencion;
        }
        $factura=Factura::create([
                'nombre'=> request('nombre'),
                'nit'=> request('nit'),
                'pago_id'=> $pago,
                'importe'=> $importe,
                'descripcion'=> $descripcion,
            ]);
        return redirect('factura');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura=Factura::findOrFail($id);
        $pago=DB::table('tabla_factura')->where('id',$id)->get();
        $pagoId=DB::table('tabla_factura')->where('id',$id)->value('pago_id');
        $atencion=DB::table('tabla_pago')->where('id',$pagoId)->value('atencion_id');
        $reserva=DB::table('atencions')->where('id',$atencion)->value('reserva_id');
        $servicios=DB::table('reserva_servicio')->where('reserva_id',$reserva)->get();
        $planPago=DB::table('tabla_pago')->where('id',$pagoId)->value('planPago_id');
        $tratamiento=DB::table('tabla_plan_pago')->where('id',$planPago)->value('tratamiento_id');
        $tipo="";
        if ($atencion===null){
            $pacienteId=DB::table('tabla_tratamiento')->where('id',$tratamiento)->value('paciente_id');
            $paciente=DB::table('table__paciente')->where('id',$pacienteId)->get();
            $tipo="Tratamiento";
        }
        if ($planPago===null){
            $pacienteId=DB::table('tabla_reserva')->where('id',$reserva)->value('paciente_id');
            $paciente=DB::table('table__paciente')->where('id',$pacienteId)->get();
            $tipo="Atencion";
        }
        return view('layouts.factura.ver',compact('factura'),['servicios'=>$servicios,'pacienteId'=>$pacienteId,'tipo'=>$tipo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $factura=Factura::findOrFail($id);
        $pagos=DB::table('tabla_pago')->get();
        $pacientes=DB::table('table__paciente')->get();
        return view('layouts.factura.editar',compact('factura'),['pagos'=>$pagos,'pacientes'=>$pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pago=request('pago_id');
        $importe=DB::table('tabla_pago')->where('id',$pago)->value('montoTotal');
        $atencion=DB::table('tabla_pago')->where('id',$pago)->value('atencion_id');
        $reserva=DB::table('atencions')->where('id',$atencion)->value('reserva_id');
        $servicios=DB::table('reserva_servicio')->where('reserva_id',$reserva)->get();
        $planPago=DB::table('tabla_pago')->where('id',$pago)->value('planPago_id');
        $tratamiento=DB::table('tabla_plan_pago')->where('id',$planPago)->value('tratamiento_id');
        $serTra=DB::table('tabla_tratamiento')->where('id',$tratamiento)->value('servicio_id');
        $serTraDes=DB::table('servicios')->where('id',$serTra)->value('descripcion');
        $serTraPrice=DB::table('servicios')->where('id',$serTra)->value('precio');
        if ($atencion===null){
            $descripcion=$serTraDes."  =  ".$serTraPrice;
        }
        if ($planPago===null){
            $descripcion="";
            foreach ($servicios as $servicio){
                $serAteDes=DB::table('servicios')->where('id',$servicio)->value('descripcion');
                $serAtePrice=DB::table('servicios')->where('id',$servicio)->value('precio');
                $descripcion+=$serAteDes."  =  ".$serAtePrice."\n";
            }
        }
        $factura=Factura::findOrFail($id);
        DB::table('tabla_factura')->where('id',$id)->update([
            'nombre'=> request('nombre'),
                'nit'=> request('nit'),
                'pago_id'=> $pago,
                'importe'=> $importe,
                'descripcion'=> $descripcion

        ]);


        return redirect('factura');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facturas  $facturas
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Factura::destroy($id);
        return redirect('factura');
    }
}
