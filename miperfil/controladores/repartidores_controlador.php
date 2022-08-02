<?php 
	session_start();

	require_once('../../config/conexion.php');
	require_once('../modelo/repartidores_modelo.php');

	$clase = new Procesos;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txtcedulaa'];
		$dato1 = $_POST['txtpnombrea'];
		$dato2 = $_POST['txtsnombrea'];
		$dato3 = $_POST['txtpapellidoa'];
		$dato4 = $_POST['txtsapellidoa'];
		$dato5 = $_POST['txtemaila'];
		$dato6 = $_POST['txtdirecciona'];
		$dato7 = $_POST['txtcelulara'];
		$dato8 = date('Y-m-d');
		$dato9 = "admin.jpg";
		$dato10 = "I";
		$dato11 = 0;
		$dato12 = 4;

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3,
				$dato4,
				$dato5,
				$dato6,
				$dato7,
				$dato8,
				$dato9,
				$dato10,
				$dato11,
				$dato12];

		$conf=$clase->Agregar($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato0 = $_POST['txtcedulau'];
		$dato1 = $_POST['txtpnombreu'];
		$dato2 = $_POST['txtsnombreu'];
		$dato3 = $_POST['txtpapellidou'];
		$dato4 = $_POST['txtsapellidou'];
		$dato5 = $_POST['txtemailu'];
		$dato6 = $_POST['txtdireccionu'];
		$dato7 = $_POST['txtcelularu'];
		$dato8 = $_POST['txtid'];

		$datos = [$dato0,
				$dato1,
				$dato2,
				$dato3,
				$dato4,
				$dato5,
				$dato6,
				$dato7,
				$dato8];

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
		$dato0 = $_POST['txtpassword1'];
		$dato1 = $_POST['txtemailc'];
		$dato2 = md5($dato1.','.$dato0);
		$dato3 = $_POST['txtidc'];

		$datos = [$dato2,
				$dato3];

		$conf=$clase->ActualizarPassword($datos);
		echo $conf;
	}

	if($_POST['parametro'] == 7){
		$dato0 = $_POST['vehiculo'];
		$dato1 = $_POST['id'];

		$datos = [$dato0,
				$dato1];

		$conf=$clase->ActualizarVehiculo($datos);
		echo $conf;
	}
 ?>