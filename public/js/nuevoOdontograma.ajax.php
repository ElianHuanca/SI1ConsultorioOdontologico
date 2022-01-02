<?php
require_once "../controladores/simbolo.controlador.php";
require_once "../modelos/simbolo.modelo.php";
class AjaxNuevoOdontograma{
    public $btnNuevo;
    public function ajaxLimpiarGrilla(){
        $valorBtnNuevo=$this->btnNuevo;
        if(isset($valorBtnNuevo)){
            $respuesta=ctrSimbolos::ctrNuevoOdontograma();
            echo $respuesta;
        }
    }
}
if(isset($_POST["nuevo"])){
    $ValrImgSimbolo=new AjaxNuevoOdontograma();
    $ValrImgSimbolo->btnNuevo=$_POST["nuevo"];
    $ValrImgSimbolo->ajaxLimpiarGrilla();
}