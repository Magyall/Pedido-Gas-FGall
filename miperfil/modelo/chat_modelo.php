<?php  
	class Chat{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function chats($idusu){
			$sql="SELECT * 
					FROM chat
					WHERE cht_Estado = 'A'
						AND cht_Receptor = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$idusu);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $rec, $emi, $num, $ema, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Rec'=>$rec,
							'Emi'=>$emi,
							'Num'=>$num,
							'Ema'=>$ema,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function chats1(){
			$sql="SELECT * 
					FROM chat
					WHERE cht_Estado = 'A'
						AND cht_Receptor = 0";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $rec, $emi, $num, $ema, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Rec'=>$rec,
							'Emi'=>$emi,
							'Num'=>$num,
							'Ema'=>$ema,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function chats2($id){
			$sql="SELECT * 
					FROM chat
					WHERE cht_Estado = 'A'
						AND cht_ChatId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$id);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $rec, $emi, $num, $ema, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Rec'=>$rec,
							'Emi'=>$emi,
							'Num'=>$num,
							'Ema'=>$ema,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function ActualizarRecepcionista($datos){
			$sql="UPDATE chat
					SET cht_Receptor = ?
					WHERE cht_ChatId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ii",$datos[0],$datos[1]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;
		}

		function mensajes($dato){
			$sql="SELECT m.*
					FROM mensaje m
					WHERE  m.msg_ChatId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("i",$dato);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $chatid, $usuid, $res, $men, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Chatid'=>$chatid,
							'Usuid'=>$usuid,
							'Res'=>$res,
							'Men'=>$men,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Agregarmensajes($datos){
			$sql="INSERT INTO mensaje(msg_ChatId, msg_Mensaje, msg_Estado, msg_UsuarioId) 
					VALUES (?,?,?,?)";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("issi",$datos[0],$datos[1],$datos[2],$datos[3]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;
		}

		function Cerrarchat($datos){
			$sql="UPDATE chat
					SET cht_Estado = ?
					WHERE cht_ChatId = ?";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("si",$datos[0],$datos[1]);
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