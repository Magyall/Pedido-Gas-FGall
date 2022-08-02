<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../../config/conexion.php');
	require_once('../modelo/chat_modelo.php');

	$idusu = $_SESSION['User'];

	$clase = new Chat;

	if($_POST['parametro'] == -1){
		$dato0 = $_POST['id'];

		unset($_SESSION['ChatRec']);

		echo 1;
	}

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['receptor'];
		$dato1 = $_POST['id'];

		$datos = [$dato0,
				$dato1];

		$_SESSION['ChatRec'] = $dato1;

		$conf=$clase->ActualizarRecepcionista($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato0 = $_POST['receptor'];
		$dato1 = $_POST['id'];

		$datos = [$dato0,
				$dato1];

		$_SESSION['ChatRec'] = $dato1;

		$conf=$clase->ActualizarRecepcionista($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 3){

		$dato0 = $_POST['id'];
		$dato1 = $_POST['mensaje'];
		$dato2 = $_POST['estado'];
		$dato3 = $_POST['usuario'];
		
		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->Agregarmensajes($datos);

		echo $conf;
	}

	if($_POST['parametro'] == 4){

		$dato0 = "I";
		$dato1 = $_POST['id'];
		
		$datos = [$dato0,
				$dato1];

		unset($_SESSION['ChatRec']);				

		$conf=$clase->Cerrarchat($datos);

		echo $conf;
	}
 ?>