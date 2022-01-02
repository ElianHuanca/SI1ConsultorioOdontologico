<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Receta;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class RecetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['receta']=Receta::paginate(50);
        return view('layouts.receta.inicio',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $atenciones=DB::table('atencions')->get();
        return view('layouts.receta.crear',['atenciones'=>$atenciones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dato=request()->validate([
            'descripcion'=>['required'],
            'atencion_id'=>['required','integer'],
            ]);

            $datosReceta=request()->except('_token');
            Receta::insert($datosReceta);

            activity()->useLog('Receta')->log('Nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Receta::all()->last()->id;
            $lastActivity->save();

            return redirect('receta');
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
        $receta=Receta::findOrFail($id);
        $atenciones=DB::table('atencions')->get();
        return view('layouts.receta.editar',compact('receta'),['atenciones'=>$atenciones]);
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
        $dato=request()->validate([
            'descripcion'=>['required'],
            'atencion_id'=>['required','integer'],

            ]);
           DB::table('tabla_receta')->where('id',$id)->update([
                'descripcion'=>$dato['descripcion'],
                'atencion_id'=> $dato['atencion_id'],

                ]);

                activity()->useLog('Receta')->log('Modificación')->subject();
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();

                return redirect('receta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tratamiento $tratamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Receta::destroy($id);

        activity()->useLog('Receta')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('receta');
    }
}
