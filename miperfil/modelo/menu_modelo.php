<?php  
	class Menu{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function datos_usuario($dato){
			$sql="SELECT usr_PrimerNombre,
							usr_SegundoNombre,
							usr_PrimerApellido,
							usr_SegundoApellido,
							usr_Foto 

					FROM usuario 
					WHERE usr_UsuarioId=?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("s",$dato);
			$ok=$stmt->execute();
			$stmt->bind_result($pnom, $snom, $pape, $sape, $fot);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Pnom'=>$pnom,
							'Snom'=>$snom,
							'Pape'=>$pape,
							'Sape'=>$sape,
							'Fot'=>$fot);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function menu_principal($dato){
			


			$sql="SELECT m.men_MenuId,
							m.men_Descripcion,
							m.men_Url,
							m.men_Icono

					FROM menu m, menu_rol r 
					WHERE m.men_MenuId = r.mnr_MenuId 
						AND r.mnr_RolId=? 
						AND m.men_Tipo='P' 
						AND m.men_Estado='A'";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("s",$dato);
			$ok=$stmt->execute();
			$stmt->bind_result($id,$des,$url,$ico);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des,
							'Url'=>$url,
							'Ico'=>$ico);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function menu_secundario($rol, $menu){
			$sql="SELECT m.men_MenuId,
							m.men_Descripcion,
							m.men_Url,
							m.men_Icono

					FROM menu m, menu_rol r
					WHERE r.mnr_RolId=? 
						AND m.men_Pertenece=? 
						AND m.men_MenuId = r.mnr_MenuId ";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ss",$rol,$menu);
			$ok=$stmt->execute();
			$stmt->bind_result($id,$des,$url,$ico);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des,
							'Url'=>$url,
							'Ico'=>$ico);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function menu_carpeta($pagina){
			$sql="SELECT men_Carpeta 
					FROM menu 
					WHERE men_Url = ?";
					
			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("s",$pagina);
			$ok=$stmt->execute();
			$stmt->bind_result($url);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Url'=>$url);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}
	}
?>