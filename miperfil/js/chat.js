setInterval("loadMensages()", 500);

var loadMensages = function () {
	$('#div_chats').load('./componentes/chat/div_chats.php');

    var session = $("#txtsesionrecepcionista").val();
    if(session != 0){
        $('#div_mensajes').load('./componentes/chat/div_mensajes.php');
    }
}

function activarchat(parametro, receptor, id){
	cerrarchat(-1, 0);
	$('#div_mensajes').load('./componentes/chat/div_mensajes.php?par='+parametro+'&rec='+receptor+'&id='+id);
	$('#div_accionchat').load('./componentes/chat/div_botones.php');
}

function activar(parametro, receptor, id){
	cadena="id="+id+
			"&receptor="+receptor+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/chat_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#div_accionchat').load('./componentes/chat/div_botones.php');
				$('#txtsesionrecepcionista').val(id);
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}

function cerrarchat(parametro, id){
    if(parametro == 4){
		$('#div_mensajes').html("");
	}
    
	cadena="id="+id+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/chat_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#div_accionchat').load('./componentes/chat/div_botones.php');
				$('#txtsesionrecepcionista').val(0);
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}

function enviarmensajes(parametro, id, estado, usuario){
	cadena="id="+id+
			"&mensaje="+$("#txtmensaje").val()+
			"&estado="+estado+
			"&usuario="+usuario+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/chat_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}