<?php  
	class Pedido{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function MostrarNumero(){
			$sql="SELECT COUNT(*)
					FROM pedido";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($numero);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Num'=>$numero);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Verificar($datos){
			$contador = 0;
			$sql="SELECT COUNT(*) 
					FROM pedido 
					WHERE ped_UsuarioId = ? 
						AND ped_Estado != 'E'
						AND ped_Estado != 'T'";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("s",$datos[0]);
			$ok=$stmt->execute();
			$stmt->bind_result($cont);
			while($stmt->fetch()){
				$contador = $cont;
			}
			return $contador;
			$stmt->close();
			$this->db->close();
		}

		function Agregar($datos){
			$sql="INSERT INTO pedido(ped_UsuarioId, ped_Numero, ped_FechaIngreso, ped_HoraIngreso, ped_FechaEntrega, ped_HoraEntrega, ped_Cantidad, ped_Descripcion, ped_Latitud, ped_Longitud, ped_Tipo, ped_Estado) 
					VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("isssssisssis",$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;
		}

		function datos_pedidourgente($dato, $fecha, $estado){
			$sql="SELECT p.ped_PedidoId, p.ped_UsuarioId, p.ped_RepartidorId, p.ped_Numero, p.ped_FechaIngreso, p.ped_HoraIngreso, p.ped_FechaEntrega, p.ped_HoraEntrega, p.ped_FechaMaxima, p.ped_HoraMaxima, p.ped_Cantidad, p.ped_Descripcion, p.ped_Latitud, p.ped_Longitud, p.ped_Tipo, p.ped_Estado, u.usr_PrimerNombre, u.usr_PrimerApellido, u.usr_Celular
					FROM pedido p, usuario u 
					WHERE p.ped_UsuarioId = u.usr_UsuarioId 
						AND p.ped_RepartidorId = ? 
						AND p.ped_FechaMaxima = ? 
						AND p.ped_Tipo = 2 
						AND p.ped_Estado = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("iss",$dato, $fecha, $estado);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idusu, $idrep, $num, $fecing, $horing, $fecent, $horent, $fecmax, $hormax, $can, $des, $lat, $lon, $tip, $est, $pnom, $pape, $cel);
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
							'Est'=>$est,
							'Pnom'=>$pnom,
							'Pape'=>$pape,
							'Cel'=>$cel);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function datos_pedidonormal($dato, $fecha, $estado){
			$sql="SELECT p.ped_PedidoId, p.ped_UsuarioId, p.ped_RepartidorId, p.ped_Numero, p.ped_FechaIngreso, p.ped_HoraIngreso, p.ped_FechaEntrega, p.ped_HoraEntrega, p.ped_FechaMaxima, p.ped_HoraMaxima, p.ped_Cantidad, p.ped_Descripcion, p.ped_Latitud, p.ped_Longitud, p.ped_Tipo, p.ped_Estado, u.usr_PrimerNombre, u.usr_PrimerApellido, u.usr_Celular
					FROM pedido p, usuario u 
					WHERE p.ped_UsuarioId = u.usr_UsuarioId 
						AND p.ped_RepartidorId = ? 
						AND p.ped_FechaMaxima = ? 
						AND p.ped_Tipo = 1 
						AND p.ped_Estado = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("iss",$dato, $fecha, $estado);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idusu, $idrep, $num, $fecing, $horing, $fecent, $horent, $fecmax, $hormax, $can, $des, $lat, $lon, $tip, $est, $pnom, $pape, $cel);
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
							'Est'=>$est,
							'Pnom'=>$pnom,
							'Pape'=>$pape,
							'Cel'=>$cel);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Tipo($dato){
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

		function detalle_pedidos($id){
			$sql="SELECT p.ped_PedidoId, p.ped_UsuarioId, p.ped_RepartidorId, p.ped_Numero, p.ped_FechaIngreso, p.ped_HoraIngreso, p.ped_FechaEntrega, p.ped_HoraEntrega, p.ped_FechaMaxima, p.ped_HoraMaxima, p.ped_Cantidad, p.ped_Descripcion, p.ped_Latitud, p.ped_Longitud, p.ped_Tipo, p.ped_Comentario, p.ped_CantidadI, p.ped_Estado, u.usr_PrimerNombre, u.usr_PrimerApellido, u.usr_Celular
					FROM pedido p, usuario u 
					WHERE p.ped_UsuarioId = u.usr_UsuarioId 
					AND p.ped_PedidoId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$id);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idusu, $idrep, $num, $fecing, $horing, $fecent, $horent, $fecmax, $hormax, $can, $des, $lat, $lon, $tip, $com, $cani, $est, $pnom, $pape, $cel);
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
							'Com'=>$com,
							'Cani'=>$cani,
							'Est'=>$est,
							'Pnom'=>$pnom,
							'Pape'=>$pape,
							'Cel'=>$cel);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ActualizarEstado($datos){
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

		function ActualizarComentario($datos){
			$sql='UPDATE pedido 
					SET ped_Estado = ?,
						ped_Comentario = ?,
						ped_CantidadI = ?
					
					WHERE ped_PedidoId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ssii",$datos[0],$datos[1],$datos[2],$datos[3]);
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

		function datos_pedidoincompleto($dato, $estado){
			$sql="SELECT p.ped_PedidoId, p.ped_UsuarioId, p.ped_RepartidorId, p.ped_Numero, p.ped_FechaIngreso, p.ped_HoraIngreso, p.ped_FechaEntrega, p.ped_HoraEntrega, p.ped_FechaMaxima, p.ped_HoraMaxima, p.ped_Cantidad, p.ped_Descripcion, p.ped_Latitud, p.ped_Longitud, p.ped_Tipo, p.ped_Estado, u.usr_PrimerNombre, u.usr_PrimerApellido, u.usr_Celular
					FROM pedido p, usuario u 
					WHERE p.ped_UsuarioId = u.usr_UsuarioId 
						AND p.ped_RepartidorId = ? 
						AND p.ped_Tipo = 1 
						AND p.ped_Estado = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("is",$dato, $estado);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $idusu, $idrep, $num, $fecing, $horing, $fecent, $horent, $fecmax, $hormax, $can, $des, $lat, $lon, $tip, $est, $pnom, $pape, $cel);
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
							'Est'=>$est,
							'Pnom'=>$pnom,
							'Pape'=>$pape,
							'Cel'=>$cel);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ReagendarPedido($datos){
			$sql='UPDATE pedido 
					SET ped_FechaMaxima = ?,
						ped_HoraMaxima = ?,
						ped_Estado = ?
					
					WHERE ped_PedidoId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("sssi",$datos[0],$datos[1],$datos[2],$datos[3]);
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

		function Actualizarestadonormal($datos){
			$sql='UPDATE pedido 
					SET ped_Estado = ?,
						ped_FechaEntrega = ?,
						ped_HoraEntrega = ?
					
					WHERE ped_PedidoId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("sssi",$datos[0],$datos[1],$datos[2],$datos[3]);
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

		function Verificar_Usuario($datos){
			$contador = 0;
			$sql="SELECT usr_UsuarioId
					FROM usuario 
					WHERE usr_Identificacion = ? 
						AND usr_Estado = 'A'";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("s",$datos[0]);
			$ok=$stmt->execute();
			$stmt->bind_result($cont);
			while($stmt->fetch()){
				$contador = $cont;
				$_SESSION['UserPedido']=$cont;
			}
			return $contador;
			$stmt->close();
			$this->db->close();
		}

		function Cargar_Usuario($datos){
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
			$stmt->bind_param("i",$datos);
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

		function AgregarUsuario($datos){
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
	}
?>