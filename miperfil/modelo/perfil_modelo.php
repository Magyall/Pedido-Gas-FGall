<?php  
	class Perfil{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function Perfilxid($idusu){
			$sql="SELECT usr_UsuarioId,
							usr_RolId,
							usr_Identificacion,
							usr_PrimerNombre,
							usr_SegundoNombre,
							usr_PrimerApellido,
							usr_SegundoApellido,
							usr_Email,
							usr_Password,
							usr_Direccion,
							usr_Celular,
							usr_FechaNacimiento,
							usr_FechaRegistro,
							usr_Foto,
							usr_Estado,
							usr_ActualizarPassword

					FROM usuario 
					WHERE usr_UsuarioId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$idusu);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idrol, $dni, $pnom, $snom, $pape, $sape, $mail, $pass, $dir, $cel, $fecnac, $fecreg, $fot, $est, $acor);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Idrol'=>$idrol,
							'Dni'=>$dni,
							'Pnom'=>$pnom,
							'Snom'=>$snom,
							'Pape'=>$pape,
							'Sape'=>$sape,
							'Mail'=>$mail,
							'Pass'=>$pass,
							'Dir'=>$dir,
							'Cel'=>$cel,
							'Fecnac'=>$fecnac,
							'Fecreg'=>$fecreg,
							'Fot'=>$fot,
							'Est'=>$est,
							'Acor'=>$acor);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Perfilcorreoxid($iduser){
			$sql="SELECT usr_Email 

					FROM usuario 
					WHERE usr_UsuarioId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$iduser);
			$ok=$stmt->execute();
			$stmt->bind_result($mail);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Mail'=>$mail);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Updateperfilxid($datos){
			$sql='UPDATE usuario 
					SET 
						usr_Identificacion = ?,
							usr_PrimerNombre = ?,
							usr_SegundoNombre = ?,
							usr_PrimerApellido = ?,
							usr_SegundoApellido = ?,
							usr_Email = ?,
							usr_Direccion = ?,
							usr_Celular = ?,
							usr_FechaNacimiento = ?,
							usr_FechaRegistro = ?,
							usr_ActualizarPassword = ?

					WHERE usr_UsuarioId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("sssssssssssi",$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;	
			$stmt->close();
			$this->db->close();
		}

		function Updatepasswordxid($datos){
			$sql='UPDATE usuario 
					SET usr_Password = ?,
						usr_ActualizarPassword = 0

					WHERE usr_UsuarioId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("si",$datos[0],$datos[1]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;	
			$stmt->close();
			$this->db->close();
		}

		function Updatefotoxid($datos){
			$sql='UPDATE usuario 
					SET usr_Foto = ?

					WHERE usr_UsuarioId = ?';
								
			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("si",$datos[0],$datos[1]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;	
			$stmt->close();
			$this->db->close();
		}
	}
?>