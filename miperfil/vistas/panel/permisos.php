<?php 
require_once('../config/conexion.php');
require_once('./modelo/permisos_modelo.php');

$clase = new Permisos;

$idrol = $_SESSION['Rol'];

if($idrol == 1){
	$roles = $clase->Rolesxroot();
}else{
	$roles = $clase->Roles();
}

$menu_principal = $clase->Menu_principal();

$id_menu = 0;
?>
<script src="./js/permisos.js"></script>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>PERMISOS</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<button class="btn btn-secondary" onclick="guardarcambios()">
						GUARDAR CAMBIOS
					</button>
					<!--
					<li class="breadcrumb-item"><a href="#">Inicio</a></li>
					<li class="breadcrumb-item active">PERMISOS</li>
					-->
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<!--
					<div class="card-header">
						<h3 class="card-title">DataTable with minimal features & hover style</h3>
					</div>
					-->
					<div class="card-body">
						<div class="row">
							<div class="col-4">
								<center>
									<h4>ROLES</h4>
<?php 
for($i=0;$i<count($roles);$i++){
?>
									<button class="btn btn-outline-secondary" id="btnrol" name="btnrol" onclick="cargar_rol(<?php echo $roles[$i]['Id'] ?>)" style="width: 80%;">
										<?php echo $roles[$i]['Des'] ?>
									</button><br><br>
<?php
}
?>
								</center>
							</div>
							<div class="col-4">
								<center>
									<h4>MENU</h4>
<?php 
for($j=0;$j<count($menu_principal);$j++){
?>
									<button class="btn btn-outline-dark" id="btnrol" name="btnrol" onclick="cargar_menu(<?php echo $menu_principal[$j]['Id'] ?>)" style="width: 80%;">
										<?php echo $menu_principal[$j]['Des'] ?>
									</button><br><br>
<?php
}
?>
								</center>
							</div>
							<div class="col-4">
								<input type="text" id="txtidrol" name="txtidrol" value="1" hidden="">
								<input type="text" id="txtidmenu" name="txtidmenu" value="0" hidden="">
								<center>
									<h4>SUBMENU</h4>
								</center>
								<div id="form_submenu">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>