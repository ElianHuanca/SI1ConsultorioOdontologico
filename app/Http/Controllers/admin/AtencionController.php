<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\atencion;
use App\Models\historial;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;
class AtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atencions = atencion::all();
        return view('admin.atencions.index',compact('atencions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.atencions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' =>'required',
        ]);
        //$atencion = atencion::create($request->all());
        $atencion = new atencion;
        $atencion->descripcion = $request->descripcion;
        $reserva = new reserva;
        $reserva =DB::table('tabla_reserva')->where('estadoRes_id',1)->orderBy('inicio')->first();
        //return $reserva;
        //dd($reserva);
        $historial=historial::findOrFail($reserva->paciente_id);
        $historial->fechaRegistro = $reserva->inicio;
        $atencion->reserva_id = $reserva->id;
        $atencion->fechaInicio = $reserva->inicio;
        $atencion->fechaFin = $reserva->fin;
        $reserva = Reserva::findOrFail($reserva->id);
        $reserva->estadoRes_id = 2;
        $atencion->historial_id=$reserva->paciente_id;
        $atencion->save();
        $reserva->save();
        $historial->save();

        activity()->useLog('Atención')->log('created')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = atencion::all()->last()->id;
        $lastActivity->save();

        return redirect()->route('admin.atencions.index',$atencion)->with('info','Registrado!!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(atencion $atencion)
    {
        return view('admin.atencions.show', compact('atencion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(atencion $atencion)
    {
        return view('admin.atencions.edit', compact('atencion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, atencion $atencion)
    {
        $request->validate([
            'descripcion' =>'required',
        ]);
        $atencion->update($request->all());

        activity()->useLog('Atención')->log('Updated')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $atencion->id;
        $lastActivity->save();

        return redirect()->route('admin.atencions.index',$atencion)->with('info','Actualizado!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(atencion $atencion)
    {

        $atencion->delete();

        activity()->useLog('Atención')->log('Updated')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $atencion->id;
        $lastActivity->save();

        return redirect()->route('admin.atencions.index',$atencion)->with('info','Eliminado!!!');
    }
}