setInterval("cronometro()", 500);

function marcar_repartidor(parametro, id){
	cadena="txtid="+id+
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

function cronometro(){
	var fecha = new Date();
	var day = fecha.getDate();
	var month = fecha.getMonth() + 1;
	var year = fecha.getFullYear();
	var hora = fecha.getHours();
	var minutos = fecha.getMinutes();
	var segundos = fecha.getSeconds();

	if(month < 10){
		month = "0"+month;
	}

	if(day < 10){
		day = "0"+day;
	}

	if(hora < 10){
		hora = "0"+hora;
	}

	if(minutos < 10){
		minutos = "0"+minutos;
	}

	if(segundos < 10){
		segundos = "0"+segundos;
	}

	var fechaactual = year + "-" + month + "-" + day;

	var horaactual = hora + ":" + minutos + ":" + segundos;

	var hormax = $("#txthoramax").val();

	
	var hora1 = (hormax).split(":"),
	    hora2 = (horaactual).split(":"),
	    t1 = new Date(),
	    t2 = new Date();
	 
	t1.setHours(hora1[0], hora1[1], hora1[2]);
	t2.setHours(hora2[0], hora2[1], hora2[2]);
 

	t1.setHours(t1.getHours() - t2.getHours(), t1.getMinutes() - t2.getMinutes(), t1.getSeconds() - t2.getSeconds());
	

	if($("#txtfecmax").val() == fechaactual){
		$("#hor_limite").html(t1.getHours() + ":" + t1.getMinutes() + ":" + t1.getSeconds());
	}else{
		$("#hor_limite").html("No disponible.");
	}
}

function cargardivs() {
	$("#div_comentario").hide();
}

function mostrardivs(identificador){
	if(identificador == 1){
		$("#div_comentario").show();
		$("#div_ubicacion").hide();
      	$("#btnentregado").prop("disabled", true);
	}else{
		$("#div_comentario").hide();
		$("#div_ubicacion").show();
		$("#btnentregado").prop("disabled", false);
	}

	
}

function savecomentario(parametro, id, comentario, cant){
	cadena="txtid="+id+
			"&comentario="+comentario+
			"&cant="+cant+
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