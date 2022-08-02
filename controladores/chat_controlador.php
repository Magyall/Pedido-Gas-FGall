<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../config/conexion.php');
	require_once('../modelo/chat_modelo.php');

	$clase = new Chat;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txtusuario'];
		$dato1 = $_POST['txtcelular'];
		$dato2 = $_POST['txtemail'];
		$dato3 = "A";

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->Agregar($datos);

		$idchat=$clase->chat();	

		$_SESSION['chat'] = $idchat;

		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$datos = ["I",
				$_POST['chat']];

		$conf=$clase->Cerrarchat($datos);

		unset($_SESSION['chat']);

		echo $conf;
	}

	if($_POST['parametro'] == 3){
		$dato0 = $_POST['chat'];
		$dato1 = $_POST['mensaje'];
		$dato2 = $_POST['estado'];
		$dato3 = 0;

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3];

		$conf=$clase->Agregarmensajes($datos);

		echo $conf;
	}
 ?>