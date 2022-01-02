<?php
    require_once "../modelos/nuevaconexion.php";
    $imagen=$_POST['imagen'];
    switch($imagen){
        case 'vendor/adminlte/dist/img/CARIADO.png':
            $codigoImagen=1;
        break;
        case 'vendor/adminlte/dist/img/OBTURADO.png':
            $codigoImagen=2;
        break;
        case 'vendor/adminlte/dist/img/EXODONCIA.png':
            $codigoImagen=3;
        break;
        case 'vendor/adminlte/dist/img/EXODONCIASIMPLE.png':
            $codigoImagen=4;
        break;
        case 'vendor/adminlte/dist/img/SINERUPCIONAR.png':
            $codigoImagen=5;
        break;
        case 'vendor/adminlte/dist/img/EROSION.png':
            $codigoImagen=6;
        break;
        case 'vendor/adminlte/dist/img/SELLANTE.png':
            $codigoImagen=7;
        break;
        case 'vendor/adminlte/dist/img/SELLANTEPRESENTE.png':
            $codigoImagen=8;
        break;
        case 'vendor/adminlte/dist/img/ENDODONCIA.png':
            $codigoImagen=9;
        break;
        case 'vendor/adminlte/dist/img/ENDODONCIAREALIZADA.png':
            $codigoImagen=10;
        break;
        case 'vendor/adminlte/dist/img/PROVISIONAL.png':
            $codigoImagen=11;
        break;
        case 'vendor/adminlte/dist/img/PROVISIONALBUEN.png':
            $codigoImagen=12;
        break;
        case 'vendor/adminlte/dist/img/CORONA.png':
            $codigoImagen=13;
        break;
        case 'vendor/adminlte/dist/img/CORONABUEN.png':
            $codigoImagen=14;
        break;
        case 'vendor/adminlte/dist/img/PROCEDIMIENTO.png':
            $codigoImagen=15;
        break;
        
        default:
        #code
        break;
                
    }
    $sql='SELECT * FROM simbolos where id="'.$codigoImagen.'"ORDER BY id ASC ';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute();
    $resultado=$sentencia->fetchAll();
    $registros_db=$sentencia->rowCount();
?>


<div class="row">
    <div class="col espacio-1">&nbsp</div>
</div>

<div class="card">
    <h5 class="card-header">Opciones</h5>
    <div class="row">
        <div class="col espacio-1">&nbsp</div>
    </div>
    <?php foreach($resultado as $imagen):

    ?>

    <div class="container">
        <div class="row">
            <div id="colum-1-izquierda" class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <a><img src="<?php echo $imagen["Imagen1"];?>" onmouseover="this.width=43;this.height=43;" onmouseout="this.width=48;this.height=48;" alt="<?php echo $imagen["Imagen1"];?>" onclick="javascript:GuardaNombreDeSimbolo(n=0);" width="48" height="48"></a>
            </div>
            <div id="colum-1-izquierda" class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <a><img id="<?php echo $imagen["Imagen2"];?>" src="<?php echo $imagen["Imagen2"];?>" onmouseover="this.width=43;this.height=43;" onmouseout="this.width=48;this.height=48;" alt="<?php echo $imagen["Imagen2"];?>" onclick="javascript:GuardaNombreDeSimbolo(n=0);" width="48" height="48"></a>
            </div>
            <div id="colum-1-izquierda" class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <a><img id="<?php echo $imagen["Imagen3"];?>" src="<?php echo $imagen["Imagen3"];?>" onmouseover="this.width=43;this.height=43;" onmouseout="this.width=48;this.height=48;" alt="<?php echo $imagen["Imagen3"];?>" onclick="javascript:GuardaNombreDeSimbolo(n=0);" width="48" height="48"></a>
            </div>
            <div id="colum-1-izquierda" class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <a><img id="<?php echo $imagen["Imagen4"];?>" src="<?php echo $imagen["Imagen4"];?>" onmouseover="this.width=43;this.height=43;" onmouseout="this.width=48;this.height=48;" alt="<?php echo $imagen["Imagen4"];?>" onclick="javascript:GuardaNombreDeSimbolo(n=0);" width="48" height="48"></a>
            </div>
            <div id="colum-1-izquierda" class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <a><img id="<?php echo $imagen["Imagen5"];?>" src="<?php echo $imagen["Imagen5"];?>" onmouseover="this.width=43;this.height=43;" onmouseout="this.width=48;this.height=48;" alt="<?php echo $imagen["Imagen5"];?>" onclick="javascript:GuardaNombreDeSimbolo(n=0);" width="48" height="48"></a>
            </div>
        </div>
    </div>
    <?php endforeach ?>
    <div class="row">
        <div class="col espacio-1">&nbsp&nbsp</div>
    </div>
</div>