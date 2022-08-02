<?php  
	class Chat{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function Agregar($datos){
			$sql="INSERT INTO chat(cht_Emisor, cht_Numero, cht_Email, cht_Estado) 
					VALUES (?,?,?,?)";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ssss",$datos[0],$datos[1],$datos[2],$datos[3]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;
		}

		function chat(){
			$sql="SELECT cht_ChatId 
					FROM chat 
					ORDER BY cht_ChatId DESC LIMIT 1";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($numero);
			$arr=0;
			while($stmt->fetch()){
				$arr=$numero;
			}
			return $arr;
			$stmt->close();
			$this->db->close();
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
			$stmt->bind_param("issi",$datos[0],$datos[1],$datos[2],$dato[3]);
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