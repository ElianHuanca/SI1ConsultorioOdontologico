<?php
    require_once "../modelos/conexionodontograma.php";
    require_once "../modelos/simbolo.modelo.php";
    require_once "../controladores/simbolo.controlador.php";
    class AjaxCargarImgEnGrilla{
        public $imagen;
        public $idImg;
        public $col;
        public function ajaxActualizaSimboloEnGrilla(){
            $rutaImagenGrilla=$this->imagen;
            $valorIdImg=$this->idImg;
            $valorCol=$this->col;

            $respuesta=ctrSimbolos::ctrMostrarImgDeAuxiliar();
            $imgSeleccionada = $respuesta["nomSimbolo"];
            $respuesta=ctrSimbolos::ctrActualizarSimboloEnGrilla($valorIdImg,$valorCol,$imgSeleccionada,$rutaImagenGrilla);
            echo $respuesta = $rutaImagenGrilla;
        }
    }
    if(isset($_POST["imagen"])){
        $ValrImgSimbolo = new AjaxCargarImgEnGrilla();
        $ValrImgSimbolo->imagen =$_POST["imagen"];
        $ValrImgSimbolo->idImg =$_POST["idImg"];
        $ValrImgSimbolo->col =$_POST["col"];
        $ValrImgSimbolo->ajaxActualizaSimboloEnGrilla();
    }

?>