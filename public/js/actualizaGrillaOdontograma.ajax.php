<?php
require_once "../modelos/simbolo.modelo.php";
class AjaxActualizaGrilla{
    public $btnNuevo;
    public function ajaxActualizaGrillaOdontograma(){
        $tabla="odontogramas";
        $tabla2="odontogramas_aux";
        $respuesta = ModeloSimbologia::mdlActualizarGrillaOdontograma($tabla,$tabla2);
        echo $respuesta;
    }
}
if(isset($_POST["nuevo"])){
    $ValrImgSimbolo=new AjaxActualizaGrilla();
    $ValrImgSimbolo->btnNuevo=$_POST["nuevo"];
    $ValrImgSimbolo->ajaxActualizaGrillaOdontograma();
}