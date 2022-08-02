$(document).ready(function(){
	$('#div_tabla').load('./componentes/divs/div_compania.php');

	$('#btnactualizar').click(function(){
		actualizar_datos();
	});

	$('#btnsavelogo').click(function(){
		actualizar_logo();
	});

	$('#btnsaveimage').click(function(){
		actualizar_imagen();
	});
});

function cargar_datos(datos){
	dat=datos.split("||");
	$("#txtidu").val(dat[0]);
	$("#txtnombreu").val(dat[1]);
	$("#txtdescripcionu").val(dat[2]);
	$("#txthistoriau").val(dat[3]);
	$("#txtmisionu").val(dat[4]);
	$("#txtvisionu").val(dat[5]);
	$("#txtidl").val(dat[0]);
	$("#txtnombrel").val(dat[1]);
	$("#txtidi").val(dat[0]);
	$("#txtnombrei").val(dat[1]);
}

function actualizar_datos(){
	var valoresinput = [$('#txtnombreu').val(),
					$('#txtdescripcionu').val(),
					$('#txthistoriau').val(),
					$('#txtmisionu').val(),
					$('#txtvisionu').val()];

	mensajeerror = "Llenar: ";
	error = 0;

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Nombre campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 1:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Descripcion campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 2:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Historia campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 3:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Mision campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 4:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Vision campo no vacio.";
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
		url:"controladores/compania_controlador.php",
		data: $('#frmupdatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos actualizados.');
				$('#div_tabla').load('./componentes/divs/div_compania.php');
				$('#modalactualizar').modal('hide');
			}else{
				alertify.error('Error al actualizar los datos.');
			}
		}
	});
}

function actualizar_logo(){
	var form = new FormData(document.getElementById('frmlogo'));

	$.ajax({
		type: "POST",
		url:"controladores/compania_controlador.php",
		data: form,
		processData: false,
		contentType: false,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success("Logo actualizado correctamente.");
				$('#div_tabla').load('./componentes/divs/div_compania.php');
				$('#modallogo').modal("hide");
			}else{
				alertify.error("Error al actualizar la foto.");
			}
		}
	});
}

function actualizar_imagen(){
	var form = new FormData(document.getElementById('frmimagen'));

	$.ajax({
		type: "POST",
		url:"controladores/compania_controlador.php",
		data: form,
		processData: false,
		contentType: false,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success("Imagen actualizada correctamente.");
				$('#div_tabla').load('./componentes/divs/div_compania.php');
				$('#modalimagen').modal("hide");
			}else{
				alertify.error("Error al actualizar la foto.");
			}
		}
	});
}