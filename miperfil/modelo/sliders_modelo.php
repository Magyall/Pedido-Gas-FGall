<?php  
	class Procesos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function ListarRoot(){
			$sql="SELECT * 
					FROM slider";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $nom, $des, $pag, $url, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Nom'=>$nom,
							'Des'=>$des,
							'Pag'=>$pag,
							'Url'=>$url,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listar(){
			$sql="SELECT * 
					FROM slider 
					WHERE sld_Estado != 'E'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $nom, $des, $pag, $url, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Nom'=>$nom,
							'Des'=>$des,
							'Pag'=>$pag,
							'Url'=>$url,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Actualizar($datos){
			$sql='UPDATE slider 
					SET sld_Nombre=?, 
						sld_Descripcion=?

					WHERE sld_SlidersId=?';

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ssi",$datos[0],$datos[1],$datos[2]);
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
			$sql='UPDATE slider 
					SET sld_Url=?

					WHERE sld_SlidersId=?';

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