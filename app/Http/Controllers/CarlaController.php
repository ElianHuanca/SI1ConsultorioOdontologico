<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Reserva;
use App\Models\atencion;
use App\Models\historial;
use App\Models\Odontologo;
use App\Models\Receta;

class CarlaController extends Controller
{
    public function PDFPaciente(){
        $paciente=Paciente::all();
        $pdf=PDF::loadview('pacientes',compact('paciente'));
    return $pdf->download('paciente.pdf');

    }

    public function PDFReserva( Reserva $reserva){

        $pdf=PDF::loadview('reservas',compact('reserva'));
        $pdf->setPaper(array(0, 0, 300,400), 'portrait');
   // return $pdf->stream('reserva.pdf');
    return $pdf->download('reserva.pdf');

    }


    public function PDFHistorial( Paciente $paciente){
        $historial=historial::findOrFail($paciente->id);
        $atencions=atencion::where('historial_id',$historial->id)->get();
        $reservas=Reserva::all();
        $odontologos=Odontologo::all();
        $recetas=Receta::all();
        $pdf=PDF::loadview('prueba',compact('paciente','atencions','reservas','odontologos','recetas'));

    return $pdf->stream('historial.pdf');

    }
}
