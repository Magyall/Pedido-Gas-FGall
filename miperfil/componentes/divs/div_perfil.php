<?php 
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/perfil_modelo.php');

$clase = new Perfil;

$idusu = $_SESSION['User'];

$datos_perfil = $clase->Perfilxid($idusu);
for($i=0;$i<count($datos_perfil);$i++){
	$datos=$datos_perfil[$i]['Id']."||".
			$datos_perfil[$i]['Dni']."||".
			$datos_perfil[$i]['Pnom']."||".
			$datos_perfil[$i]['Snom']."||".
			$datos_perfil[$i]['Pape']."||".
			$datos_perfil[$i]['Sape']."||".
			$datos_perfil[$i]['Fot'];
?>
	<input type="text" name="txtid" id="txtid" class="form-control" value="<?php echo $datos_perfil[$i]['Id'] ?>" hidden="">
	<div class="col-md-8">
		<center>
			<h4>DATOS PERSONALES</h4>
		</center>
		<div class="row">
			<div class="col-md-6">
				<label>Cédula</label>
				<input type="text" name="txtdni" id="txtdni" class="form-control" value="<?php echo $datos_perfil[$i]['Dni'] ?>">
				<label>Primer Nombre</label>
				<input type="text" name="txtpnom" id="txtpnom" class="form-control" value="<?php echo $datos_perfil[$i]['Pnom'] ?>">
				<label>Primer Apellido</label>
				<input type="text" name="txtpape" id="txtpape" class="form-control" value="<?php echo $datos_perfil[$i]['Pape'] ?>">
				<label>Dirección</label>
				<input type="text" name="txtdir" id="txtdir" class="form-control" value="<?php echo $datos_perfil[$i]['Dir'] ?>">
				<label>Fecha de Nacimiento</label>
				<input type="date" name="txtfecnac" id="txtfecnac" class="form-control" value="<?php echo $datos_perfil[$i]['Fecnac'] ?>">
			</div>
			<div class="col-md-6">
				<label>Email</label>
				<input type="text" name="txtmail" id="txtmail" class="form-control" value="<?php echo $datos_perfil[$i]['Mail'] ?>">
				<label>Segundo Nombre</label>
				<input type="text" name="txtsnom" id="txtsnom" class="form-control" value="<?php echo $datos_perfil[$i]['Snom'] ?>">
				<label>Segundo Apellido</label>
				<input type="text" name="txtsape" id="txtsape" class="form-control" value="<?php echo $datos_perfil[$i]['Sape'] ?>">
				<label>Celular</label>
				<input type="text" name="txtcel" id="txtcel" class="form-control" value="<?php echo $datos_perfil[$i]['Cel'] ?>">
				<label>Fecha de Registro</label>
				<input type="text" name="txtfecreg" id="txtfecreg" class="form-control" value="<?php echo $datos_perfil[$i]['Fecreg'] ?>" readonly="">
			</div>
			<div class="col-md-12">
				<center>
<?php
					if($datos_perfil[$i]['Acor'] == 1){
?>
						<br><br>
<?php
					}else{

					}
?>
					<hr>
					<button class="btn btn-dark" id="btn_cambios" name="btn_cambios" onclick="guardar_cambios()">GUARDAR CAMBIOS</button>
				</center>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="col-md-12">
				<center>
					<h4>FOTO</h4>
					<img src="../complementos/imagenes/usuarios/<?php echo $datos_perfil[$i]['Fot'] ?>" style="width: 110px;">
					<br>
					<!--
					<div class="col-md-12"><label>Seleccionar imagen</label></div>
	  				<div class="col-md-12" align="center">
	  					<input type="file" name="upload_image" id="upload_image" />
	  					<br />
	  					<div id="uploaded_image"></div>
	  				</div>
	  				-->
					<button class="btn btn-dark" data-toggle="modal" data-target="#modalfoto"
					onclick="cargarfoto('<?php echo $datos ?>')">CAMBIAR FOTO</button>
				</center>
			</div>
			<div class="col-md-12">
				<br>
			</div>
			<div class="col-md-12">
				<center>
					<h4>CONTRASEÑA</h4>
					<label>Nueva Contraseña</label>
					<input type="password" name="txtcontrasenia" id="txtcontrasenia" class="form-control">
					<label>Confirmar Contraseña</label>
					<input type="password" name="txtnuevacontra" id="txtnuevacontra" class="form-control">
<?php
					if($datos_perfil[$i]['Acor'] == 1){
?>
						<label style="color: red;">Correo electronico actualizado, requiere que actualice la contraseña para iniciar sesión*</label>
<?php
					}else{

					}
?>
					<hr>
					<button class="btn btn-dark" id="btn_cambiocontraseña" name="btn_cambiocontraseña" onclick="cambiar_contraseña()">CAMBIAR CONTRASEÑA</button>
				</center>
			</div>
		</div>	
	</div>
<?php
}
?>