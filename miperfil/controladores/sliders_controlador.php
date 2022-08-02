<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../../config/conexion.php');
	require_once('../modelo/sliders_modelo.php');

	$clase = new Procesos;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txtnombreu'];
		$dato1 = $_POST['txtdescripcionu'];
		$dato2 = $_POST['txtidu'];

		$datos = [$dato0,
				$dato1,
				$dato2];

		$conf=$clase->Actualizar($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 2){
	    $dato0 = utf8_decode($_FILES['fileimagei']['name']);
		$dato1 = utf8_decode($_POST['txtidi']);
		$dato2 = pathinfo($dato0, PATHINFO_EXTENSION);
		$dato3 = 'slider_'.date('Y-m-d').'_'.date('h-i-s').'.'.$dato2;
		
		$direccion = "../../complementos/imagenes/sliders/";
		$file = $direccion . $dato3;
        if(move_uploaded_file($_FILES['fileimagei']['tmp_name'], $file)){
			$datos = [$dato3,
					$dato1];

			$conf=$clase->ActualizarImagen($datos);
		}else{
			$conf = 2;
		}
		
		echo $conf;
	}
 ?>