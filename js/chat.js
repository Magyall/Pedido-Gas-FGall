setInterval("loadMensages()", 500);

$("#salir-si").click(function () {
    document.getElementById('calification-form').style.display = "none";
    document.getElementById('calification-fondo').style.display = "none";
});
$("#salir-no").click(function () {
    document.getElementById('calification-form').style.display = "none";
    document.getElementById('calification-fondo').style.display = "none";
});
$("#close-sesion").click(function () {
    document.getElementById('calification-form').style.display = "block";
    document.getElementById('calification-fondo').style.display = "block";
});
$(".buttom-btn").click(function () {
    $(".top-btn").addClass('top-btn-show');
    $("#contact-form-page").addClass('show-profile');
    $(this).addClass('buttom-btn-hide');
});
$(".top-btn").click(function () {
    $(".buttom-btn").removeClass('buttom-btn-hide');
    $("#contact-form-page").removeClass('show-profile');
});

$(document).ready(function(){
    var session = $("#session").val();

    if(session == 1){
        $('#div_chat').load('./complementos/web/complementos/div_chat.php');
    }
});

var loadMensages = function () {
    var session = $("#session").val();
    if(session == 1){
        $('#div_chat').load('./complementos/web/complementos/div_chat.php');
    }
}

function iniciar_chat(){
    $.ajax({
        type: "POST",
        url:"controladores/chat_controlador.php",
        data: $('#frm_chat').serialize(),
        success:function(r){
            console.info(r);
            if(r==1){
                $('#divsessionvalidacion').load('./complementos/web/complementos/div_session.php');
                $('#div_chat').load('./complementos/web/complementos/div_chat.php');
                $('#div_botones').load('./complementos/web/complementos/div_mensajes.php');
            }else{
                
            }
        }
    });
}

function cerrar_chat(parametro, chat){
    cadena="parametro="+parametro+
            "&chat="+chat;
    $.ajax({
        type:"POST",
        url:"controladores/chat_controlador.php",
        data:cadena,
        success:function(r){
            console.info(r);
            if(r==1){
                $('#divsessionvalidacion').load('./complementos/web/complementos/div_session.php');
                $('#div_chat').load('./complementos/web/complementos/div_chat.php');
                $('#div_botones').load('./complementos/web/complementos/div_mensajes.php');
            }else{
                
            }
        }
    });
}

function enviar_mensaje(parametro, chat, estado){
    cadena="parametro="+parametro+
            "&chat="+chat+
            "&mensaje="+$("#txtmensaje").val()+
            "&estado="+estado;
    $.ajax({
        type:"POST",
        url:"controladores/chat_controlador.php",
        data:cadena,
        success:function(r){
            console.info(r);
            if(r==1){
                $('#div_chat').load('./complementos/web/complementos/div_chat.php');
                $("#txtmensaje").val("");
            }else{
                
            }
        }
    });
}