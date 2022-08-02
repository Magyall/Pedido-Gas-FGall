<?php  
	class Procesos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function Listarpedidos($fecini, $fecfin){
			$sql="SELECT p.ped_PedidoId,
							p.ped_UsuarioId,
							p.ped_RepartidorId,
							p.ped_Numero,
							p.ped_FechaIngreso,
							p.ped_HoraIngreso,
							p.ped_FechaEntrega,
							p.ped_HoraEntrega,
							p.ped_FechaMaxima,
							p.ped_HoraMaxima,
							p.ped_Cantidad,
							p.ped_Descripcion,
							p.ped_Latitud,
							p.ped_Longitud,
							p.ped_Tipo,
							p.ped_Estado

					FROM pedido p
					WHERE p.ped_FechaIngreso BETWEEN ? AND ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ss",$fecini, $fecfin);
			$ok=$stmt->execute();
			$stmt->bind_result($ped_idped, $ped_idusu, $ped_idrep, $ped_num, $ped_fecing, $ped_horing, $ped_fecent, $ped_horent, $ped_fecmax, $ped_hormax, $ped_can, $ped_des, $ped_lat, $ped_lon, $ped_tip, $ped_est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('ped_idped'=>$ped_idped,
								'ped_idusu'=>$ped_idusu,
								'ped_idrep'=>$ped_idrep,
								'ped_num'=>$ped_num,
								'ped_fecing'=>$ped_fecing,
								'ped_horing'=>$ped_horing,
								'ped_fecent'=>$ped_fecent,
								'ped_horent'=>$ped_horent,
								'ped_fecmax'=>$ped_fecmax,
								'ped_hormax'=>$ped_hormax,
								'ped_can'=>$ped_can,
								'ped_des'=>$ped_des,
								'ped_lat'=>$ped_lat,
								'ped_lon'=>$ped_lon,
								'ped_tip'=>$ped_tip,
								'ped_est'=>$ped_est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listarusuario($idped){
			$sql="SELECT u.usr_Identificacion,
							u.usr_PrimerNombre,
							u.usr_PrimerApellido,
							u.usr_Email,
							u.usr_Direccion,
							u.usr_Celular

					FROM usuario u
					WHERE u.usr_UsuarioId = ?";
						
			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$idped);
			$ok=$stmt->execute();
			$stmt->bind_result($usr_ide, $usr_nom, $usr_ape, $usr_ema, $usr_dir, $usr_cel);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('usr_ide'=>$usr_ide,
								'usr_nom'=>$usr_nom,
								'usr_ape'=>$usr_ape,
								'usr_ema'=>$usr_ema,
								'usr_dir'=>$usr_dir,
								'usr_cel'=>$usr_cel);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listarvehiculo($idped){
			$sql="SELECT v.vhc_Modelo,
							v.vhc_Placa

					FROM usuario u, vehiculo v
					WHERE u.usr_UsuarioId = ?
						AND u.usr_VehiculoId = v.vhc_VehiculoId";
						
			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$idped);
			$ok=$stmt->execute();
			$stmt->bind_result($vhc_mod, $vhc_pla);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('vhc_mod'=>$vhc_mod,
								'vhc_pla'=>$vhc_pla);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listarclientes(){
			$sql="SELECT usr_UsuarioId,
							usr_RolId,
							usr_VehiculoId,
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
					WHERE usr_RolId = 3";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idrol, $idveh, $dni, $pnom, $snom, $pape, $sape, $ema, $pas, $dir, $cel, $nac, $reg, $fot, $est, $acor);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Idrol'=>$idrol,
							'Idveh'=>$idveh,
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

		function Estado($dato){
			$var = "INACTIVO";
			switch ($dato){
				case "A":
					$var = "ACTIVO";
				break;
				case "E":
					$var = "ELIMINADO";
				break;
			}
			return $var;
		}

		function Listarguia($id){
			$sql="SELECT p.ped_PedidoId,
							p.ped_UsuarioId,
							p.ped_RepartidorId,
							p.ped_Numero,
							p.ped_FechaIngreso,
							p.ped_HoraIngreso,
							p.ped_FechaEntrega,
							p.ped_HoraEntrega,
							p.ped_FechaMaxima,
							p.ped_HoraMaxima,
							p.ped_Cantidad,
							p.ped_Descripcion,
							p.ped_Latitud,
							p.ped_Longitud,
							p.ped_Tipo,
							p.ped_Estado

					FROM pedido p
					WHERE p.ped_PedidoId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$id);
			$ok=$stmt->execute();
			$stmt->bind_result($ped_idped, $ped_idusu, $ped_idrep, $ped_num, $ped_fecing, $ped_horing, $ped_fecent, $ped_horent, $ped_fecmax, $ped_hormax, $ped_can, $ped_des, $ped_lat, $ped_lon, $ped_tip, $ped_est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('ped_idped'=>$ped_idped,
								'ped_idusu'=>$ped_idusu,
								'ped_idrep'=>$ped_idrep,
								'ped_num'=>$ped_num,
								'ped_fecing'=>$ped_fecing,
								'ped_horing'=>$ped_horing,
								'ped_fecent'=>$ped_fecent,
								'ped_horent'=>$ped_horent,
								'ped_fecmax'=>$ped_fecmax,
								'ped_hormax'=>$ped_hormax,
								'ped_can'=>$ped_can,
								'ped_des'=>$ped_des,
								'ped_lat'=>$ped_lat,
								'ped_lon'=>$ped_lon,
								'ped_tip'=>$ped_tip,
								'ped_est'=>$ped_est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listarclienteguia($id){
			$sql="SELECT usr_UsuarioId,
							usr_RolId,
							usr_VehiculoId,
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

					FROM pedido p, usuario u
					WHERE p.ped_UsuarioId = u.usr_UsuarioId
						AND p.ped_PedidoId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$id);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idrol, $idveh, $dni, $pnom, $snom, $pape, $sape, $ema, $pas, $dir, $cel, $nac, $reg, $fot, $est, $acor);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Idrol'=>$idrol,
							'Idveh'=>$idveh,
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
	}
?>