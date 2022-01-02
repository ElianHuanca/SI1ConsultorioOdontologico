<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\historial;
use App\Models\Paciente;
use App\Models\atencion;
use App\Models\Reserva;
use App\Models\Odontologo;
use Illuminate\Support\Facades\DB;
use App\Models\Receta;
class historialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        $historials = historial::all();
        return view('admin.historials.index',compact('historials','pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.historials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(historial $historial)
    {
        return view('admin.historials.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente=Paciente::findOrFail($id);
        $historial=historial::findOrFail($id);
        $atencions=DB::table('atencions')->where('historial_id',$historial->id)->get();
        //$reservas=DB::table('tabla_reserva')->where('id',$atencions->reserva_id)->get();
        //$odontologos=DB::table('tabla_odontologo')->where('id',$reservas->odontologo_id)->get();
        $reservas=Reserva::all();
        $odontologos=Odontologo::all();
        $recetas=Receta::all();    
        return view('admin.historials.edit',compact('paciente','atencions','reservas','odontologos','recetas'));
        //return view('admin.historials.edit', compact('historial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historial $historial)
    {
        $request->validate([
            'fechaRegistro' =>'required',
            'paciente_id' =>'required',
            'atencion_id'=>'required'
        ]);
        
        $historial->update($request->all());
        return redirect()->route('admin.historials.index',$historial)->with('info','Actualizado!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(historial $historial)
    {
        $historial->delete();
        return redirect()->route('admin.historials.index',$historial)->with('info','Eliminado!!!');
    }
}