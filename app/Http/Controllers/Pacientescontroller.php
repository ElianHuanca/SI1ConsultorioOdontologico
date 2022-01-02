<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Validation\Rules\Unique;
use App\Models\historial;
use Spatie\Activitylog\Models\Activity;
class Pacientescontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver lista de pacientes')->only(['index']);
        $this->middleware('permission:Crear paciente')->only(['create', 'store']);
        $this->middleware('permission:Editar paciente')->only(['edit', 'update']);
        $this->middleware('permission:Eliminar paciente')->only(['destroy']);

    }

    public function index()
    {
       /* $paciente= 
        DB::select('select * from table__paciente');
     return view('layouts.paciente.inicio')->with('paciente',$paciente);*/
     $pacientes['paciente']=Paciente::paginate(50);
     return view('layouts.paciente.inicio',$pacientes);
    }

   
    public function create()
    {
        return view('layouts.paciente.crear');
    }
    
    public function store(Request $request)
    {
        $dato=request()->validate([
            'ci'=>'required|unique:table__paciente','string','max:10',
            'nombre'=>['required','string','max:15'],
            'apellidoPaterno'=>['required','string','max:15'],
            'apellidoMaterno'=>['required','string','max:15'],
            'sexo'=>['required','string','max:1'],
            'telefono'=>['required','string','max:8'],
            ]);
            $datosPaciente=request()->except('_token');
            Paciente::insert($datosPaciente);
            $historial = new historial;
            $paciente =DB::table('table__paciente')->orderBy('id','desc')->first();
            $historial->paciente_id = $paciente->id;
            $historial->save();

            activity()->useLog('Paciente')->log('created')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Paciente::all()->last()->id;
            $lastActivity->save();

            return redirect('paciente');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
      /* $paciente=DB::select('select * from table__paciente where id  = '.$id);*/
        $paciente=Paciente::findOrFail($id);
        return view('layouts.paciente.editar',compact('paciente'));
        //->with('paciente',$paciente);      
    }
    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'ci'=>['required','string','max:10'],
            'nombre'=>['required','string','max:15'],
            'apellidoPaterno'=>['required','string','max:15'],
            'apellidoMaterno'=>['required','string','max:15'],
            'sexo'=>['required','string','max:1'],
            'telefono'=>['required','string','max:8'],
         
        ]);
           DB::table('table__paciente')->where('id',$id)->update([
                'ci'=>$dato['ci'],
               'nombre'=> $dato['nombre'],
                'apellidoPaterno'=>$dato['apellidoPaterno'],
                 'apellidoMaterno'=>$dato['apellidoMaterno'],
                 'sexo'=>$dato['sexo'],
                   'telefono'=>$dato['telefono']
            
                ]);
               /* $datosPaciente=request()->except(['_token','_method']);
               Paciente::where('id','=',$id)->update($datosPaciente);*/

               activity()->useLog('Paciente')->log('Updated')->subject();
               $lastActivity = Activity::all()->last();
               $lastActivity->subject_id = $id;
               $lastActivity->save();

                return redirect('paciente');
    }
    public function destroy($id)
    {
        //
        Paciente::destroy($id);
        historial::destroy($id);

        activity()->useLog('Paciente')->log('Deleted')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('paciente');
    }
}
