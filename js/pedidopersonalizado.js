setInterval("refrescarhora()", 500);

$(document).ready(function(){

	$("#txtemail").prop('readonly', true);
	$("#txtpnom").prop('readonly', true);
	$("#txtsnom").prop('readonly', true);
	$("#txtpape").prop('readonly', true);
	$("#txtsape").prop('readonly', true);
	$("#txtdir").prop('readonly', true);
	$("#txtcel").prop('readonly', true);

	$('#btnagregar').click(function(){
		agregar_datos();
	});

	$('#btnlimpiar').click(function(){
		limpiar_inputs();
	});
});

function verificar_cliente(parametro, dni){
	error = 0;

	if(!validarcedula(dni)){
		limpiar_inputs();
		mensajeerror = "Cedula incorrecta.";
		error = 1;
	}

	if(error == 1){
		alertify.error(mensajeerror);
		return;
	}

	cadena="dni="+dni+
			"&parametro="+parametro;
	$.ajax({
		type: "POST",
		url:"./controladores/pedidos_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r > 0){
				$('#div_usuario').load('./complementos/web/complementos/div_usuario.php');
				$("#txtidusu").val(r);
				alertify.success("El cliente ya existe, se cargara la información almacenada.");
			}else{
				alertify.error('El cliente no existe, llene la información solicitada para continuar.');
				$("#txtemail").prop('readonly', false);
				$("#txtpnom").prop('readonly', false);
				$("#txtsnom").prop('readonly', false);
				$("#txtpape").prop('readonly', false);
				$("#txtsape").prop('readonly', false);
				$("#txtdir").prop('readonly', false);
				$("#txtcel").prop('readonly', false);

				$("#txtemail").val("");
				$("#txtpnom").val("");
				$("#txtsnom").val("");
				$("#txtpape").val("");
				$("#txtsape").val("");
				$("#txtdir").val("");
				$("#txtcel").val("");

				$("#txtidusu").val(0);
			}
		}
	});
}

function agregar_datos(){
	var valoresinput = [$('#txtcantidad').val(),
					$('#txtfecentrega').val(),
					$('#txthorentrega').val(),
					$('#txtcomentario').val()];

	mensajeerror = "Llenar: ";
	error = 0;

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(valoresinput[i] == 0){
	        		mensajeerror = mensajeerror+"<br> Cantidad mayor a 0.";
	        		error = 1;
	        	}
	        break;

	        case 1:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Fecha de entrega.";
	        		error = 1;
	        	}
	        break;

	        case 2:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Hora de entrega.";
	        		error = 1;
	        	}
	        break;

	        case 3:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Comentario de la entrega indicando la direccion y referencias del lugar de entrega.";
	        		error = 1;
	        	}
	        break;
		}
	}	

	if(error == 1){
		alertify.error(mensajeerror);
		return;
	}

	$.ajax({
		type: "POST",
		url:"controladores/pedidos_controlador.php",
		data: $('#frmadddatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Pedido agregado correctamente.');
				limpiar_inputs();
			}else{
				alertify.error('Error al guardar el pedido.');
			}
		}
	});
}

function limpiar_inputs(){
	$('#txtdni').val('');
	$('#txtemail').val('');
	$('#txtcel').val('');
	$('#txtpnom').val('');
	$('#txtsnom').val('');
	$('#txtpape').val('');
	$('#txtsape').val('');
	$('#txtdir').val('');

	$('#txtfecentrega').val('');
	$('#txthorentrega').val('');
	$('#txtcantidad').val('');
	$('#txtcomentario').val('');
}

function refrescarhora(){
	var fecha = new Date();
	var hora = fecha.getHours();
	var minutos = fecha.getMinutes();
	var segundos = fecha.getSeconds();

	if(hora < 10){
		hora = "0"+hora;
	}

	if(minutos < 10){
		minutos = "0"+minutos;
	}

	if(segundos < 10){
		segundos = "0"+segundos;
	}

	$('#txthora').val(hora + ":" + minutos + ":" + segundos);

	$('#divnumero').load('./complementos/web/complementos/div_numeropedido.php');
}