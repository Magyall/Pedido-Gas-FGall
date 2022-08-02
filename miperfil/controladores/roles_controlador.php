<?php 
	session_start();

	require_once('../../config/conexion.php');
	require_once('../modelo/roles_modelo.php');

	$clase = new Procesos;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txtdescripciona'];
		$dato1 = "I";

		$datos = [$dato0,
				$dato1];

		$conf=$clase->Agregar($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato0 = $_POST['txtdescripcionu'];
		$dato1 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1];

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
 ?>