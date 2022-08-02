<?php 
	session_start();
	date_default_timezone_set("America/Bogota");

	require_once('../config/conexion.php');
	require_once('../modelo/pedido_modelo.php');

	$clase = new Pedido;

	if($_POST['parametro'] == 1){
		$dato0 = $_POST['txtidusu'];
		$dato1 = $_POST['txtnumero'];
		$dato2 = $_POST['txtfecha'];
		$dato3 = $_POST['txthora'];
		$dato4 = $_POST['txtfecentrega'];
		$dato5 = $_POST['txthorentrega'];
		$dato6 = $_POST['txtcantidad'];
		$dato7 = $_POST['txtcomentario'];
		$dato8 = $_POST['txtlat'];
		$dato9 = $_POST['txtlon'];
		$dato10 = $_POST['txttipo'];
		$dato11 = "N";

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
				$dato11];

		$comp=$clase->Verificar($datos);
		
		if($comp == 0){
			$conf=$clase->Agregar($datos);
		}else{
			$conf = 0;
		}

		echo $conf;
	}

	if($_POST['parametro'] == 2){
		$dato0 = $_POST['dni'];

		$datos = [$dato0];

		$conf=$clase->Verificar_Usuario($datos);

		echo $conf;
	}

	if($_POST['parametro'] == 3){
		$dato0 = $_POST['txtidusu'];

		if($dato0 == 0){
			$dato1 = $_POST['txtdni'];
			$dato2 = $_POST['txtpnom'];
			$dato3 = $_POST['txtsnom'];
			$dato4 = $_POST['txtpape'];
			$dato5 = $_POST['txtsape'];
			$dato6 = $_POST['txtemail'];
			$dato7 = $_POST['txtdir'];
			$dato8 = $_POST['txtcel'];
			$dato9 = date('Y-m-d');
			$dato10 = "admin.jpg";
			$dato11 = "A";
			$dato12 = 0;
			$dato13 = 3;

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
				$dato12,
				$dato13];
			
			$conf1=$clase->AgregarUsuario($datos);

			$conf2=$clase->Verificar_Usuario($datos);

			$dato14 = $conf2;
			$dato15 = $_POST['txtnumero'];
			$dato16 = $_POST['txtfecha'];
			$dato17 = $_POST['txthora'];
			$dato18 = $_POST['txtfecentrega'];
			$dato19 = $_POST['txthorentrega'];
			$dato20 = $_POST['txtcantidad'];
			$dato21 = $_POST['txtcomentario'];
			$dato22 = "";
			$dato23 = "";
			$dato24 = 2;
			$dato25 = "N";

			$datos1 = [$dato14,
				$dato15,
				$dato16,
				$dato17,
				$dato18,
				$dato19,
				$dato20,
				$dato21,
				$dato22,
				$dato23,
				$dato24,
				$dato25];

			$comp=$clase->Verificar($datos);

			if($comp == 0){
				$conf=$clase->Agregar($datos);
			}else{
				$conf = 0;
			}
		}else{
			$dato14 = $_POST['txtidusu'];
			$dato15 = $_POST['txtnumero'];
			$dato16 = $_POST['txtfecha'];
			$dato17 = $_POST['txthora'];
			$dato18 = $_POST['txtfecentrega'];
			$dato19 = $_POST['txthorentrega'];
			$dato20 = $_POST['txtcantidad'];
			$dato21 = $_POST['txtcomentario'];
			$dato22 = "";
			$dato23 = "";
			$dato24 = 2;
			$dato25 = "N";

			$datos1 = [$dato14,
				$dato15,
				$dato16,
				$dato17,
				$dato18,
				$dato19,
				$dato20,
				$dato21,
				$dato22,
				$dato23,
				$dato24,
				$dato25];

			$comp=$clase->Verificar($datos1);

			if($comp == 0){
				$conf=$clase->Agregar($datos1);
			}else{
				$conf = 0;
			}
		}

		echo $conf;
	}
 ?>