$(document).ready(function(){
	var parametro = $("#txtparametro").val();
	if(parametro == 1)
	{
		$('#div_tabla').load('./componentes/divs/div_reporte_pedidos.php?fecini='+$("#txtfecini").val()+'&fecfin='+$("#txtfecfin").val());
	}
    
    if(parametro == 2){
		$('#div_tabla').load('./componentes/divs/div_reporte_clientes.php');
    }

    if(parametro == 3){
		$('#div_tabla').load('./componentes/divs/div_reporte_rutas.php?fecini='+$("#txtfecini").val()+'&fecfin='+$("#txtfecfin").val());
    }
});

function filtro_pedidos(parametro, id){
	fecini = $("#txtfecini").val();
	fecfin = $("#txtfecfin").val();
	id = id;

	if(parametro == 1){
		$('#div_tabla').load('./componentes/divs/div_reporte_pedidos.php?fecini='+fecini+'&fecfin='+fecfin);
	}

	if(parametro == 3){
		$('#div_tabla').load('./componentes/divs/div_reporte_rutas.php?fecini='+fecini+'&fecfin='+fecfin);
	}
}

function exportar_pedidos(parametro, id){
	fecini = $("#txtfecini").val();
	fecfin = $("#txtfecfin").val();

	if(parametro == 1){
		window.location = './reportes/pedidos.php?fecini='+fecini+'&fecfin='+fecfin;
	}

	if(parametro == 2){
		window.location = './reportes/clientes.php';
	}

	if(parametro == 3){
		window.location = './reportes/rutas.php?id='+id;
	}	
}
