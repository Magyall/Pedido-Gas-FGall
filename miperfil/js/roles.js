$(document).ready(function(){
	$('#div_tabla').load('./componentes/divs/div_roles.php');

	$('#btnagregar').click(function(){
		agregar_datos();
	});

	$('#btnactualizar').click(function(){
		actualizar_datos();
	});
});

function agregar_datos(){
	var valoresinput = $('#txtdescripciona').val();

	if(!validarletras(valoresinput)){
		alertify.error("Descripcion campo solo texto.");
		return;
	}

	$.ajax({
		type: "POST",
		url:"controladores/roles_controlador.php",
		data: $('#frmadddatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos guardados.');
				$('#div_tabla').load('./componentes/divs/div_roles.php');
				limpiar_inputs();
				$('#modalagregar').modal('hide');
			}else{
				alertify.error('Error al guardar los datos.');
			}
		}
	});
}

function limpiar_inputs(){
	$('#txtdescripciona').val('');
}

function cargar_datos(datos){
	dat=datos.split("||");
	$("#txtid").val(dat[0]);
	$("#txtdescripcionu").val(dat[1]);
}

function actualizar_datos(){
	var valoresinput = $('#txtdescripcionu').val();

	if(!validarletras(valoresinput)){
		alertify.error("Descripcion campo solo texto.");
		return;
	}

	$.ajax({
		type: "POST",
		url:"controladores/roles_controlador.php",
		data: $('#frmupdatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos actualizados.');
				$('#div_tabla').load('./componentes/divs/div_roles.php');
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
		url:"controladores/roles_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos eliminados.');
				$('#div_tabla').load('./componentes/divs/div_roles.php');
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
		url:"controladores/roles_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Estado actualizado.');
				$('#div_tabla').load('./componentes/divs/div_roles.php');
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