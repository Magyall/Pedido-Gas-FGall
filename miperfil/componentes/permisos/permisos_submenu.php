<?php  
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/permisos_modelo.php');

if($_SESSION['SubmenuMenu']==0){


}else{
	$cont = 0;
	$contador = 0;
	$clase = new Permisos;

	$submenuactivo = $clase->Submenu_activo($_SESSION['MenuRol'], $_SESSION['SubmenuMenu']);
	$submenuinactivo = $clase->Submenu_inactivo($_SESSION['MenuRol'], $_SESSION['SubmenuMenu']);
	$menuinactivo = $clase->menu_inactivo($_SESSION['MenuRol'], $_SESSION['SubmenuMenu']);

	for($k=0;$k<count($submenuactivo);$k++){
		$cont++;
	}	


	for($i=0;$i<count($submenuactivo);$i++){
		if($cont==1){
?>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="<?php echo $submenuactivo[$i]['Id'] ?>" id="flexCheckDefault" checked="" onchange="eliminar_menuysubmenu(<?php echo $_SESSION['SubmenuMenu'] ?> ,<?php echo $_SESSION['MenuRol'] ?> ,<?php echo $submenuactivo[$i]['Id'] ?>)">
			<label class="form-check-label" for="flexCheckDefault">
				<?php echo $submenuactivo[$i]['Des'] ?>
			</label>
		</div>

<?php		
		}else{
?>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="<?php echo $submenuactivo[$i]['Id'] ?>" id="flexCheckDefault" checked="" onchange="eliminar_submenu(<?php echo $_SESSION['MenuRol'] ?> ,<?php echo $submenuactivo[$i]['Id'] ?>)">
			<label class="form-check-label" for="flexCheckDefault">
				<?php echo $submenuactivo[$i]['Des'] ?>
			</label>
		</div>

<?php		
		}
	}

	for($l=0;$l<count($menuinactivo);$l++){
		$contador++;
	}

	for($j=0;$j<count($submenuinactivo);$j++){
		if($contador==0){
?>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="<?php echo $submenuinactivo[$j]['Id'] ?>" id="flexCheckDefault" onchange="agregar_menuysubmenu(<?php echo $_SESSION['SubmenuMenu'] ?> ,<?php echo $_SESSION['MenuRol'] ?> ,<?php echo $submenuinactivo[$j]['Id'] ?>)">
			<label class="form-check-label" for="flexCheckDefault">
				<?php echo $submenuinactivo[$j]['Des'] ?>
			</label>
		</div>

<?php		
		}else{
?>
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="<?php echo $submenuinactivo[$j]['Id'] ?>" id="flexCheckDefault" onchange="agregar_submenu(<?php echo $_SESSION['MenuRol'] ?> ,<?php echo $submenuinactivo[$j]['Id'] ?>)">
			<label class="form-check-label" for="flexCheckDefault">
				<?php echo $submenuinactivo[$j]['Des'] ?>
			</label>
		</div>

<?php		
		}
	}
}
?>		    	