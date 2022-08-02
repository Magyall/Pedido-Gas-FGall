<?php 
	session_start();

	require_once('../../config/conexion.php');
	require_once('../modelo/permisos_modelo.php');

	$clase = new Permisos;

	if($_POST['par']==1){
		$_SESSION['MenuRol'] = $_POST['rol'];
		$_SESSION['SubmenuMenu'] = $_POST['menu'];

		if(isset($_SESSION['MenuRol']) && isset($_SESSION['SubmenuMenu'])){
			echo 1;
		}else{
			echo 2;
		}
	}

	if($_POST['par']==2){
		$rol = $_POST['rol'];
		$submenu = $_POST['submenu'];

		$datos = [$rol,
				$submenu];

		$conf=$clase->Eliminar_submenu($datos);
		echo $conf;
	}

	if($_POST['par']==3){
		$menu = $_POST['menu'];
		$rol = $_POST['rol'];
		$submenu = $_POST['submenu'];

		$datos = [$rol,
				$menu];

		$conf=$clase->Eliminar_menu($datos);

		$datos1 = [$rol,
				$submenu];

		$conf=$clase->Eliminar_submenu($datos1);
		echo $conf;
	}

	if($_POST['par']==4){
		$menu = $_POST['menu'];
		$rol = $_POST['rol'];
		$submenu = $_POST['submenu'];

		$datos = [$rol,
				$menu];

		$conf=$clase->Agregar_menu($datos);

		$datos1 = [$rol,
				$submenu];

		$conf=$clase->Agregar_menu($datos1);
		echo $conf;
	}

	if($_POST['par']==5){
		$rol = $_POST['rol'];
		$submenu = $_POST['submenu'];

		$datos = [$rol,
				$submenu];

		$conf=$clase->Agregar_menu($datos);
		echo $conf;
	}
 ?>
