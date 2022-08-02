setInterval("refrescarhora()", 500);

$(document).ready(function(){
	$("#divpersonalizado").hide();

	$('#btnagregar').click(function(){
		agregar_datos();
	});

	$('#btnlimpiar').click(function(){
		limpiar_inputs();
	});
});

function agregar_datos(){
	error = 0;

	if($('#txttipo').val() == 0){
		mensajeerror = "Seleccione un tipo de pedido.";
		error = 1;
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
	/*
	refrescarhora();
	var fecha = new Date();
	var day = fecha.getDate();
	var month = fecha.getMonth() + 1;
	var year = fecha.getFullYear();
	
	$('#txtfecha').val(year + "-" + month + "-" + day);
	$('#txthora').val(hora + ":" + minutos + ":" + segundos);
	*/
	$('#txtfecentrega').val('');
	$('#txthorentrega').val('');
	$('#txtcantidad').val('');
	$('#txttipo').val(0);
	$('#txtcomentario').val('');
}

function mostrarocultardiv(){
    identificador = $("#txttipo").val();

    if(identificador == 2){
        $("#divpersonalizado").show();
    }else{
        $("#divpersonalizado").hide();
    }
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


function ocultardivs(){
	$("#div_normales").hide();
	$("#div_incompletos").hide();
}

function mostrardivnormales(){
	$("#div_normales").show();
	$("#div_incompletos").hide();
	$("#div_inicio").hide();
}

function mostrardivincompletos(){
	$("#div_normales").hide();
	$("#div_incompletos").show();	
	$("#div_inicio").hide();
}

function comenzarentrega(parametro, id){
	cadena="txtid="+id+
			"&parametro="+parametro;
	$.ajax({
		type: "POST",
		url:"../controladores/repartidor_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				window.location = "detallepedido.php?id="+id;
			}else{
				alertify.error('Error al guardar el pedido.');
			}
		}
	});
}

function reagendar_pedido(parametro, id, nuevafecha, nuevahora){
	cadena="txtid="+id+
			"&nuevafecha="+nuevafecha+
			"&nuevahora="+nuevahora+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"../controladores/repartidor_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Entregado.');
				location.href="./pedidorepartidor.php";
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}