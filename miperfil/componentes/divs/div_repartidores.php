<?php 
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/repartidores_modelo.php');

$clase = new Procesos;

$idrol = $_SESSION['Rol'];


if($idrol == 1){
	$datos_consulta = $clase->ListarRoot();
}else{
	$datos_consulta = $clase->Listar();
}

$vehiculo = $clase->ListarVehiculo();
?>
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>DNI</th>
			<th>USUARIO</th>
			<th>VEHICULO</th>
			<th>CONTRASEÑA</th>
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
			$datos_consulta[$i]['Idrol']."||".
			$datos_consulta[$i]['Idveh'];

	$vehiculoxid = $clase->ListarVehiculoxId($datos_consulta[$i]['Idveh']);

	for($j=0;$j<count($vehiculoxid);$j++){
		$modveh = $vehiculoxid[$j]['Mod'];
		$plaveh = $vehiculoxid[$j]['Pla'];
	}
?>
		<tr>
			<td><?php echo $datos_consulta[$i]['Dni'].$datos_consulta[$i]['Idveh'] ?></td>
			<td><?php echo $datos_consulta[$i]['Pnom'].' '.$datos_consulta[$i]['Snom'].' '.$datos_consulta[$i]['Pape'].' '.$datos_consulta[$i]['Sape'] ?></td>
			<td>
				<select class="form-control" onchange="actualizar_vehiculo(7, <?php echo $datos_consulta[$i]['Id'] ?>, this.value)">
<?php
					if($datos_consulta[$i]['Idveh'] > 0){
?>
						<option value="0"><?php echo $modveh.' / '.$plaveh ?></option>
<?php
					}else{
?>
						<option value="0">-- Seleccionar --</option>
<?php
					}

					for($j=0;$j<count($vehiculo);$j++){
?>
						<option value="<?php echo $vehiculo[$j]['Id'] ?>"><?php echo $vehiculo[$j]["Mod"].' / '.$vehiculo[$j]["Pla"] ?></option>
<?php
						
					}
?>
				</select>
			</td>

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
			<th>VEHICULO</th>
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