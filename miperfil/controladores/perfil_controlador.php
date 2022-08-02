<?php 
	session_start();
	
	require_once('../../config/conexion.php');
	require_once('../modelo/perfil_modelo.php');

	$clase = new Perfil;

	if(isset($_POST['image'])){
		$data = $_POST['image'];
		list($id, $name, $type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);
		$data = base64_decode($data);
		//$imageName = time().'.png';
		$imageName = $name.'_'.date('Y-m-d').'_'.date('H-i').'.png';
		file_put_contents('../../complementos/imagenes/usuarios/'.$imageName, $data);
		echo $id.'/'.$imageName;
	}else{
		if($_POST['parametro'] == 1){
			$iduser = $_POST['Id'];
			$newmail = $_POST['Mail'];
			
			$correo_perfil = $clase->Perfilcorreoxid($iduser);
			for($i=0;$i<count($correo_perfil);$i++){
				$mailuser = $correo_perfil[$i]['Mail'];
			}



			if($mailuser == $newmail){
				$datos = [$_POST['Dni'],
					$_POST['Pnom'],
					$_POST['Snom'],
					$_POST['Pape'],
					$_POST['Sape'],
					$_POST['Mail'],
					$_POST['Dir'],
					$_POST['Cel'],
					$_POST['Fecnac'],
					$_POST['Fecreg'],
					'0',
					$_POST['Id']];

				$resultado=$clase->Updateperfilxid($datos);

				echo $resultado;
			}else{
				$datos = [$_POST['Dni'],
					$_POST['Pnom'],
					$_POST['Snom'],
					$_POST['Pape'],
					$_POST['Sape'],
					$_POST['Mail'],
					$_POST['Dir'],
					$_POST['Cel'],
					$_POST['Fecnac'],
					$_POST['Fecreg'],
					'1',
					$_POST['Id']];

				$resultado=$clase->Updateperfilxid($datos);

				echo $resultado;

			}
		}

		if($_POST['parametro'] == 2){
			$pass1 = $_POST['Contra1'];
			$pass2 = $_POST['Contra2'];
			$mail = $_POST['Mail'];
			if($pass1 == $pass2){
				$passnew = md5($mail.','.$pass1);

				$datos = [$passnew,
					$_POST['Id']];
				

				$resultado=$clase->Updatepasswordxid($datos);

				echo $resultado;
			}else{
				echo 3;
			}
		}

		if($_POST['parametro'] == 3){
			$iduser = $_POST['user'];
			$fotuser = $_POST['fotouser'];

			$datos = [$fotuser,
					$iduser];

			$resultado=$clase->Updatefotoxid($datos);

			echo $resultado;
		}
	}	
?>