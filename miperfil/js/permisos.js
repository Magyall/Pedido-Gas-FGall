function cargar_rol(dato){
	$("#txtidrol").val(dato);
	$("#txtidmenu").val(0);	
	
	cadena="rol="+$('#txtidrol').val()+
			"&menu="+$('#txtidmenu').val()+
			"&par="+1;
	$.ajax({
		type:"POST",
		url:"controladores/permisos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#form_submenu').load('componentes/permisos/permisos_submenu.php');
			}else{

			}
		}
	});	
}

function cargar_menu(menu){
	$("#txtidmenu").val(menu);	

	cadena="rol="+$('#txtidrol').val()+
			"&menu="+$('#txtidmenu').val()+
			"&par="+1;
	$.ajax({
		type:"POST",
		url:"controladores/permisos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#form_submenu').load('componentes/permisos/permisos_submenu.php');
			}else{

			}
		}
	});	
}

function eliminar_menuysubmenu(menu, rol, submenu){
	cadena="menu="+menu+
			"&rol="+rol+
			"&submenu="+submenu+
			"&par="+3;
	$.ajax({
		type:"POST",
		url:"controladores/permisos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#form_submenu').load('componentes/permisos/permisos_submenu.php');
			}else{

			}
		}
	});
}

function eliminar_submenu(rol, menu){
	cadena="rol="+rol+
			"&submenu="+menu+
			"&par="+2;
	$.ajax({
		type:"POST",
		url:"controladores/permisos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#form_submenu').load('componentes/permisos/permisos_submenu.php');
			}else{

			}
		}
	});
}

function agregar_menuysubmenu(menu, rol, submenu){
	cadena="menu="+menu+
			"&rol="+rol+
			"&submenu="+submenu+
			"&par="+4;
	$.ajax({
		type:"POST",
		url:"controladores/permisos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#form_submenu').load('componentes/permisos/permisos_submenu.php');
			}else{

			}
		}
	});
}

function agregar_submenu(rol, menu){
	cadena="rol="+rol+
			"&submenu="+menu+
			"&par="+5;
	$.ajax({
		type:"POST",
		url:"controladores/permisos_controlador.php",
		data:cadena,
		success:function(r){
			console.info(r);
			if(r==1){
				$('#form_submenu').load('componentes/permisos/permisos_submenu.php');
			}else{

			}
		}
	});
}

function guardarcambios(){
	location.href="panel.php?pag=panel/permisos";
}