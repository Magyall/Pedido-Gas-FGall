<?php 
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/usuarios_modelo.php');

$clase = new Procesos;

$idrol = $_SESSION['Rol'];


if($idrol == 1){
	$datos_consulta = $clase->ListarRoot();
	$selectrol = $clase->ListarRolRoot();
}else{
	$datos_consulta = $clase->Listar();
	$selectrol = $clase->ListarRol();
}
?>
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>DNI</th>
			<th>USUARIO</th>
			<th>CONTRASEÑA</th>
			<th>ROL</th>
			<th>ESTADO</th>
			<th>OPCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=0;$i<count($datos_consulta);$i++){
	$datos=$datos_consulta[$i]['Id']."||".
			$datos_consulta[$i]['Dni']."||".
			$datos_consulta[$i]['Pnom']."||".
			$datos_consulta[$i]['Snom']."||".
			$datos_consulta[$i]['Pape']."||".
			$datos_consulta[$i]['Sape']."||".
			$datos_consulta[$i]['Ema']."||".
			$datos_consulta[$i]['Pas']."||".
			$datos_consulta[$i]['Dir']."||".
			$datos_consulta[$i]['Cel']."||".
			$datos_consulta[$i]['Nac']."||".
			$datos_consulta[$i]['Reg']."||".
			$datos_consulta[$i]['Fot']."||".
			$datos_consulta[$i]['Est']."||".
			$datos_consulta[$i]['Acor']."||".
			$datos_consulta[$i]['Idrol'];
	$detselect = $clase->ListarRolxid($datos_consulta[$i]['Idrol']);
?>
		<tr>
			<td><?php echo $datos_consulta[$i]['Dni'] ?></td>
			<td><?php echo $datos_consulta[$i]['Pnom'].' '.$datos_consulta[$i]['Snom'].' '.$datos_consulta[$i]['Pape'].' '.$datos_consulta[$i]['Sape'] ?></td>
			<td>
<?php 
					if($datos_consulta[$i]['Acor'] == 0){
?>
				<label>Contraseña valida.</label><br>
				<a href="" data-toggle="modal" data-target="#modalpassword" onclick="cargar_id('<?php echo $datos ?>')">Cambiar contraseña</a>
<?php
					}else{
?>
				<label>Contraseña caducada.</label><br>
				<a href="" data-toggle="modal" data-target="#modalpassword" onclick="cargar_id('<?php echo $datos ?>')">Cambiar contraseña</a>
<?php
					}
?>
			</td>
			<td>
				<select class="form-control" onchange="actualizar_rol(7, '<?php echo $datos_consulta[$i]['Id'] ?>', this.value)">
<?php
					for($j=0;$j<count($detselect);$j++){
?>
					<option value="<?php echo $selectrol['Id'] ?>"><?php echo $detselect[$j]['Des'] ?></option>
<?php
					}
					for($j=0;$j<count($selectrol);$j++){
?>
					<option value="<?php echo $selectrol[$j]['Id'] ?>"><?php echo $selectrol[$j]['Des'] ?></option>
<?php
					}
?>
				</select>
			</td>
			<td>
<?php
					if($datos_consulta[$i]['Est'] == "A"){
?>
				<label class="form-label">INACTIVO</label>
		      	<label class="switch">
					<input type="checkbox" checked="" onchange="actualizar_estado(5, '<?php echo $datos_consulta[$i]['Id'] ?>', 'I')">
					<span class="slider round"></span>
				</label>
				<label class="form-label">ACTIVO</label>
<?php
					}else{
						if($datos_consulta[$i]['Est'] == "E"){
?>
						<label>Datos Eliminados.</label>
<?php
						}else{
?>
				<label class="form-label">INACTIVO</label>
		      	<label class="switch">
					<input type="checkbox" onchange="actualizar_estado(5, '<?php echo $datos_consulta[$i]['Id'] ?>', 'A')">
					<span class="slider round"></span>
				</label>
				<label class="form-label">ACTIVO</label>
<?php
						}
					}
?>
					
			</td>
			<td>
				<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalactualizar" onclick="cargar_datos('<?php echo $datos ?>')">
					<i class="nav-icon fa fa-pen"></i>
				</button>
				
				<button class="btn btn-outline-secondary" onclick="eliminar_datos(3, '<?php echo $datos_consulta[$i]['Id'] ?>')">
					<i class="nav-icon fa fa-trash-alt"></i>
				</button>
<?php
				if($idrol == 1){
?>
					<button class="btn btn-outline-secondary" onclick="eliminar_datos(4, '<?php echo $datos_consulta[$i]['Id'] ?>')">
						<i class="nav-icon fa fa-minus"></i>
					</button>
<?php
					if($datos_consulta[$i]['Est'] == "E"){
?>
					<button class="btn btn-outline-danger" onclick="restaurar_datos(5, '<?php echo $datos_consulta[$i]['Id'] ?>', 'I')">
						<i class="nav-icon fa fa-times-circle"></i>
					</button>
<?php
					}else{
?>
					<button class="btn btn-outline-info">
						<i class="nav-icon fa fa-check-circle"></i>
					</button>
<?php
					}
				}else{

				}
?>
			</td>
		</tr>
<?php
}
?>
	</tbody>
	<tfoot>
		<tr>
			<th>DNI</th>
			<th>USUARIO</th>
			<th>CONTRASEÑA</th>
			<th>ESTADO</th>
			<th>OPCIONES</th>
		</tr>
	</tfoot>
</table>

<script type="text/javascript">
	$(function () {
	    $("#example1").DataTable({
			"responsive": true, "lengthChange": false, "autoWidth": false,
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	    $('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
	    });
	});
</script>