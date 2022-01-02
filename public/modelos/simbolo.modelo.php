<?php
require_once "conexionodontograma.php";

class ModeloSimbologia{
    static public function mdlMostrarImgDeAuxiliar($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT nomSimbolo FROM $tabla");
        $stmt->execute();
        return $stmt->fetch();
    }
    static public function mdlActualizarSimbolo($tabla,$valorIdImg,$valorCol,$imgSeleccionada,$rutaImagenGrilla){
        $stmt=Conexion::conectar()->prepare("UPDATE $tabla SET $valorCol ='$imgSeleccionada' WHERE $valorCol='$rutaImagenGrilla' AND idimagen= '$valorIdImg'");
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function mdlNuevoOdontograma($tabla){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla");
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close;
        $stmt=null;
    }
    static public function mdlActualizaGrillaOdontograma($tabla,$tabla2){
        $stmt=Conexion::conectar()->prepare("INSERT INTO $tabla SELECT * FROM $tabla2");
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        $stmt=null;
    }
}