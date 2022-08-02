<?php 
require_once('../../../config/conexion.php');
require_once('../../modelo/reportes_modelo.php');

$clase = new Procesos;

$datos_consulta = $clase->Listarclientes();
?>
<label>Listado de todos los clientes.</label>

<table id="example2" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>DNI</th>
			<th>USUARIO</th>
			<th>EMAIL</th>
			<th>CELULAR</th>
			<th>F. NACIMIENTO</th>
			<th>F. REGISTRO</th>
			<th>ROL</th>
			<th>ESTADO</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=0;$i<count($datos_consulta);$i++){
	$detselect = $clase->ListarRolxid($datos_consulta[$i]['Idrol']);
	$estado = $clase->Estado($datos_consulta[$i]['Est']);
?>
		<tr>
			<td><?php echo $datos_consulta[$i]['Dni'] ?></td>
			<td><?php echo $datos_consulta[$i]['Pnom'].' - '.$datos_consulta[$i]['Snom'].' - '.$datos_consulta[$i]['Pape'].' - '.$datos_consulta[$i]['Sape'] ?></td>
			<td><?php echo $datos_consulta[$i]['Ema'] ?></td>
			<td><?php echo $datos_consulta[$i]['Cel'] ?></td>
			<td><?php echo $datos_consulta[$i]['Nac'] ?></td>
			<td><?php echo $datos_consulta[$i]['Reg'] ?></td>
			<td><?php echo $detselect ?></td>
			<td><?php echo $estado ?></td>
		</tr>
<?php
}
?>
	</tbody>
	<tfoot>
		<tr>
			<th>DNI</th>
			<th>USUARIO</th>
			<th>EMAIL</th>
			<th>CELULAR</th>
			<th>F. NACIMIENTO</th>
			<th>F. REGISTRO</th>
			<th>ROL</th>
			<th>ESTADO</th>
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