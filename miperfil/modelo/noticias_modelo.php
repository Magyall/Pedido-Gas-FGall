<?php  
	class Procesos{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function ListarRoot(){
			$sql="SELECT * 
					FROM noticia";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $tit, $des, $img, $url, $fec, $hor, $tip, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Tit'=>$tit,
							'Des'=>$des,
							'Img'=>$img,
							'Url'=>$url,
							'Fec'=>$fec,
							'Hor'=>$hor,
							'Tip'=>$tip,
							'Est'=>$est);
			}
			return $arr;
			$stmt->close();
			$this->db->close();
		}

		function Listar(){
			$sql="SELECT * 
					FROM noticia 
					WHERE ntc_Estado != 'E'";

			$stmt=$this->db->prepare($sql);
			$ok=$stmt->execute();
			$stmt->bind_result($id, $tit, $des, $img, $url, $fec, $hor, $tip, $est);
			$arr=array();
			while($stmt->fetch()){
				$arr[]=array('Id'=>$id,
							'Tit'=>$tit,
							'Des'=>$des,
							'Img'=>$img,
							'Url'=>$url,
							'Fec'=>$fec,
							'Hor'=>$hor,
							'Tip'=>$tip,
							'Est'=>$est);
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
					$var = "DESTACADO";
				break;
				case 3:
					$var = "NUEVO";
				break;
			}
			return $var;
		}

		function Agregar($datos){
			$sql="INSERT INTO noticia(ntc_Titulo, ntc_Descripcion, ntc_Imagen, ntc_Url, ntc_Fecha, ntc_Hora, ntc_Tipo, ntc_Estado) 
					VALUES (?,?,?,?,?,?,?,?)";

			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("ssssssis",$datos[0],$datos[1],$datos[2],$datos[3],$datos[4],$datos[5],$datos[6],$datos[7]);
			$ok=$stmt->execute();
			if($ok==1){
				$conf=1;
			}else{
				$conf=0;
			}
			return $conf;
		}

		function Actualizar($datos){
			$sql='UPDATE noticia 
					SET ntc_Titulo = ?,
						ntc_Descripcion = ?,
						ntc_Url = ?

					WHERE ntc_NoticiaId = ?';

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

		function EliminarLogico($datos){
			$sql='UPDATE noticia 
					SET ntc_Estado = ?
					WHERE ntc_NoticiaId = ?';

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
			$sql="DELETE FROM noticia 
					WHERE ntc_NoticiaId = ?";

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
			$sql='UPDATE noticia 
					SET ntc_Estado = ?
					WHERE ntc_NoticiaId = ?';

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
			$sql='UPDATE noticia 
					SET ntc_Imagen = ?
					WHERE ntc_NoticiaId = ?';

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

		function ActualizarTipo($datos){
			$sql='UPDATE noticia 
					SET ntc_Tipo = ?
					WHERE ntc_NoticiaId = ?';
					
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
	}
?>