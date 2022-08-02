<?php 
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/sliders_modelo.php');

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
			<th>NOMBRE</th>
			<th>DESCRIPCION</th>
			<th>PAGINA</th>
			<th>IMAGEN</th>
			<th>OPCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=0;$i<count($datos_consulta);$i++){
	$datos=$datos_consulta[$i]['Id']."||".
			$datos_consulta[$i]['Nom']."||".
			$datos_consulta[$i]['Des']."||".
			$datos_consulta[$i]['Pag']."||".
			$datos_consulta[$i]['Url']."||".
			$datos_consulta[$i]['Est'];
?>
		<tr>
			<td><?php echo $datos_consulta[$i]['Nom'] ?></td>
			<td><?php echo $datos_consulta[$i]['Des'] ?></td>
			<td><?php echo $datos_consulta[$i]['Pag'] ?></td>
			<td>
<?php
				if($datos_consulta[$i]['Url'] == 'Sinfoto'){
?>
				<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalimagen" onclick="cargar_datos('<?php echo $datos ?>')">
					<i class="nav-icon fa fa-image"></i>
				</button>
<?php
				}else{
?>
				<img src="../complementos/imagenes/sliders/<?php echo $datos_consulta[$i]['Url'] ?>" style="height: 30px" data-toggle="modal" data-target="#modalimagen" onclick="cargar_datos('<?php echo $datos ?>')">
<?php
				}
?>
			</td>
			<td>
				<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalactualizar" onclick="cargar_datos('<?php echo $datos ?>')">
					<i class="nav-icon fa fa-pen"></i>
				</button>
			</td>
		</tr>
<?php
}
?>
	</tbody>
	<tfoot>
		<tr>
			<th>NOMBRE</th>
			<th>DESCRIPCION</th>
			<th>PAGINA</th>
			<th>IMAGEN</th>
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