<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Pago;
use App\Models\Plan;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pago']=Pago::paginate(50);
        return view('layouts.pago.inicio',$datos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $planes=DB::table('tabla_plan_pago')->where('estadoPlan_id',1)->get();
        $atenciones=DB::table('atencions')->get();
        return view('layouts.pago.crear',['planes'=>$planes,'atenciones'=>$atenciones]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $dato=request()->validate([
            'montoTotal'=>['required'],
            'planPago_id'=>['required'],
            'atencion_id'=>['required'],



            ]);

            $datosPago=request()->except('_token');
            Pago::insert($datosPago);
        */
        $atencion=request('atencion_id');
        $planPago=request('planPago_id');
        $monto=0;
        $nroCouta=null;
        if ($planPago===null) {
            $reservaId=DB::table('atencions')->where('id',$atencion)->value('reserva_id');
            $servicios=DB::table('reserva_servicio')->where('reserva_id',$reservaId)->get();

            foreach ($servicios as $servicio) {
                $servicioId=DB::table('servicios')->where('id',$servicio->servicio_id)->value('id');
                $precio=DB::table('servicios')->where('id',$servicioId)->value('precio');
                $monto+=$precio;
            }
        }
        if($atencion===null){
            $monto=DB::table('tabla_plan_pago')->where('id',$planPago)->value('montoCouta');
            $nroCouta=DB::table('tabla_plan_pago')->where('id',$planPago)->value('coutasPagadas');
            $nroCouta+=1;
        }
        $plan=Pago::create([
                'planPago_id'=> request('planPago_id'),
                'atencion_id'=> request('atencion_id'),
                'montoTotal'=>$monto,
                'nroCouta'=> $nroCouta,
        ]);
        if($atencion===null){
            $price=DB::table('tabla_plan_pago')->where('id',$planPago)->value('saldoPendiente');
            $cantCoutas=DB::table('tabla_plan_pago')->where('id',$planPago)->value('cantidadCoutas');
            $estado=1;
            if ($cantCoutas===$nroCouta+1){
                $estado=2;
            }
            DB::table('tabla_plan_pago')->where('id',$planPago)->update([
            'coutasPagadas'=> $nroCouta+1,
            'saldoPendiente'=> $price-$monto,
            'estadoPlan_id'=>$estado,
            ]);
        }

        return redirect('pago');
            activity()->useLog('Pago')->log('created');
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Pago::all()->last()->id;
            $lastActivity->save();

            return redirect('pago');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deudas  $deudas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deudas  $deudas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pago=Pago::findOrFail($id);
        $planes=DB::table('tabla_plan_pago')->get();
        return view('layouts.pago.editar',compact('pago'),['planes'=>$planes]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deudas  $deudas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //no se usa
        $dato=request()->validate([
            'montoTotal'=>['required'],
            'planPago_id'=>['required'],
            'atencion_id'=>['required'],
            'fecha'=>['required'],


            ]);
           DB::table('tabla_pago')->where('id',$id)->update([
                'montoTotal'=>$dato['montoTotal'],
                'planPago_id'=> $dato['planPago_id'],
                'atencion_id'=>$dato['atencion_id'],
                'fecha'=>$dato['fecha'],


                ]);

                activity()->useLog('Pago')->log('updated')->subject();
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();

                return redirect('pago');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deudas  $deudas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atencion=DB::table('tabla_pago')->where('id',$id)->value('atencion_id');
        $planPago=DB::table('tabla_pago')->where('id',$id)->value('planPago_id');
        $monto=0;
        $nroCouta=null;
        if($atencion===null){
            $monto=DB::table('tabla_plan_pago')->where('id',$planPago)->value('montoCouta');
            $nroCouta=DB::table('tabla_plan_pago')->where('id',$planPago)->value('coutasPagadas');
        }
        Pago::destroy($id);


        if($atencion===null){
            $price=DB::table('tabla_plan_pago')->where('id',$planPago)->value('saldoPendiente');
            $cantCoutas=DB::table('tabla_plan_pago')->where('id',$planPago)->value('cantidadCoutas');
            $estado=1;

            DB::table('tabla_plan_pago')->where('id',$planPago)->update([
            'coutasPagadas'=> $nroCouta-1,
            'saldoPendiente'=> $price+$monto,
            'estadoPlan_id'=>$estado,
            ]);
        }
        activity()->useLog('Pago')->log('deleted')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('pago');
    }
}
