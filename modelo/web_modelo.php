<?php  
	class Web{
		private $db;

		function __construct(){
			$this->db=Conectar::conexion();
		}

		function datos_compania(){
			$sql="SELECT cmp_CompaniaId,
							cmp_Nombre,
							cmp_Descripcion,
							cmp_Historia,
							cmp_Mision,
							cmp_Vision,
							cmp_Logo,
							cmp_Imagen,
							cmp_Estado 

					FROM compania 
					WHERE cmp_Estado = 'A'";
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

		function datos_usuario($dato){
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
					WHERE usr_UsuarioId=?";
			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("s",$dato);
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

		function datos_noticias(){
			$sql="SELECT ntc_NoticiaId,
							ntc_Titulo,
							ntc_Descripcion,
							ntc_Imagen,
							ntc_Url,
							ntc_Fecha,
							ntc_Hora,
							ntc_Tipo,
							ntc_Estado 

					FROM noticia 
					WHERE ntc_Tipo = 2 
						AND ntc_Estado = 'A'";
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

		function datos_noticiasnormales(){
			$sql="SELECT ntc_NoticiaId,
							ntc_Titulo,
							ntc_Descripcion,
							ntc_Imagen,
							ntc_Url,
							ntc_Fecha,
							ntc_Hora,
							ntc_Tipo,
							ntc_Estado 

					FROM noticia 
					WHERE ntc_Tipo != 2 
						AND ntc_Estado = 'A'";
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

		function datos_sliders($dato){
			$sql="SELECT sld_SlidersId,
							sld_Nombre,
							sld_Descripcion,
							sld_Pagina,
							sld_Url,
							sld_Estado

			 		FROM slider
			 		WHERE sld_Pagina = ? 
			 			AND sld_Estado = 'A'";
			$stmt=$this->db->prepare($sql);
			$stmt->bind_param("s",$dato);
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
	}
?>