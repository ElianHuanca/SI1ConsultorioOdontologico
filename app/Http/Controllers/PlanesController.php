<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
class PlanesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['plan']=Plan::paginate(50);
        return view('layouts.plan.inicio',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tratamientos=DB::table('tabla_tratamiento')->where('estadoTra_id',1)->get();
        return view('layouts.plan.crear',['tratamientos'=>$tratamientos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratamiento=request('tratamiento_id');
        $price=DB::table('tabla_tratamiento')->where('id',$tratamiento)->value('precio');
        $cant=request('cantidadCoutas');
        $monto=$price/$cant;
        $plan=Plan::create([
                'cantidadCoutas'=> request('cantidadCoutas'),
                'tratamiento_id'=> request('tratamiento_id'),
                'montoCouta'=> $monto,
                'coutasPagadas'=> 0,
                'saldoPendiente'=> $price,
                'estadoPlan_id'=> 1,
        ]);
        /*
        $dato=request()->validate([
            'cantidadCoutas'=>['required'],
            'tratamiento_id'=>['required'],

        ]);

        $datosPlan=request()->except('_token');
        Plan::insert($datosPlan);
        */

        return redirect('plan');

            activity()->useLog('Plan de pago')->log('nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Plan::all()->last()->id;
            $lastActivity->save();

            return redirect('plan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan=Plan::findOrFail($id);
        $tratamientos=DB::table('tabla_tratamiento')->where('estadoTra_id',1)->get();
        return view('layouts.plan.editar',compact('plan'),['tratamientos'=>$tratamientos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'cantidadCoutas'=>['required'],
        ]);
        $tratamiento=DB::table('tabla_plan_pago')->where('id',$id)->value('tratamiento_id');
        $price=DB::table('tabla_tratamiento')->where('id',$tratamiento)->value('precio');
        $cant=request('cantidadCoutas');
        $monto=$price/$cant;
        DB::table('tabla_plan_pago')->where('id',$id)->update([
            'cantidadCoutas'=>$dato['cantidadCoutas'],
            'montoCouta'=> $monto,
            'coutasPagadas'=> 0,
            'saldoPendiente'=> $price,
            'estadoPlan_id'=> 1

        ]);
        //return redirect('plan');
               

        activity()->useLog('Plan de pago')->log('Modificación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('plan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planes  $planes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Plan::destroy($id);

        activity()->useLog('Plan de pago')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('plan');
    }
}
