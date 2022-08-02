<?php  
	class Procesos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function ListarRoot(){
			$sql="SELECT * 
					FROM vehiculo
					WHERE vhc_Estado != 'N'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $mod, $pla, $img, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Mod'=>$mod,
							'Pla'=>$pla,
							'Img'=>$img,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listar(){
			$sql="SELECT * FROM vehiculo 
					WHERE vhc_Estado != 'E'
						AND vhc_Estado != 'N'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $mod, $pla, $img, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Mod'=>$mod,
							'Pla'=>$pla,
							'Img'=>$img,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Agregar($datos){
			$sql="INSERT INTO vehiculo(vhc_Modelo, vhc_Placa, vhc_Imagen, vhc_Estado) 
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

		function Actualizar($datos){
			$sql="UPDATE vehiculo SET vhc_Modelo = ?, vhc_Placa = ? WHERE vhc_VehiculoId = ?";
			
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

		function EliminarLogico($datos){
			$sql="UPDATE vehiculo 
					SET vhc_Estado = ?

					WHERE vhc_VehiculoId = ?";

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
			$sql="DELETE FROM vehiculo 
					WHERE vhc_VehiculoId = ?";

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
			$sql="UPDATE vehiculo 
					SET vhc_Estado = ?

					WHERE vhc_VehiculoId = ?";

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
			$sql="UPDATE vehiculo 
					SET vhc_Imagen = ?

					WHERE vhc_VehiculoId = ?";

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