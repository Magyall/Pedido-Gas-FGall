$(document).ready(function(){
	$('#div_tabla').load('./componentes/divs/div_repartidores.php');

	$('#btnagregar').click(function(){
		agregar_datos();
	});

	$('#btnactualizar').click(function(){
		actualizar_datos();
	});

	$('#btnpassword').click(function(){
		actualizar_password();
	});
});

function agregar_datos(){
	var valoresinput = [$('#txtcedulaa').val(),
					$('#txtpnombrea').val(),
					$('#txtpapellidoa').val(),
					$('#txtdirecciona').val(),
					$('#txtemaila').val(),
					$('#txtcelulara').val()];

	mensajeerror = "Llenar: ";
	error = 0;

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(!validarcedula(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Cedula incorrecta.";
	        		error = 1;
	        	}
	        break;

	        case 1:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Primer nombre campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 2:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Primer apellido campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 3:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Direccion campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 4:
	        	if(!validaremail(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Email incorrecto.";
	        		error = 1;
	        	}
	        break;

	        case 5:
	        	if(!validarcelular(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Celular incorrecto.";
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
		url:"controladores/repartidores_controlador.php",
		data: $('#frmadddatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos guardados.');
				$('#div_tabla').load('./componentes/divs/div_repartidores.php');
				limpiar_inputs();
				$('#modalagregar').modal('hide');
			}else{
				alertify.error('Error al guardar los datos.');
			}
		}
	});
}

function limpiar_inputs(){
	$('#txtcedulaa').val('');
	$('#txtpnombrea').val('');
	$('#txtpapellidoa').val('');
	$('#txtdirecciona').val('');
	$('#txtemaila').val('');
	$('#txtsnombrea').val('');
	$('#txtsapellidoa').val('');
	$('#txtcelulara').val('');
}

function cargar_datos(datos){
	dat=datos.split("||");
	$("#txtid").val(dat[0]);
	$('#txtcedulau').val(dat[1]);
	$('#txtpnombreu').val(dat[2]);
	$('#txtsnombreu').val(dat[3]);
	$('#txtpapellidou').val(dat[4]);
	$('#txtsapellidou').val(dat[5]);
	$('#txtemailu').val(dat[6]);
	$('#txtdireccionu').val(dat[8]);
	$('#txtcelularu').val(dat[9]);
}

function cargar_id(datos){
	dat=datos.split("||");
	$("#txtidc").val(dat[0]);
	$("#txtemailc").val(dat[6]);
}

function actualizar_datos(){
	var valoresinput = [$('#txtcedulau').val(),
					$('#txtpnombreu').val(),
					$('#txtpapellidou').val(),
					$('#txtdireccionu').val(),
					$('#txtemailu').val(),
					$('#txtcelularu').val()];

	mensajeerror = "Llenar: ";
	error = 0;

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(!validarcedula(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Cedula incorrecta.";
	        		error = 1;
	        	}
	        break;

	        case 1:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Primer nombre campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 2:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Primer apellido campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 3:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Direccion campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 4:
	        	if(!validaremail(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Email incorrecto.";
	        		error = 1;
	        	}
	        break;

	        case 5:
	        	if(!validarcelular(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Celular incorrecto.";
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
		url:"controladores/repartidores_controlador.php",
		data: $('#frmupdatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos actualizados.');
				$('#div_tabla').load('./componentes/divs/div_repartidores.php');
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
		url:"controladores/repartidores_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos eliminados.');
				$('#div_tabla').load('./componentes/divs/div_repartidores.php');
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
		url:"controladores/repartidores_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Estado actualizado.');
				$('#div_tabla').load('./componentes/divs/div_repartidores.php');
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

function actualizar_password(){
	var password1 = $('#txtpassword1').val();
	var password2 = $('#txtpassword2').val();

	if(password1 != password2){
		alertify.error("Las contraseñas no coinciden.");
		return;
	}

	if(validarpassword(password1) == 1){
		return;
	}

	if(password1 == password2){
		$.ajax({
			type: "POST",
			url:"controladores/repartidores_controlador.php",
			data: $('#frmuppassword').serialize(),
			success:function(r){
				console.info(r);
				if(r==1){
					alertify.success('Contraseña actualizada.');
					$('#txtpassword1').val('');
					$('#txtpassword2').val('');
					$('#modalpassword').modal('hide');
					$('#div_tabla').load('./componentes/divs/div_repartidores.php');
				}else{
					alertify.error('Error al actualizar la contraseña.');
				}
			}
		});
	}else{
		alertify.error('Las contraseñas no coinciden.');
	}
	
}

function actualizar_rol(parametro, id, valor){
	cadena="txtid="+valor+
			"&txtidrol="+id+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/repartidores_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Rol actualizado.');
				$('#div_tabla').load('./componentes/divs/div_repartidores.php');
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}

function actualizar_vehiculo(parametro, id, vehiculo){
	cadena="id="+id+
			"&vehiculo="+vehiculo+
			"&parametro="+parametro;

	$.ajax({
		type: "POST",
		url:"controladores/repartidores_controlador.php",
		data: cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('vehiculo actualizado.');
				$('#div_tabla').load('./componentes/divs/div_repartidores.php');
			}else{
				alertify.error('Error al actualizar el estado.');
			}
		}
	});
}