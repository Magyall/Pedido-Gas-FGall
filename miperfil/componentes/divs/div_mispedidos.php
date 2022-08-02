<?php 
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/mispedidos_modelo.php');

$clase = new Procesos;

$idrol = $_SESSION['Rol'];
$iduser = $_SESSION['User'];

$datos_consulta = $clase->Listar($iduser);

$datos_repartidor = $clase->ListarRepartidor();
?>
<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>CREACION</th>
			<th>FINALIZACION</th>
			<th>CREADOR</th>
			<th>CANTIDAD</th>
			<th>TIPO</th>
			<th>ESTADO</th>
			<th>REPARTIDOR</th>
			<th>OPCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=0;$i<count($datos_consulta);$i++){
	$tipo = $clase->Tipo($datos_consulta[$i]['Tip']);
	$estado = $clase->Estado($datos_consulta[$i]['Est']);
	$repartidor = $clase->ListarRepartidorxId($datos_consulta[$i]['Idrep']);
	$usuario = $clase->ListarRepartidorxId($datos_consulta[$i]['Idusu']);
	$vehiculo = $clase->ListarVehiculoxId($datos_consulta[$i]['Idrep']);

	$idrep = 0;
	$modveh = "";
	$plaveh = "";

	for($j=0;$j<count($usuario);$j++){
		$idusu = $usuario[$j]['Id'];
		$nomusu = $usuario[$j]['Pnom'];
		$apeusu = $usuario[$j]['Pape'];
		$celusu = $usuario[$j]['Cel'];
		$ideusu = $usuario[$j]['Ide'];
		$dirusu = $usuario[$j]['Dir'];
	}

	for($j=0;$j<count($repartidor);$j++){
		$idrep = $repartidor[$j]['Id'];
		$nomrep = $repartidor[$j]['Pnom'];
		$aperep = $repartidor[$j]['Pape'];
	}

	for($j=0;$j<count($vehiculo);$j++){
		$modveh = $vehiculo[$j]['Mod'];
		$plaveh = $vehiculo[$j]['Pla'];
	}

	$datos=$datos_consulta[$i]['Id']."||".
			$datos_consulta[$i]['Idusu']."||".
			$datos_consulta[$i]['Idrep']."||".
			$datos_consulta[$i]['Num']."||".
			$datos_consulta[$i]['Fecing']."||".
			$datos_consulta[$i]['Horing']."||".
			$datos_consulta[$i]['Fecent']."||".
			$datos_consulta[$i]['Horent']."||".
			$datos_consulta[$i]['Fecmax']."||".
			$datos_consulta[$i]['Hormax']."||".
			$datos_consulta[$i]['Can']."||".
			$datos_consulta[$i]['Des']."||".
			$datos_consulta[$i]['Lat']."||".
			$datos_consulta[$i]['Lon']."||".
			$datos_consulta[$i]['Tip']."||".
			$datos_consulta[$i]['Est']."||".
			$nomusu."||".
			$apeusu."||".
			$celusu."||".
			$ideusu."||".
			$dirusu."||".
			$modveh."||".
			$plaveh."||".
			$tipo;	
?>
		<tr>
			<td><?php echo $datos_consulta[$i]['Fecing'].' - '.$datos_consulta[$i]['Horing'] ?></td>
			<td><?php echo $datos_consulta[$i]['Fecent'].' - '.$datos_consulta[$i]['Horent'] ?></td>
			<td><?php echo $nomusu.' '.$apeusu ?></td>
			<td><?php echo $datos_consulta[$i]['Can'] ?></td>
			<td>
				<label class="form-label"><?php echo $tipo ?></label>
			</td>
			<td>
				<label class="form-label"><?php echo $estado ?></label>
			</td>
			<td>
<?php
			for($j=0;$j<count($datos_repartidor);$j++){
?>
				<label class="form-label"><?php echo $datos_repartidor[$j]["Pnom"].' '.$datos_repartidor[$j]["Pape"];?></label>
<?php
			}
?>				
			</td>
			<td>
				<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modaldetalles" onclick="cargar_datos('<?php echo $datos ?>')">
					<i class="nav-icon fa fa-eye"></i>
				</button>
			</td>
		</tr>
<?php
}
?>
	</tbody>
	<tfoot>
		<tr>
			<th>CREACION</th>
			<th>FINALIZACION</th>
			<th>CREADOR</th>
			<th>CANTIDAD</th>
			<th>TIPO</th>
			<th>ESTADO</th>
			<th>REPARTIDOR</th>
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