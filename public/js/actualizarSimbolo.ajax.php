<?php
require_once "../modelos/conexionodontograma.php";
class AjaxActualizaSimbolo{
    public $imgSimbolo;
    public function AjaxActualizaImgSimbolo(){
        $imgSeleccionada=$this->imgSimbolo;
        $stmt=Conexion::conectar()->prepare("UPDATE tbl_auxiliar SET nomSimbolo=:nomSimbolo");
        $stmt->bindParam(":nomSimbolo",$imgSeleccionada,PDO::PARAM_STR);
        if($stmt->execute()){
            echo $dato=1;
        }else{
            echo $dato=2;
        }
    }
}

if(isset($_POST["imgSimbolo"])){
    $ValrImgSimbolo=new AjaxActualizaSimbolo;
    $ValrImgSimbolo->imgSimbolo=$_POST["imgSimbolo"];
    $ValrImgSimbolo->AjaxActualizaImgSimbolo();
}