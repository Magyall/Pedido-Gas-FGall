<?php  
	class Procesos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function ListarRoot(){
			$sql="SELECT ped_PedidoId, ped_UsuarioId, ped_RepartidorId, ped_Numero, ped_FechaIngreso, ped_HoraIngreso, ped_FechaEntrega, ped_HoraEntrega, ped_FechaMaxima, ped_HoraMaxima, ped_Cantidad, ped_Descripcion, ped_Latitud, ped_Longitud, ped_Tipo, ped_Estado
					FROM pedido";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idusu, $idrep, $num, $fecing, $horing, $fecent, $horent, $fecmax, $hormax, $can, $des, $lat, $lon, $tip, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Idusu'=>$idusu,
							'Idrep'=>$idrep,
							'Num'=>$num,
							'Fecing'=>$fecing,
							'Horing'=>$horing,
							'Fecent'=>$fecent,
							'Horent'=>$horent,
							'Fecmax'=>$fecmax,
							'Hormax'=>$hormax,
							'Can'=>$can,
							'Des'=>$des,
							'Lat'=>$lat,
							'Lon'=>$lon,
							'Tip'=>$tip,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listar(){
			$sql="SELECT ped_PedidoId, ped_UsuarioId, ped_RepartidorId, ped_Numero, ped_FechaIngreso, ped_HoraIngreso, ped_FechaEntrega, ped_HoraEntrega, ped_FechaMaxima, ped_HoraMaxima, ped_Cantidad, ped_Descripcion, ped_Latitud, ped_Longitud, ped_Tipo, ped_Estado
					FROM pedido 
					WHERE ped_Estado!='D'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idusu, $idrep, $num, $fecing, $horing, $fecent, $horent, $fecmax, $hormax, $can, $des, $lat, $lon, $tip, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Idusu'=>$idusu,
							'Idrep'=>$idrep,
							'Num'=>$num,
							'Fecing'=>$fecing,
							'Horing'=>$horing,
							'Fecent'=>$fecent,
							'Horent'=>$horent,
							'Fecmax'=>$fecmax,
							'Hormax'=>$hormax,
							'Can'=>$can,
							'Des'=>$des,
							'Lat'=>$lat,
							'Lon'=>$lon,
							'Tip'=>$tip,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ListarRepartidor(){
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
					WHERE usr_RolId=4 
						AND usr_Estado='A'";

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
		
		function ListarRepartidorxId($id){
			$sql="SELECT usr_UsuarioId, usr_PrimerNombre, usr_PrimerApellido, usr_Celular, usr_Identificacion, usr_Direccion
					FROM usuario 
					WHERE usr_UsuarioId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$id);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $pnom, $pape, $cel, $ide, $dir);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Pnom'=>$pnom,
							'Pape'=>$pape,
							'Cel'=>$cel,
							'Ide'=>$ide,
							'Dir'=>$dir);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ListarVehiculoxId($id){
			$sql="SELECT vhc_Modelo, vhc_Placa
					FROM usuario u, vehiculo v
					WHERE u.usr_VehiculoId = v.vhc_VehiculoId
						AND u.usr_UsuarioId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$id);
			$ok=$stmt->execute();
			$stmt->bind_result($mod, $pla);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Mod'=>$mod,
							'Pla'=>$pla);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Tipo($dato){
			$var = "";
			switch ($dato){
				case 1:
					$var = "NORMAL";
				break;
				case 2:
					$var = "PERSONALIZADO";
				break;
			}
			return $var;
		}

		function Estado($dato){
			$var = "NINGUNO";
			switch ($dato){
				case "N":
					$var = "NUEVO";
				break;
				case "A":
					$var = "ASIGNADO";
				break;
				case "C":
					$var = "EN CAMINO";
				break;
				case "D":
					$var = "ELIMINADO";
				break;
				case "E":
					$var = "ENTREGADO";
				break;
				case "I":
					$var = "INCOMPLETO";
				break;
				case "H":
					$var = "CANCELADO";
				break;
				case "T":
					$var = "TERMINADO";
				break;
			}
			return $var;
		}

		function EliminarLogico($datos){
			$sql='UPDATE pedido 
					SET ped_Estado = ?
					WHERE ped_PedidoId = ?';

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
			$sql="DELETE FROM pedido 
					WHERE ped_PedidoId = ?";

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
			$sql='UPDATE pedido 
					SET ped_estado = ?
					WHERE ped_PedidoId = ?';

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

		function ActualizarRepartidor($datos){
			$sql='UPDATE pedido 
					SET ped_RepartidorId = ?,
						ped_FechaMaxima = ?,
						ped_HoraMaxima = ?
					WHERE ped_PedidoId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("issi",$datos[0],$datos[2],$datos[3],$datos[1]);
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

		function ActualizarTipo($datos){
			$sql='UPDATE pedido 
					SET ped_Tipo = ?
					WHERE ped_PedidoId = ?';

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

		function accionpedido($datos){

			if($datos[0] == 1){
				$sql="UPDATE pedido 
						SET ped_FechaMaxima = ?,
							ped_HoraMaxima = ?,
							ped_Estado = 'A'
						WHERE ped_PedidoId = ?";

				$stmt=$this->db->prepare($sql);
				$stmt->bind_param("ssi",$datos[1],$datos[2],$datos[3]);
			}else{
				$sql="UPDATE pedido 
						SET ped_Estado = 'T',
							ped_FechaEntrega = ?,
							ped_HoraEntrega = ?,
							ped_CantidadI = 0
						WHERE ped_PedidoId = ?";

				$stmt=$this->db->prepare($sql);
				$stmt->bind_param("ssi",$datos[4], $datos[5], $datos[3]);
			}
			
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