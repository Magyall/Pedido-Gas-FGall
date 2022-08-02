<?php  
	class Permisos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function Rolesxroot(){
			$sql="SELECT rol_RolId,
							rol_Descripcion 
					FROM rol 
					WHERE rol_Estado = 'A'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $des);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Roles(){
			$sql="SELECT rol_RolId,
							rol_Descripcion 
					FROM rol 
					WHERE rol_Estado = 'A' AND rol_RolId != 1";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $des);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Menu_principal(){
			$sql="SELECT men_MenuId, 
							men_Descripcion 

					FROM menu 
					WHERE men_Estado = 'A' 
						AND men_Tipo = 'P'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id,$des);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Submenu_activo($rol, $menu){
			$sql="SELECT m.men_MenuId, m.men_Descripcion
					FROM menu m, menu_rol r 
					WHERE r.mnr_RolId = ? 
						AND m.men_Pertenece = ? 
						AND m.men_MenuId = r.mnr_MenuId";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ss",$rol,$menu);
			$ok=$stmt->execute();
			$stmt->bind_result($id,$des);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Submenu_inactivo($rol, $menu){
			$sql="SELECT m.men_MenuId, 
							m.men_Descripcion 
					FROM menu m 
					WHERE NOT EXISTS (SELECT r.mnr_MenuId 
										FROM menu_rol r 
										WHERE r.mnr_RolId = ? 
											AND m.men_Pertenece = ? 
											AND m.men_MenuId = r.mnr_MenuId) 
						AND m.men_Tipo='S' 
						AND m.men_Pertenece=?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("sss",$rol,$menu,$menu);
			$ok=$stmt->execute();
			$stmt->bind_result($id,$des);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Des'=>$des);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Eliminar_submenu($datos){
			$sql="DELETE FROM menu_rol 
					WHERE mnr_RolId = ? 
						AND mnr_MenuId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param('ii',$datos[0],$datos[1]);
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

		function Eliminar_menu($datos){
			$sql="DELETE FROM menu_rol 
					WHERE mnr_RolId=? 
						AND mnr_MenuId=?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param('ii',$datos[0],$datos[1]);
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

		function menu_inactivo($rol, $menu){
			$sql="SELECT mnr_MenuRolId 
					FROM menu_rol r 
					WHERE r.mnr_RolId=? 
						AND r.mnr_MenuId=?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ss",$rol,$menu);
			$ok=$stmt->execute();
			$stmt->bind_result($id);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Agregar_menu($datos){
			$sql="INSERT INTO menu_rol(mnr_RolId, mnr_MenuId) 
					VALUES (?,?)";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ss",$datos[0],$datos[1]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;
		}
	}
?>