$(document).ready(function(){
	$('#div_tabla').load('./componentes/divs/div_noticias.php');

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
	var valoresinput = [$('#txttituloa').val(),
					$('#txtdescripciona').val()];

	mensajeerror = "Llenar: ";
	error = 0;

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Titulo campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 1:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Descripcion campo no vacio.";
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
		url:"controladores/noticias_controlador.php",
		data: $('#frmadddatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos guardados.');
				$('#div_tabla').load('./componentes/divs/div_noticias.php');
				limpiar_inputs();
				$('#modalagregar').modal('hide');
			}else{
				alertify.error('Error al guardar los datos.');
			}
		}
	});
}

function limpiar_inputs(){
	$('#txttituloa').val('');
	$('#txturla').val('');
	$('#txtdescripciona').val('');
}

function cargar_datos(datos){
	dat=datos.split("||");
	$("#txtid").val(dat[0]);
	$("#txttitulou").val(dat[1]);
	$("#txturlu").val(dat[4]);
	$("#txtdescripcionu").val(dat[2]);
	$("#txtidi").val(dat[0]);
	$("#txttituloi").val(dat[1]);
}

function actualizar_datos(){
	var valoresinput = [$('#txttitulou').val(),
					$('#txtdescripcionu').val()];

	mensajeerror = "Llenar: ";
	error = 0;

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Titulo campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 1:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Descripcion campo no vacio.";
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
		url:"controladores/noticias_controlador.php",
		data: $('#frmupdatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos actualizados.');
				$('#div_tabla').load('./componentes/divs/div_noticias.php');
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
		url:"controladores/noticias_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos eliminados.');
				$('#div_tabla').load('./componentes/divs/div_noticias.php');
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
		url:"controladores/noticias_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Estado actualizado.');
				$('#div_tabla').load('./componentes/divs/div_noticias.php');
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
		url:"controladores/noticias_controlador.php",
		data: form,
		processData: false,
		contentType: false,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success("Imagen actualizada correctamente.");
				$('#div_tabla').load('./componentes/divs/div_noticias.php');
				$('#modalimagen').modal("hide");
			}else{
				alertify.error("Error al actualizar la foto.");
			}
		}
	});
}

function actualizar_tipo(parametro, id, tipo){
	cadena="txtid="+id+
			"&txttipo="+tipo+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/noticias_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Tipo actualizado.');
				$('#div_tabla').load('./componentes/divs/div_noticias.php');
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}