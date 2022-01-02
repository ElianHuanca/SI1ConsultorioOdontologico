<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Validator;
use Spatie\Activitylog\Models\Activity;
class ServiciosControllers extends Controller
{
   
    public function index()
    {
        $datos['servicio']=Servicio::paginate(50);
        return view('layouts.servicio.inicio',$datos);
    }

  
    public function create()
    {
        return view('layouts.servicio.crear');
    }

   
    public function store(Request $request)
    {
        $dato=request()->validate([
            'descripcion'=>['required','string','max:70'],
            'precio'=>['required'],
            'duracionAproximada'=>['required','string','max:15'],
         
            ]);

            $datosServicio=request()->except('_token');
            Servicio::insert($datosServicio);

            activity()->useLog('Servicio')->log('Nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Servicio::all()->last()->id;
            $lastActivity->save();

            return redirect('servicio');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $servicio=Servicio::findOrFail($id);
       
        return view('layouts.servicio.editar',compact('servicio'));
    }

    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'descripcion'=>['required','string','max:70'],
            'precio'=>['required'],
            'duracionAproximada'=>['required','string','max:15'],
            'estado'=>['required','string','max:1'],
         
            ]);
           DB::table('servicios')->where('id',$id)->update([
                'descripcion'=>$dato['descripcion'],
               'precio'=> $dato['precio'],
                'duracionAproximada'=>$dato['duracionAproximada'],
                   'estado'=>$dato['estado'],
            
                ]);

                activity()->useLog('Servicio')->log('Modificación')->subject();
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();

                return redirect('servicio');
    }


    public function destroy($id)
    {
        Servicio::destroy($id);

        activity()->useLog('Servicio')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('servicio');
    }
}
