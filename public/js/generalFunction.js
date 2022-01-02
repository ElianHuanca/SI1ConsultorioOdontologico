function cargarSimbolos(){
    let cont=0;
    $("#opciones").on("click","img",function(){
        if(cont==0){
            let imagen = $(this).attr("src");
            cont++;
            //alert(imagen);
            if(imagen==="vendor/adminlte/dist/img/CORONA.png"){
                imagen="vendor/adminlte/dist/img/CORONA.png";
                GuardaNombreDeSimbolo(imagen)
            }else{
                if(imagen==="vendor/adminlte/dist/img/CORONABUEN.png"){
                    imagen="vendor/adminlte/dist/img/CORONABUEN.png"
                    GuardaNombreDeSimbolo(imagen)
                }else{
                    if(imagen==="vendor/adminlte/dist/img/PROCEDIMIENTO.png"){
                        imagen="vendor/adminlte/dist/img/PROCEDIMIENTO.png"
                        GuardaNombreDeSimbolo(imagen)
                    }else{
                        Cargartabla(imagen)                     
                    }
                }
            }
        }
    })
}
function CargarOdontogramaDeDiagnostico(){
    //alert('hola bb');
    $.ajax({
        type:'POST',
        url:'js/listarOdontogramaDeDiagnostico.php',
        success:function(mensaje){
            $('#odontograma').html(mensaje);
        }
    })
}
function Cargartabla(imagen){
    $.ajax({
        type:'POST',
        url:'js/simbolos.php',
        data:('imagen='+imagen),
        success:function(mensaje){
            if(mensaje != ""){
                $('#tablaSimbolos').html(mensaje);
            }
        }
    })
}
function GuardaNombreDeSimbolo(n){
    if(n != 0){
        //alert()
        $('#tablaSimbolos').empty();
        $.ajax({
            type:'POST',
            url:'js/actualizarSimbolo.ajax.php',
            data:('imgSimbolo='+n),
            /*success:function(dato){
                alert(dato);
            }*/
        })
    }
    let cont=0;
    $("#tablaSimbolos").on("click","img",function(){
        if(cont==0){
            let imagenSimbolo=$(this).attr("src");
            cont++;
            $.ajax({
                type:'POST',
                url:'js/actualizarSimbolo.ajax.php',
                data:('imgSimbolo='+imagenSimbolo),
                success:function(){

                }
            })
        }
    })

}

function ConsultarSimbologia(){
    //alert("Functioan");
    let cont=0;
    $(document).on("click","img",function(){
        //let imagenSimbolo = $(this).attr("src");
        //alert(imagenSimbolo);
        if(cont==0){
            let imagen=$(this).attr("src");
            let idImg= $(this).attr("id");
            let col=$(this).attr("alt");
            cont++;
            /*alert(imagen);
            alert(idImg);
            alert(col);*/
            cambiarImagen(imagen,idImg,col);
        }
    })
}
function cambiarImagen(imagen,idImg,col){
    /*alert(imagen);
    alert(idImg);
    alert(col);*/
    $.ajax({
        type:'POST',
        url:'js/cambiarImagen.ajax.php',
        data:('imagen='+imagen+'&idImg='+idImg+'&col='+col),
        success:function(respuesta){
            //alert(respuesta);
            let monitor=1;
            actualizaMonitor(monitor);
            CargarOdontogramaDeDiagnostico();
        }
    })
}
function actualizaMonitor(monitor){
    $.ajax({
        type:'POST',
        url:'js/actualizaMonitor.ajax.php',
        data:('monitor='+monitor),
        success:function (dato){
        //alert(dato);
        }
    })
}
function nuevoOdontograma(){
    let nuevo=$(this).attr("nuevo");
    $.ajax({
        type:'POST',
        url:'js/nuevoOdontograma.ajax.php',
        data:('nuevo='+nuevo),
        success:function(respuesta){
            //alert(respuesta);
            if(respuesta == "ok"){
                $.ajax({
                    type:'POST',
                    url:'js/actualizaGrillaOdontograma.ajax.php',
                    data:('nuevo='+nuevo),
                    success:function(respuesta){
                        CargarOdontogramaDeDiagnostico();
                        let monitor=0;
                        actualizaMonitor(monitor);
                    }
                })
            }
        }
    })
}