<?php 
	session_start();

	require_once('../../config/conexion.php');
	require_once('../modelo/vehiculos_modelo.php');

	$clase = new Procesos;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txtmodeloa'];
		$dato1 = $_POST['txtplacaa'];
		$dato2 = "Sinfoto";
		$dato3 = "I";

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->Agregar($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato0 = $_POST['txtmodelou'];
		$dato1 = $_POST['txtplacau'];
		$dato2 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1,
				$dato2];

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
		$dato2 = utf8_decode($_POST['txtmodeloi']);
		$dato3 = utf8_decode($_POST['txtplacai']);
		$dato4 = pathinfo($dato0, PATHINFO_EXTENSION);
		$dato5 = $dato2.'_'.$dato3.'.'.$dato4;
		
		$direccion = "../../complementos/imagenes/vehiculos/";
		$file = $direccion . $dato5;

		if(move_uploaded_file($_FILES['fileimagen']['tmp_name'], $file)){
			$datos = [$dato5,
					$dato1];

			$conf=$clase->ActualizarImagen($datos);
		}else{
			$conf = 2;
		}
		
		echo $conf;
	}
 ?>