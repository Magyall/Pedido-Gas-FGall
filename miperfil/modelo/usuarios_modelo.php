<?php  
	class Procesos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function ListarRoot(){
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
					WHERE usr_RolId != 4";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idrol, $dni, $pnom, $snom, $pape, $sape, $ema, $pas, $dir, $cel, $nac, $reg, $fot, $est, $acor);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Idrol'=>$idrol,
							'Dni'=>$dni,
							'Pnom'=>$pnom,
							'Snom'=>$snom,
							'Pape'=>$pape,
							'Sape'=>$sape,
							'Ema'=>$ema,
							'Pas'=>$pas,
							'Dir'=>$dir,
							'Cel'=>$cel,
							'Nac'=>$nac,
							'Reg'=>$reg,
							'Fot'=>$fot,
							'Est'=>$est,
							'Acor'=>$acor);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listar(){
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
					WHERE usr_Estado != 'E' 
						AND usr_RolId != 4 
						AND usr_RolId != 1";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idrol, $dni, $pnom, $snom, $pape, $sape, $ema, $pas, $dir, $cel, $nac, $reg, $fot, $est, $acor);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Idrol'=>$idrol,
							'Dni'=>$dni,
							'Pnom'=>$pnom,
							'Snom'=>$snom,
							'Pape'=>$pape,
							'Sape'=>$sape,
							'Ema'=>$ema,
							'Pas'=>$pas,
							'Dir'=>$dir,
							'Cel'=>$cel,
							'Nac'=>$nac,
							'Reg'=>$reg,
							'Fot'=>$fot,
							'Est'=>$est,
							'Acor'=>$acor);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ListarRolRoot(){
			$sql="SELECT rol_RolId,
							rol_Descripcion,
							rol_Estado

					FROM rol 
					WHERE rol_Estado != 'E' 
						AND rol_Estado != 'I' 
						AND rol_RolId != 4";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $des, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ListarRol(){
			$sql="SELECT rol_RolId,
							rol_Descripcion,
							rol_Estado

					FROM rol 
					WHERE rol_Estado != 'E' 
						AND rol_Estado != 'I' 
						AND rol_RolId != 4 
						AND rol_RolId != 1";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $des, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ListarRolxid($id){
			$sql="SELECT rol_RolId,
							rol_Descripcion,
							rol_Estado

					FROM rol 
					WHERE rol_RolId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$id);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $des, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Agregar($datos){
			$sql="INSERT INTO usuario(usr_Identificacion, usr_PrimerNombre, usr_SegundoNombre, usr_PrimerApellido, usr_SegundoApellido, usr_Email, usr_Direccion, usr_Celular, usr_FechaRegistro, usr_Foto, usr_Estado, usr_ActualizarPassword, usr_RolId) 
					VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("sssssssssssii",$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11],$datos[12]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;
		}

		function Actualizar($datos){
			$sql='UPDATE usuario 
					SET usr_Identificacion = ?, 
						usr_PrimerNombre = ?, 
						usr_SegundoNombre = ?, 
						usr_PrimerApellido = ?, 
						usr_SegundoApellido = ?, 
						usr_Email = ?, 
						usr_Direccion = ?, 
						usr_Celular = ? 

					WHERE usr_UsuarioId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("sssssssii",$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8]);
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

		function EliminarLogico($datos){
			$sql='UPDATE usuario 
					SET usr_Estado = ?

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

		function Eliminar($dato){
			$sql="DELETE FROM usuario 
					WHERE usr_UsuarioId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param('i',$dato);
			$ok=$stmt->execute();
			if($ok==1){
				$conf="1";
			}else{
				$conf="2";
			}
			return $conf;
			$stmt->close();
			$this->db->close();
		}

		function ActualizarEstado($datos){
			$sql='UPDATE usuario 
					SET usr_Estado = ?

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

		function ActualizarPassword($datos){
			$sql='UPDATE usuario 
					SET usr_Password = ?

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

		function ActualizarRol($datos){
			$sql='UPDATE usuario 
					SET usr_RolId = ?

					WHERE usr_UsuarioId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ii",$datos[0],$datos[1]);
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