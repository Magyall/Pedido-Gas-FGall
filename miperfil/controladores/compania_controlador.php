<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../../config/conexion.php');
	require_once('../modelo/compania_modelo.php');

	$clase = new Procesos;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txtnombreu'];
		$dato1 = $_POST['txtdescripcionu'];
		$dato2 = $_POST['txthistoriau'];
		$dato3 = $_POST['txtmisionu'];
		$dato4 = $_POST['txtvisionu'];
		$dato5 = $_POST['txtidu'];

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3,
				$dato4,
				$dato5];

		$conf=$clase->Actualizar($datos);
		echo $conf;
	}

	
	if($_POST['parametro'] == 2){
		$dato0 = utf8_decode($_FILES['filelogo']['name']);
		$dato1 = utf8_decode($_POST['txtidl']);
		$dato2 = utf8_decode($_POST['txtnombrel']);
		$dato3 = pathinfo($dato0, PATHINFO_EXTENSION);
		$dato4 = 'logo_'.date('Y-m-d').'_'.date('h-i').'.'.$dato3;
		
		$direccion = "../../complementos/images/";
		$file = $direccion . $dato4;

		if(move_uploaded_file($_FILES['filelogo']['tmp_name'], $file)){
			$datos = [$dato4,
					$dato1];

			$conf=$clase->ActualizarLogo($datos);
		}else{
			$conf = 2;
		}
		
		echo $conf;
	}


	if($_POST['parametro'] == 3){
		$dato0 = utf8_decode($_FILES['fileimagei']['name']);
		$dato1 = utf8_decode($_POST['txtidi']);
		$dato2 = utf8_decode($_POST['txtnombrei']);
		$dato3 = pathinfo($dato0, PATHINFO_EXTENSION);
		$dato4 = 'img_'.date('Y-m-d').'_'.date('h-i').'.'.$dato3;
		
		$direccion = "../../complementos/images/";
		$file = $direccion . $dato4;

		if(move_uploaded_file($_FILES['fileimagei']['tmp_name'], $file)){
			$datos = [$dato4,
					$dato1];

			$conf=$clase->ActualizarImagen($datos);
		}else{
			$conf = 2;
		}
		
		echo $conf;
	}
 ?>