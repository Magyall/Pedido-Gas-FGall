<?php
session_start();

require_once('../config/conexion.php');
require_once('../config/mail.php');
require_once('../modelo/login_modelo.php');

$clase = new Login;

if($_POST['parametro'] == 1){
	$datos=[$_POST['txtemail'],
		md5($_POST['txtemail'].",".$_POST['txtpass']),
			$_POST['txtver']];	
	echo $clase->inicio_sesion($datos);
}

if($_POST['parametro'] == 2){
	$mail = $_POST['txtemail'];

	$user = $clase->Listarusuario($mail);

	if(count($user) > 0){
		$id = $user[0]['Id'];
		$dni = $user[0]['Dni'];
		$usu = $user[0]['Pnom'].' '.$user[0]['Snom'].' '.$user[0]['Pape'].' '.$user[0]['Sape'];
		$ema = $user[0]['Ema'];
		$pas = $user[0]['Pas'];
		$dir = $user[0]['Dir'];
		$cel = $user[0]['Cel'];
		$nac = $user[0]['Nac'];
		$reg = $user[0]['Reg'];
		$fot = $user[0]['Fot'];
		$est = $user[0]['Est'];
		$acor = $user[0]['Acor'];
		$idrol = $user[0]['Idrol'];

		$conf = $clase->Actualizarestado($id);

		$mensaje = $clase->mensaje_mail($usu, $dni, $ema, $id);

		$enviar = $clase->enviar_mail($mensaje, $ema);

		echo $enviar;
	}else{
		echo 2;
	}
}

if($_POST['parametro'] == 3){
	$datos=[$_POST['txtid'],
		md5($_POST['txtemail'].",".$_POST['txtpassnew'])];	
		
	echo $clase->Actualizarcontrasenia($datos);
}

if($_POST['parametro'] == 4){
	$datos=[$_POST['txtcedula'],
		$_POST['txtnombre'],
		$_POST['txtapellido'],
		$_POST['txtemail'],
		$_POST['txtdireccion'],
		$_POST['txttelefono'],
		md5($_POST['txtemail'].",".$_POST['txtpassword']),
		date("Y-m-d"),
		"admin.jpg",
		"A",
		0,
		3];	
		
	echo $clase->Registrarse($datos);
}
?>