<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../config/conexion.php');
	require_once('../modelo/pedido_modelo.php');

	$clase = new Pedido;

	if($_POST['parametro'] == 1){
		$dato0 = "C";
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->ActualizarEstado($datos);
		
		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato0 = "E";
		$dato1 = date("Y-m-d");
		$dato2 = date("H:i:s");
		$dato3 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->Actualizarestadonormal($datos);
		
		echo $conf;
	}

	if($_POST['parametro'] == 3){
		$cant = $_POST['cant'];

		$cant = $cant + 1;

		if($cant >= 3){
			$dato0 = "H";
		}else{
			$dato0 = "I";
		}

		
		$dato1 = $_POST['comentario'];
		$dato2 = $cant;
		$dato3 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->ActualizarComentario($datos);
		
		echo $conf;
	}

	if($_POST['parametro'] == 4){
		$dato0 = $_POST['nuevafecha'];
		$dato1 = $_POST['nuevahora'];
		$dato2 = "A";
		$dato3 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->ReagendarPedido($datos);
		
		echo $conf;
	}

	if($_POST['parametro'] == 5){
		$dato0 = "E";
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->ActualizarEstado($datos);
		
		echo $conf;
	}
 ?>