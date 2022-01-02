$(function(){
    $('#select-rol').on('change', hablilitar);
})
function habilitar(){    
    var rol = document.getElementById('select-rol');

    var odontologos = document.getElementById('select-odontologos');
    var recepcionistas = document.getElementById('select-recepcionistas');
    alert('hola');
    if(rol.value >= 1){

    }
    else{
        odontologos.disable=true;
    }
}
