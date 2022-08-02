<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../../config/conexion.php');
	require_once('../modelo/pedidos_modelo.php');

	$clase = new Procesos;

	if($_POST['parametro'] == 1){
		$dato0 = "E";
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->EliminarLogico($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato1 = $_POST['txtid'];

		$conf=$clase->Eliminar($dato1);
		echo $conf;
	}

	if($_POST['parametro'] == 3){
		$dato0 = $_POST['txtestado'];
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->ActualizarEstado($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 4){
		$dato0 = $_POST['txttipo'];
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->ActualizarTipo($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 5){
		$horent = $_POST['txthorent'];
		$tipo = $_POST['txttipo'];

		if($tipo == 2){
			$fechaAuxiliar  = strtotime("120 minutes", strtotime($horent));  
			$dato2 = $_POST['txtfecent'];
			$dato3 = date('H:i:s', $fechaAuxiliar);
		}else{
			$dato2 = $_POST['txtfecing'];
			$dato3 = "";
		}

		$dato0 = $_POST['txtrepartidor'];
		$dato1 = $_POST['txtid'];
		$dato4 = "A";

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];
		$datos1 = [$dato4,
				$dato1];

		$conf=$clase->ActualizarRepartidor($datos);
		$conf1=$clase->ActualizarEstado($datos1);
		echo $conf;
	}

	if($_POST['parametro'] == 6){
		$dato0 = $_POST['selectaccion'];
		$dato1 = $_POST['txtfecren'];
		$dato2 = $_POST['txthorren'];
		$dato3 = $_POST['txtid'];
		$dato4 = date("Y-m-d");
		$dato5 = date("H:i:s");
		

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3,
				$dato4,
				$dato5];

		$conf=$clase->accionpedido($datos);

		echo $conf;
	}
 ?>