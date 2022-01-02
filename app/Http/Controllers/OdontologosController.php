<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Odontologo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\Activitylog\Models\Activity;

class OdontologosController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver lista de odontologos')->only(['index']);
        $this->middleware('permission:Crear odontologo')->only(['create', 'store']);
        $this->middleware('permission:Editar odontologo')->only(['edit', 'update']);
        $this->middleware('permission:Eliminar odontologo')->only(['destroy']);

    }

    public function index()
    {
        $datos['odontologo']=Odontologo::paginate(50);
        return view('layouts.odontologo.inicio',$datos);
    }


    public function create()
    {
        return view('layouts.odontologo.crear');
    }


    public function store(Request $request)
    {
        $dato=request()->validate([
            'ci'=>['required','string','max:10'],
            'nombre'=>['required','string','max:15'],
            'apellidoPaterno'=>['required','string','max:15'],
            'apellidoMaterno'=>['required','string','max:15'],
            'sexo'=>['required','string','max:1'],
            'telefono'=>['required','string','max:8'],
            'estado'=>['required'],

            ]);

            $datosOdontologo=request()->except('_token');
            Odontologo::insert($datosOdontologo);

            activity()->useLog('Odontologo')->log('Nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Odontologo::all()->last()->id;
            $lastActivity->save();

            return redirect('odontologo');
    }


    public function show($id)
    {
        $date=request('fechaElegir');
        $odontologo=Odontologo::findOrFail($id);
        $reserva=DB::table('tabla_reserva')->where([['odontologo_id',$odontologo->id],['estadoRes_id',1]])->get();
        return view('layouts.odontologo.ver',compact('odontologo'),['reserva'=>$reserva,'date'=>$date]);
    }


    public function edit($id)
    {
        $odontologo=Odontologo::findOrFail($id);

        return view('layouts.odontologo.editar',compact('odontologo'));
    }


    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'ci'=>['required','string','max:10'],
            'nombre'=>['required','string','max:15'],
            'apellidoPaterno'=>['required','string','max:15'],
            'apellidoMaterno'=>['required','string','max:15'],
            'telefono'=>['required','string','max:8'],
            'estado'=>['required','string','max:1'],


            ]);
           DB::table('tabla_odontologo')->where('id',$id)->update([
                'ci'=>$dato['ci'],
                'nombre'=> $dato['nombre'],
                'apellidoPaterno'=>$dato['apellidoPaterno'],
                 'apellidoMaterno'=>$dato['apellidoMaterno'],
                   'telefono'=>$dato['telefono'],
                   'estado'=>$dato['estado'],

                'apellidoMaterno'=>$dato['apellidoMaterno'],
                'telefono'=>$dato['telefono']

                ]);

                activity()->useLog('Odontologo')->log('Modificación');
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();
                return redirect('odontologo');
    }


    public function destroy($id)
    {
        Odontologo::destroy($id);

        activity()->useLog('Odontologo')->log('Eliminación');
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('Eliminación Odontologo');
    }

    public function byRol(){
        $odontologos = DB::table('tabla_odontologo')->whereNull('user_id')->get();
        return $odontologos;
    }
}
