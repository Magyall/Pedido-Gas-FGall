$(document).ready(function(){
	$('#div_tabla').load('./componentes/divs/div_sliders.php');

	$('#btnactualizar').click(function(){
		actualizar_datos();
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
	$("#txtidi").val(dat[0]);
}

function actualizar_datos(){
	var valoresinput = [$('#txtnombreu').val(),
					$('#txtdescripcionu').val()];

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
		}
	}	

	if(error == 1){
		alertify.error(mensajeerror);
		return;
	}

	$.ajax({
		type: "POST",
		url:"controladores/sliders_controlador.php",
		data: $('#frmupdatos').serialize(),
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success('Datos actualizados.');
				$('#div_tabla').load('./componentes/divs/div_sliders.php');
				$('#modalactualizar').modal('hide');
			}else{
				alertify.error('Error al actualizar los datos.');
			}
		}
	});
}

function actualizar_imagen(){
    var form = new FormData(document.getElementById('frmimagen'));

	$.ajax({
		type: "POST",
		url:"controladores/sliders_controlador.php",
		data: form,
		processData: false,
		contentType: false,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success("Imagen actualizada correctamente.");
				$('#div_tabla').load('./componentes/divs/div_sliders.php');
				$('#modalimagen').modal("hide");
			}else{
				alertify.error("Error al actualizar la foto.");
			}
		}
	});
}