$(document).ready(function(){
	$('#div_tabla').load('./componentes/divs/div_pedidos.php');
	$("#inputsren").hide();

	$('#btnguardar').click(function(){
		accionpedido();
	});
});

function eliminar_datos(parametro, id){
	alertify.confirm('Eliminar datos', '¿Dese elminar el resgistro?', 
	function(){ delete_datos(parametro, id) }
    , function(){ alertify.error('Cancelado')});
}

function delete_datos(parametro, id){
	cadena="txtid="+id+
			"&parametro="+parametro;
	$.ajax({
		type:"POST",
		url:"controladores/pedidos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos eliminados.');
				$('#div_tabla').load('./componentes/divs/div_pedidos.php');
			}else{
				alertify.error("Error al eliminar los datos");
			}
		}
	});
}

function actualizar_estado(parametro, id, estado){
	cadena="txtid="+id+
			"&txtestado="+estado+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/pedidos_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Estado actualizado.');
				$('#div_tabla').load('./componentes/divs/div_pedidos.php');
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}

function restaurar_datos(parametro, id, estado){
	alertify.confirm('Restaurar datos', '¿Dese restaurar el resgistro?', 
	function(){ actualizar_estado(parametro, id, estado) }
    , function(){ alertify.error('Cancelado')});
}

function cancelar_pedido(parametro, id, estado){
	alertify.confirm('Finalizar pedido', '¿Esta seguro de cancelar y finalizar el pedido?', 
	function(){ actualizar_estado(parametro, id, estado) }
    , function(){ alertify.error('Cancelado')});
}

function actualizar_tipo(parametro, id, tipo){
	cadena="txtid="+id+
			"&txttipo="+tipo+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/pedidos_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Tipo actualizado.');
				$('#div_tabla').load('./componentes/divs/div_pedidos.php');
			}else{
				alertify.error('Error al actualizar el tipo.');
			}
		}
	});
}

function actualizar_repartidor(parametro, id, tipo, fecing, fecent, horent, tip){
	cadena="txtid="+id+
			"&txtrepartidor="+tipo+
			"&txtfecing="+fecing+
			"&txtfecent="+fecent+
			"&txthorent="+horent+
			"&txttipo="+tip+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/pedidos_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Repartidor actualizado actualizado.');
				$('#div_tabla').load('./componentes/divs/div_pedidos.php');
			}else{
				alertify.error('Error al actualizar el repartidor.');
			}
		}
	});
}

function cargar_datos(datos){
	dat=datos.split("||");
	$("#txtcliente").val(dat[16] + ' ' + dat[17]);
	$("#txtcelular").val(dat[18]);
	$("#txtidentificacion").val(dat[19]);
	$("#txtvehiculo").val(dat[21] + ' ' + dat[22]);
	$("#txtdireccion").val(dat[20]);
	$("#txtfecsol").val(dat[4] + ' ' + dat[5]);
	$("#txtfecent").val(dat[6] + ' ' + dat[7]);
	$("#txtfecmax").val(dat[8] + ' ' + dat[9]);
	$("#txtcomentario").val(dat[11]);
}

function cargar_id(datos){
	dat=datos.split("||");
	$("#txtid").val(dat[0]);
}

function habilitarcampos(dato){
	if(dato == 1){
		$("#inputsren").show();
	}else{
		$("#inputsren").hide();
	}
}

function accionpedido(){
	cadena="txtid="+$("#txtid").val()+
			"&selectaccion="+$("#selectaccion").val()+
			"&txtfecren="+$("#txtfecren").val()+
			"&txthorren="+$("#txthorren").val()+
			"&parametro="+6;

	$.ajax({
		type: "POST",
		url:"controladores/pedidos_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Estado actualizado.');
				$('#div_tabla').load('./componentes/divs/div_pedidos.php');
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}