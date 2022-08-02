<?php  
	class Procesos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function ListarRoot(){
			$sql="SELECT * 
					FROM compania";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $nom, $des, $his, $mis, $vis, $log, $img, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Nom'=>$nom,
							'Des'=>$des,
							'His'=>$his,
							'Mis'=>$mis,
							'Vis'=>$vis,
							'Log'=>$log,
							'Img'=>$img,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listar(){
			$sql="SELECT * 
					FROM compania 
					WHERE cmp_Estado != 'E'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $nom, $des, $his, $mis, $vis, $log, $img, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Nom'=>$nom,
							'Des'=>$des,
							'His'=>$his,
							'Mis'=>$mis,
							'Vis'=>$vis,
							'Log'=>$log,
							'Img'=>$img,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Actualizar($datos){
			$sql='UPDATE compania 
					SET cmp_Nombre = ?, 
						cmp_Descripcion = ?, 
						cmp_Historia = ?, 
						cmp_Mision = ?, 
						cmp_Vision = ?

					WHERE cmp_CompaniaId = ?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("sssssi",$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5]);
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

		function ActualizarLogo($datos){
			$sql='UPDATE compania 
					SET cmp_Logo = ?

					WHERE cmp_CompaniaId = ?';

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

		function ActualizarImagen($datos){
			$sql='UPDATE compania 
					SET cmp_Imagen = ?

					WHERE cmp_CompaniaId = ?';
					
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