<?php
    require_once "../modelos/nuevaconexion.php";
    $sql= 'SELECT * FROM odontogramas ORDER BY idImagen ASC';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    function asignaAnchoYaltoAnumero($nombreImg){
        /*$ruta=substr($nombreImg,0,26);
        if($ruta== "vendor/adminlte/dist/img/n"){
            $w=20;
            $h=15;
            echo "width='".$w."' ";
            echo "height='".$h."' ";
        }else{*/
            $w=48;
            $h=48;
            echo "width='".$w."' ";
            echo "height='".$h."' ";
            echo "onmouseover='this.width=45;this.height=45;'";
            echo "onmouseout='this.width=48;this.height=48;'";
            echo "onclick='javascript:ConsultarSimbologia();'";
        //}
    }
?>