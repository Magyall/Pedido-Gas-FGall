$(document).ready(function(){
	$('#div_tabla').load('./componentes/divs/div_vehiculos.php');

	$('#btnagregar').click(function(){
		agregar_datos();
	});

	$('#btnactualizar').click(function(){
		actualizar_datos();
	});

	$('#btnimagen').click(function(){
		actualizar_imagen();
	});
});

function agregar_datos(){
	$.ajax({
		type: "POST",
		url:"controladores/vehiculos_controlador.php",
		data: $('#frmadddatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos guardados.');
				$('#div_tabla').load('./componentes/divs/div_vehiculos.php');
				limpiar_inputs();
				$('#modalagregar').modal('hide');
			}else{
				alertify.error('Error al guardar los datos.');
			}
		}
	});
}

function limpiar_inputs(){
	$('#txtmodeloa').val('');
	$('#txtplacaa').val('');
}

function cargar_datos(datos){
	dat=datos.split("||");
	$("#txtid").val(dat[0]);
	$("#txtmodelou").val(dat[1]);
	$("#txtplacau").val(dat[2]);
}

function cargar_imagen(datos){
	dat=datos.split("||");
	$("#txtidi").val(dat[0]);
	$("#txtmodeloi").val(dat[1]);
	$("#txtplacai").val(dat[2]);
}

function actualizar_datos(){
	$.ajax({
		type: "POST",
		url:"controladores/vehiculos_controlador.php",
		data: $('#frmupdatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos actualizados.');
				$('#div_tabla').load('./componentes/divs/div_vehiculos.php');
				$('#modalactualizar').modal('hide');
			}else{
				alertify.error('Error al actualizar los datos.');
			}
		}
	});
}

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
		url:"controladores/vehiculos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos eliminados.');
				$('#div_tabla').load('./componentes/divs/div_vehiculos.php');
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
		url:"controladores/vehiculos_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Estado actualizado.');
				$('#div_tabla').load('./componentes/divs/div_vehiculos.php');
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

function actualizar_imagen(){
	var form = new FormData(document.getElementById('frmimagen'));

	$.ajax({
		type: "POST",
		url:"controladores/vehiculos_controlador.php",
		data: form,
		processData: false,
		contentType: false,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success("Foto actualizada correctamente.");
				$('#div_tabla').load('./componentes/divs/div_vehiculos.php');
				$('#modalimagen').modal("hide");
			}else{
				alertify.error("Error al actualizar la foto.");
			}
		}
	});
}