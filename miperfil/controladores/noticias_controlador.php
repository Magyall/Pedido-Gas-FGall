<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../../config/conexion.php');
	require_once('../modelo/noticias_modelo.php');

	$clase = new Procesos;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txttituloa'];
		$dato1 = $_POST['txtdescripciona'];
		$dato2 = "Sinfoto";
		$dato3 = $_POST['txturla'];
		$dato4 = date("Y-m-d");
		$dato5 = date("h:i:s");
		$dato6 = 3;
		$dato7 = "I";

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3,
				$dato4,
				$dato5,
				$dato6,
				$dato7];

		$conf=$clase->Agregar($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato0 = $_POST['txttitulou'];
		$dato1 = $_POST['txtdescripcionu'];
		$dato2 = $_POST['txturlu'];
		$dato3 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->Actualizar($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 3){
		$dato0 = "E";
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->EliminarLogico($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 4){
		$dato1 = $_POST['txtid'];

		$conf=$clase->Eliminar($dato1);
		echo $conf;
	}

	if($_POST['parametro'] == 5){
		$dato0 = $_POST['txtestado'];
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->ActualizarEstado($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 6){
		$dato0 = utf8_decode($_FILES['fileimagen']['name']);
		$dato1 = utf8_decode($_POST['txtidi']);
		$dato2 = utf8_decode($_POST['txttituloi']);
		$dato3 = pathinfo($dato0, PATHINFO_EXTENSION);
		$dato4 = 'Noticia_'.date("Y-m-d").'_'.date("h-i").'.'.$dato3;
		
		$direccion = "../../complementos/imagenes/noticias/";
		$file = $direccion . $dato4;

		if(move_uploaded_file($_FILES['fileimagen']['tmp_name'], $file)){
			$datos = [$dato4,
					$dato1];

			$conf=$clase->ActualizarImagen($datos);
		}else{
			$conf = 2;
		}
		
		echo $conf;
	}

	if($_POST['parametro'] == 7){
		$dato0 = $_POST['txttipo'];
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->ActualizarTipo($datos);
		echo $conf;
	}
 ?>