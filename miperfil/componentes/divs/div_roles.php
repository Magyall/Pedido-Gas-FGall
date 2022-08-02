<?php 
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/roles_modelo.php');

$clase = new Procesos;

$idrol = $_SESSION['Rol'];


if($idrol == 1){
	$datos_consulta = $clase->ListarRoot();
}else{
	$datos_consulta = $clase->Listar();
}
?>
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>DESCRIPCION</th>
			<th>ESTADO</th>
			<th>OPCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=0;$i<count($datos_consulta);$i++){
	$datos=$datos_consulta[$i]['Id']."||".
			$datos_consulta[$i]['Des']."||".
			$datos_consulta[$i]['Est'];
?>
		<tr>
			<td><?php echo $datos_consulta[$i]['Des'] ?></td>
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
			<th>DESCRIPCION</th>
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