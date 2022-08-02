$(document).ready(function(){
	$('#div_perfil').load('./componentes/divs/div_perfil.php');
});

function guardar_cambios(){
	var valoresinput = [$('#txtdni').val(),
					$('#txtpnom').val(),
					$('#txtpape').val(),
					$('#txtdir').val(),
					$('#txtfecnac').val(),
					$('#txtmail').val(),
					$('#txtcel').val()];

	mensajeerror = "Llenar: ";
	error = 0;

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Cedula campo no vacio.";
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
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Fecha nacimiento campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 5:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Email campo no vacio.";
	        		error = 1;
	        	}
	        break;

	        case 6:
	        	if(!unvacio(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Celular campo no vacio.";
	        		error = 1;
	        	}
	        break;
		}
	}	

	for (i = 0; i < valoresinput.length; i++)
	{
		switch (i) {
	        case 0:
	        	if(!validarcedula(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Cedula incorrecta.";
	        		error = 1;
	        	}
	        break;

	        case 5:
	        	if(!validaremail(valoresinput[i])){
	        		mensajeerror = mensajeerror+"<br> Email incorrecto.";
	        		error = 1;
	        	}
	        break;

	        case 6:
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

	var parametro = 1;

	cadena="parametro="+parametro+
			"&Id="+$("#txtid").val()+
			"&Dni="+$("#txtdni").val()+
			"&Pnom="+$("#txtpnom").val()+
			"&Pape="+$("#txtpape").val()+
			"&Dir="+$("#txtdir").val()+
			"&Fecnac="+$("#txtfecnac").val()+
			"&Mail="+$("#txtmail").val()+
			"&Snom="+$("#txtsnom").val()+
			"&Sape="+$("#txtsape").val()+
			"&Cel="+$("#txtcel").val()+
			"&Fecreg="+$("#txtfecreg").val();

	$.ajax({
		type:"POST",
		url:"controladores/perfil_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success("Datos guardados correctamente.");
				$('#div_perfil').load('./componentes/divs/div_perfil.php');
			}else{

			}
		}
	});	
}

function cambiar_contraseña(){
	pass1 = $('#txtcontrasenia').val();
	pass2 = $('#txtnuevacontra').val();

  	if(pass1 != pass2){
		alertify.error("Las contraseñas no coinciden.");
		return;
	}

	if(validarpassword(pass1) == 1){
		return;
	}

	var parametro = 2;

	cadena="parametro="+parametro+
			"&Id="+$("#txtid").val()+
			"&Contra1="+$("#txtcontrasenia").val()+
			"&Contra2="+$("#txtnuevacontra").val()+
			"&Mail="+$("#txtmail").val();

	$.ajax({
		type:"POST",
		url:"controladores/perfil_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				alertify.success("Contraseña actualizada correctamente.");
				$('#div_perfil').load('./componentes/divs/div_perfil.php');
			}else{
				if(r==3){
					alertify.error("Las contraseñas no coinciden.");
				}else{
					alertify.error("Error al actualizar la contraseña.");
				}
			}
		}
	});	
}

function cargarfoto(datos){
	detalledatos=datos.split("||");

	$("input[name=txtiduser]").val(detalledatos[0]);
	$("input[name=txtdnifile]").val(detalledatos[1]);
	$("input[name=txtnamefile]").val(detalledatos[2]+'_'+detalledatos[4]);
	$("input[name=txtfotouser]").val(detalledatos[6]);
}

function guardarfoto(data){
	var datosfoto = data.split('/');
	
	cadena="user="+datosfoto[0]+
			"&fotouser="+datosfoto[1]+
			"&parametro="+3;
	$.ajax({
		type:"POST",
		url:"controladores/perfil_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#div_mensaje').html('<div>Para actualizar su foto en el panel debe actualizar la página.</div>');
				alertify.success("Foto actualizada correctamente.");
			}else{
				alertify.error("Error al actualizar la foto.");
			}
		}
	});
}

function actualizarpagina(){
	location.href="panel.php?pag=panel/perfil";
}

$uploadCrop = $('#upload-input').croppie({
  enableExif: true,
  viewport: {
      width: 200,
      height: 200,
      type: 'square'
  },
  boundary: {
      width: 250,
      height: 250
  }
});

$('#upload').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
      
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
  	namefile=$("#txtdnifile").val()+'_'+$("#txtnamefile").val();
  	iduser=$("#txtiduser").val();
  	dat=iduser+';'+namefile+';'+resp;

  	fileName = $('#upload').val();

  	if(!unvacio(fileName)){
  		alertify.error("No ha subido ninguna foto.");
		return;
  	}

  	$.ajax({
      url:"controladores/perfil_controlador.php",
      type: "POST",
      data: {"image":dat},
      success: function (data) {
		guardarfoto(data);
      }
    });
  });
});