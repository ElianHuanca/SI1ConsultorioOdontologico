<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Recepcionista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Spatie\Activitylog\Models\Activity;

class RecepcionistasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver lista de recepcionistas')->only(['index']);
        $this->middleware('permission:Crear recepcionista')->only(['create', 'store']);
        $this->middleware('permission:Editar recepcionista')->only(['edit', 'update']);
        $this->middleware('permission:Eliminar recepcionista')->only(['destroy']);
    }

    public function index()
    {
        $datos['recepcionista']=Recepcionista::paginate(50);
     return view('layouts.recepcionista.inicio',$datos);

    }


    public function create()
    {
        return view('layouts.recepcionista.crear');
    }


    public function store(Request $request)
    {
        $dato=request()->validate([
            'ci'=>['required','string','max:10'],
            'nombre'=>['required','string','max:15'],
            'apellidoPaterno'=>['required','string','max:15'],
            'apellidoMaterno'=>['required','string','max:15'],
            'telefono'=>['required','string','max:8'],

            ]);

            $datosRecepcionista=request()->except('_token');
            Recepcionista::insert($datosRecepcionista);

            activity()->useLog('Recepcionista')->log('Nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Recepcionista::all()->last()->id;
            $lastActivity->save();

            return redirect('recepcionista');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $recepcionista=Recepcionista::findOrFail($id);
        return view('layouts.recepcionista.editar',compact('recepcionista'));
    }


    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'ci'=>['required','string','max:10'],
            'nombre'=>['required','string','max:15'],
            'apellidoPaterno'=>['required','string','max:15'],
            'apellidoMaterno'=>['required','string','max:15'],
            'telefono'=>['required','string','max:8'],

            ]);
           DB::table('table_recepcionista')->where('id',$id)->update([
                'ci'=>$dato['ci'],
               'nombre'=> $dato['nombre'],
                'apellidoPaterno'=>$dato['apellidoPaterno'],
                 'apellidoMaterno'=>$dato['apellidoMaterno'],
                   'telefono'=>$dato['telefono']

                ]);

                activity()->useLog('Recepcionista')->log('Modificación')->subject();
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();
                return redirect('recepcionista');
    }


    public function destroy($id)
    {
        Recepcionista::destroy($id);

        activity()->useLog('Recepcionista')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('recepcionista');
    }

    public function byRol(){
        $recepcionistas = DB::table('table_recepcionista')->whereNull('user_id')->get();
        return $recepcionistas;
    }
}
