<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
class ProductosController extends Controller
{
    
    public function index()
    {
        $datos['producto']=Producto::paginate(50);
        return view('layouts.producto.inicio',$datos);
    }

    
    public function create()
    {
        return view('layouts.producto.crear');
    }

  
    public function store(Request $request)
    {
        $dato=request()->validate([
            'descripcion'=>['required','string','max:90'],
            
         
            ]);

            $datosProducto=request()->except('_token');
            Producto::insert($datosProducto);

            activity()->useLog('Producto')->log('nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Producto::all()->last()->id;
            $lastActivity->save();

            return redirect('producto');
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
       
        return view('layouts.producto.editar',compact('producto'));
    }

   
    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'descripcion'=>['required','string','max:90'],

            ]);
           DB::table('tabla_producto')->where('id',$id)->update([
                'descripcion'=>$dato['descripcion'],

                ]);

                activity()->useLog('Producto')->log('Modificación')->subject();
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();

                return redirect('producto');
    }


    public function destroy($id)
    {
        Producto::destroy($id);

        activity()->useLog('Producto')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('producto');
    }
}
