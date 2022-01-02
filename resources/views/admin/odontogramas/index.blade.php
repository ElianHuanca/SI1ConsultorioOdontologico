@extends('adminlte::page')
@section('title', 'Consultorio')

@section('content_header')
    <h1>Odontograma</h1>
@stop

@section('content')
<body onload="CargarOdontogramaDeDiagnostico();">
    <div class="container">
        <div id="opciones">
            <?php
                include_once("js/opciones.php");
            ?>
        </div>        
    </div>
    <div class="container">
        <div id="tablaSimbolos">
       
        </div>        
    </div>
    <div class="container">
        <div id="odontograma">
            
        </div>        
    </div>
</body>
@stop

@section('js')
    <script src="js/generalFunction.js"></script>
@stop