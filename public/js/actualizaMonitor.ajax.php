<?php
require_once "../modelos/conexionodontograma.php";
class AjaxActualizaMonitor{
    public $monitor;
    public function ActualizaMonitor(){
        $valorMoinitor=$this->monitor;
        $stmt=Conexion::conectar()->prepare("UPDATE tbl_monitor SET datoMonitor=:datoMonitor");
        $stmt->bindParam(":datoMonitor",$valorMoinitor,PDO::PARAM_INT);
        if($stmt->execute()){
            echo $dato ="ok";
        }else{
            echo $dato ="error";
        }
    }
}
if(isset($_POST["monitor"])){
    $Valrmonitor= new AjaxActualizaMonitor;
    $Valrmonitor->monitor=$_POST["monitor"];
    $Valrmonitor->ActualizaMonitor();
}