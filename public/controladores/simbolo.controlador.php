<?php
class ctrSimbolos{
    static public function ctrMostrarImgDeAuxiliar(){
        $tabla = "tbl_auxiliar";
        $respuesta=ModeloSimbologia::mdlMostrarImgDeAuxiliar($tabla);
        return $respuesta;
    }
    static public function ctrActualizarSimboloEnGrilla($valorIdImg,$valorCol,$imgSeleccionada,$rutaImagenGrilla){
        $tabla="odontogramas";
        $respuesta=ModeloSimbologia::mdlActualizarSimbolo($tabla,$valorIdImg,$valorCol,$imgSeleccionada,$rutaImagenGrilla);
        return $respuesta;
    }
    static public function ctrNuevoOdontograma(){
        $tabla="odontogramas";
        $respuesta=ModeloSimbologia::mdlNuevoOdontograma($tabla);
        return $respuesta;
    }   
}