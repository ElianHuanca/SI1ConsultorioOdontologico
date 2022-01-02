<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Tratamiento;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class TratamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tratamiento']=Tratamiento::paginate(50);
        return view('layouts.tratamiento.inicio',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados=DB::table('tabla_estado_tra')->get();
        $pacientes=DB::table('table__paciente')->get();
        $odontologos=DB::table('tabla_odontologo')->get();
        $servicios=DB::table('servicios')->get();
        return view('layouts.tratamiento.crear',['estados'=>$estados,'pacientes'=>$pacientes,'servicios'=>$servicios,'odontologos'=>$odontologos]);
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
        $paciente_id=request('paciente_id');
        $servicio_id=request('servicio_id');
        $dato=request()->validate([
            'fechaInicio'=>['required','date'],
            'fechaFin'=>['required','date'],
            'servicio_id'=>['required','integer'],
            'paciente_id'=>['required','integer'],
            'odontologo_id'=>['required','integer'],


        ]);*/
        $tratamiento=Tratamiento::create([
                'fechaInicio'=> request('fechaInicio'),
                'fechaFin'=> request('fechaFin'),
                'precio'=> $price=DB::table('servicios')->where('id',request('servicio_id'))->value('precio'),
                'servicio_id'=> request('servicio_id'),
                'paciente_id'=> request('paciente_id'),
                'odontologo_id'=> request('odontologo_id'),
                'estadoTra_id'=> 1,
        ]);
            /*
            $datosTratamiento=request()->except('_token');
            Tratamiento::insert($datosTratamiento);
            $tratamiento=DB::table('tabla_tratamiento')
                            ->where([['servicio_id',$servicio_id],
                                ['paciente_id',$paciente_id],
                                 ])->value('id');
            $price=DB::table('servicios')->where('id',$servicio_id)->value('precio');
            $estadoTra_id=1;
             DB::table('tabla_tratamiento')->where('id',$tratamiento)->update([
                'precio'=>$price,
                'estadoTra_id'=>$estadoTra_id
                ]);*/

            activity()->useLog('Tratamiento')->log('Nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Tratamiento::all()->last()->id;
            $lastActivity->save();

            return redirect('tratamiento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tratamientos  $tratamientos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tratamientos  $tratamientos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tratamiento=Tratamiento::findOrFail($id);
        $estados=DB::table('tabla_estado_tra')->get();
        $pacientes=DB::table('table__paciente')->get();
        $odontologos=DB::table('tabla_odontologo')->get();
        $servicios=DB::table('servicios')->get();
        return view('layouts.tratamiento.editar',compact('tratamiento'),['estados'=>$estados,'pacientes'=>$pacientes,'servicios'=>$servicios,'odontologos'=>$odontologos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tratamiento  $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servicio_id=request('servicio_id');
        $dato=request()->validate([
            'fechaInicio'=>['required','date'],
            'fechaFin'=>['required','date'],
            'estadoTra_id'=>['required','integer'],
            'servicio_id'=>['required','integer'],
            'paciente_id'=>['required','integer'],
            'odontologo_id'=>['required','integer'],

            ]);
            $price=DB::table('servicios')->where('id',$servicio_id)->value('precio');

           DB::table('tabla_tratamiento')->where('id',$id)->update([
                'fechaInicio'=>$dato['fechaInicio'],
                'fechaFin'=> $dato['fechaFin'],
                'precio'=> $price,
                'estadoTra_id'=>$dato['estadoTra_id'],
                'servicio_id'=>$dato['servicio_id'],
                'paciente_id'=>$dato['paciente_id'],
                'odontologo_id'=>$dato['odontologo_id']

                ]);

                activity()->useLog('Tratamiento')->log('Modificación')->subject();
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();

                return redirect('tratamiento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tratamiento::destroy($id);

        activity()->useLog('Tratamiento')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('tratamiento');
    }
}
