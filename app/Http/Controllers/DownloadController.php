<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Factura;
use Illuminate\Http\Request;
use PDF;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
        $pdf=PDF::loadview('layouts.factura.pdf',compact('factura'),['servicios'=>$servicios,'pacienteId'=>$pacienteId,'tipo'=>$tipo]);
        return $pdf->stream('factura.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
