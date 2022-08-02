<?php 
require_once('../../../config/conexion.php');
require_once('../../modelo/reportes_modelo.php');

$fecini = $_GET['fecini'];
$fecfin = $_GET['fecfin'];

$usr_ide = "";
$usr_nom = "";
$usr_ape = "";
$usr_ema = "";
$usr_dir = "";
$usr_cel = "";
$rep_ide = "";
$rep_nom = "";
$rep_ape = "";
$rep_ema = "";
$rep_dir = "";
$rep_cel = "";
$modveh = "";
$plaveh = "";

$clase = new Procesos;

$datos_consulta = $clase->Listarpedidos($fecini, $fecfin);
?>
<label>El filtro realizado es desde la fecha: <?php echo $fecini ?> y la fecha: <?php echo $fecfin ?></label>

<table id="example2" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>FECHA CREACION</th>
			<th>CANTIDAD</th>
			<th>USUARIO</th>
			<th>REPARTIDOR</th>
			<th>FECHA ENTREGA</th>
			<th>ESTADO</th>
			<th>VEHICULO</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=0;$i<count($datos_consulta);$i++){
	$datos=$datos_consulta[$i]['ped_idped']."||".
			$datos_consulta[$i]['ped_idusu']."||".
			$datos_consulta[$i]['ped_idrep']."||".
			$datos_consulta[$i]['ped_num']."||".
			$datos_consulta[$i]['ped_fecing']."||".
			$datos_consulta[$i]['ped_horing']."||".
			$datos_consulta[$i]['ped_fecent']."||".
			$datos_consulta[$i]['ped_horent']."||".
			$datos_consulta[$i]['ped_fecmax']."||".
			$datos_consulta[$i]['ped_hormax']."||".
			$datos_consulta[$i]['ped_can']."||".
			$datos_consulta[$i]['ped_des']."||".
			$datos_consulta[$i]['ped_lat']."||".
			$datos_consulta[$i]['ped_lon']."||".
			$datos_consulta[$i]['ped_tip']."||".
			$datos_consulta[$i]['ped_est'];

	$usuario = $clase->Listarusuario($datos_consulta[$i]['ped_idusu']);
	$repartidor = $clase->Listarusuario($datos_consulta[$i]['ped_idrep']);
	$vehiculo = $clase->Listarvehiculo($datos_consulta[$i]['ped_idrep']);

	for($j=0;$j<count($usuario);$j++){
		$usr_ide = $usuario[$j]['usr_ide'];
		$usr_nom = $usuario[$j]['usr_nom'];
		$usr_ape = $usuario[$j]['usr_ape'];
		$usr_ema = $usuario[$j]['usr_ema'];
		$usr_dir = $usuario[$j]['usr_dir'];
		$usr_cel = $usuario[$j]['usr_cel'];
	}

	for($j=0;$j<count($repartidor);$j++){
		$rep_ide = $repartidor[$j]['usr_ide'];
		$rep_nom = $repartidor[$j]['usr_nom'];
		$rep_ape = $repartidor[$j]['usr_ape'];
		$rep_ema = $repartidor[$j]['usr_ema'];
		$rep_dir = $repartidor[$j]['usr_dir'];
		$rep_cel = $repartidor[$j]['usr_cel'];
	}

	for($j=0;$j<count($vehiculo);$j++){
		$modveh = $vehiculo[$j]['vhc_mod'];
		$plaveh = $vehiculo[$j]['vhc_pla'];
	}


?>
		<tr>
			<td><?php echo $datos_consulta[$i]['ped_fecing'].' - '.$datos_consulta[$i]['ped_horing'] ?></td>
			<td><?php echo $datos_consulta[$i]['ped_can'] ?></td>
			<td><?php echo $usr_nom.' '.$usr_ape ?></td>
			<td><?php echo $rep_nom.' '.$rep_ape ?></td>
			<td><?php echo $datos_consulta[$i]['ped_fecent'].' - '.$datos_consulta[$i]['ped_horent'] ?></td>
			<td><?php echo $datos_consulta[$i]['ped_est'] ?></td>
			<td><?php echo $modveh.' - '.$plaveh ?></td>
		</tr>
<?php
}
?>
	</tbody>
	<tfoot>
		<tr>
			<th>FECHA CREACION</th>
			<th>CANTIDAD</th>
			<th>USUARIO</th>
			<th>REPARTIDOR</th>
			<th>FECHA ENTREGA</th>
			<th>ESTADO</th>
			<th>VEHICULO</th>
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