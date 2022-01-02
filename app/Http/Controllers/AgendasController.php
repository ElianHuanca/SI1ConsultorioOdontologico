<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Agendas;
use App\Models\Odontologo;
use App\Models\Reserva;
use Illuminate\Http\Request;

class AgendasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver agenda')->only(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odontologos=DB::table('tabla_odontologo')->get();
        return view('layouts.agenda.inicio',['odontologos'=>$odontologos]);
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
     * @param  \App\Models\Agendas  $agendas
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //$reserva=Reserva::findOrFail($id);
        //$datos['reserva']=Reserva::paginate(50);
        //$reservas=DB::table('tabla_reserva')->where('odontologo_id',$id)->value('id');
        $date=request('fechaElegir');
        $odontologo=Odontologo::findOrFail($id);
        $reserva=DB::table('tabla_reserva')->where([['odontologo_id',$odontologo->id],['estadoRes_id',1]])->get();
        return view('layouts.agenda.ver',compact('odontologo'),['reserva'=>$reserva,'date'=>$date]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendas  $agendas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $odontologo=Odontologo::findOrFail($id);

        return view('layouts.agenda.editar',compact('odontologo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendas  $agendas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agendas $agendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendas  $agendas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendas $agendas)
    {
        //
    }
}
