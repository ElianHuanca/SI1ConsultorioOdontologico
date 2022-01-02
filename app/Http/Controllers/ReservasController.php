<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;
use Illuminate\Http\Request;
use App\Models\Servicio;
use Spatie\Activitylog\Models\Activity;
class ReservasController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Ver lista de reservas')->only(['index']);
        $this->middleware('permission:Crear reserva')->only(['create', 'store']);
        $this->middleware('permission:Editar reserva')->only(['edit', 'update']);
        $this->middleware('permission:Eliminar reserva')->only(['destroy']);
    }

    public function index()
    {
        $datos['reserva']=Reserva::paginate(50);
        return view('layouts.reserva.inicio',$datos);
    }


    public function create()
    {
        //'servicios'=>$servicios,
       $servicios=Servicio::all();
    //     $datos['reserva']=Reserva::paginate(50);
       //  $servicios=DB::table('servicios')->get();
         $odontologos=DB::table('tabla_odontologo')->get();
         $pacientes=DB::table('table__paciente')->get();
        $estados=DB::table('tabla_estado_res')->get();
        return view('layouts.reserva.crear',compact('servicios'),['odontologos'=>$odontologos, 'pacientes'=>$pacientes,'estados'=>$estados]);
    }


    public function store(Request $request)
    {
        $paciente_id=request('paciente_id');
        $odontologo_id=request('odontologo_id');
        $inicio=request('inicio');
        $cad=request('inicio');
        $day=substr($cad,0,10);
        $time=substr($cad,11);

        $reservations=DB::table('tabla_reserva')->where('odontologo_id',$odontologo_id)
                                            ->where('estadoRes_id',1)->get();


            $reserva=Reserva::create([
                'inicio'=> request('inicio'),
                'fin'=> request('inicio'),
                'odontologo_id'=> request('odontologo_id'),
                'paciente_id'=> request('paciente_id'),
                'estadoRes_id'=> 1,
            ]);





            if ($request->servicios){
                $reserva->Servicio()->attach($request->servicios);
            }
            $reservaId=$reserva->id;
            /*
            $reservaId=DB::table('tabla_reserva')
                            ->where([['inicio',$inicio],
                                ['paciente_id',$paciente_id],
                                ['odontologo_id',$odontologo_id],
                                 ])->value('id');*/

            $servicios=DB::table('reserva_servicio')->where('reserva_id',$reservaId)->get();
            $h=substr($time,0,2);
            $m=substr($time,3,2);
            $total=  $m + $h*60;
            foreach ($servicios as $servicio) {
                $serdur=DB::table('servicios')->where('id',$servicio->servicio_id)->value('duracionAproximada');
                $h=substr($serdur,0,2);
                $m=substr($serdur,3,2);
                $total+=  $m + $h*60;
            }

            $h=(int) ($total/60);
            $m=(int) $total%60;
            $total=strval($h.":".$m.":00");


            $sday=strval($day);
            $datefinal=strval($sday." ".$total);
            $date=date_create($datefinal);
            //$date=date_create("2013-03-15 03:00:00");

            $fin=date_format($date,"Y/m/d H:i:s");
            DB::table('tabla_reserva')->where('id',$reservaId)->update([
                'fin'=>$datefinal
                ]);

            if ($reservations!=null){
                $existe=0;
                $date1=date_create($inicio);
                $checkInicio=date_format($date1,"Y/m/d H:i:s");
                $date4=date_create($datefinal);
                $checkFin=date_format($date4,"Y/m/d H:i:s");
                //$reserva=DB::table('tabla_reserva')->where('id',$reservaId)->get();
                foreach ($reservations as $reservation) {
                    $date2=date_create($reservation->inicio);
                    $fecIni=date_format($date2,"Y/m/d H:i:s");
                    $date3=date_create($reservation->fin);
                    $fecFin=date_format($date3,"Y/m/d H:i:s");
                    if (
                       (($checkInicio<=$fecIni) && ($checkFin>=$fecIni)) ||
                       (($checkInicio>=$fecIni) && ($checkInicio<=$fecFin))

                    ){
                        $existe=1;
                    }

                }
                if ($existe===1){
                    Reserva::destroy($reservaId);
                }

            }

            activity()->useLog('Reserva')->log('Nuevo')->subject();
            $lastActivity = Activity::all()->last();
            $lastActivity->subject_id = Reserva::all()->last()->id;
            $lastActivity->save();

            return redirect('reserva');
    }


    public function show($id)
    {
        $reserva=Reserva::findOrFail($id);
        return view('layouts.reserva.mostrar',compact('reserva'));
    }


    public function edit($id)
    {
        $servicios=Servicio::all();
        $reserva=Reserva::findOrFail($id);
       // $datos['reserva']=Reserva::paginate(50);
         $odontologos=DB::table('tabla_odontologo')->get();
         $pacientes=DB::table('table__paciente')->get();
         $estados=DB::table('tabla_estado_res')->get();
         /*
         $reser=DB::table('reserva_servicio')->where('reserva_id',$id)->get('servicio_id');
        $resers=DB::table('servicios')->whereIn(function ($query){
                                    $query->select('servicio_id')
                                    ->from('reserva_servicio')
                                    ->whereColumn('reserva_servicio.reserva.id', 3);
        })->get('id');*/
        return view('layouts.reserva.editar',compact('reserva','servicios'),['odontologos'=>$odontologos, 'pacientes'=>$pacientes, 'estados'=>$estados]);
    }


    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'inicio'=>['required'],
            'fin'=>['required'],
            'odontologo_id'=>['required','integer'],
            'paciente_id'=>['required','integer'],
            'estadoRes_id'=>['required','integer'],

            ]);
            $reserva=Reserva::findOrFail($id);
           DB::table('tabla_reserva')->where('id',$id)->update([
                'inicio'=>$dato['inicio'],
                'fin'=>$dato['fin'],
                'odontologo_id'=>$dato['odontologo_id'],
                'paciente_id'=>$dato['paciente_id'],
                'estadoRes_id'=>$dato['estadoRes_id']

                ]);
              // $reserva->update($request->all());
                if($request->servicios){
                 $reserva->Servicio()->sync($request->servicios);
                }

                activity()->useLog('Reserva')->log('Modificación')->subject();
                $lastActivity = Activity::all()->last();
                $lastActivity->subject_id = $id;
                $lastActivity->save();

                return redirect('reserva');
    }


    public function destroy($id)
    {
        Reserva::destroy($id);

        activity()->useLog('Reserva')->log('Eliminación')->subject();
        $lastActivity = Activity::all()->last();
        $lastActivity->subject_id = $id;
        $lastActivity->save();

        return redirect('reserva');
    }
}
