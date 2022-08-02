<?php 
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/pedidos_modelo.php');

$clase = new Procesos;

$idrol = $_SESSION['Rol'];

if($idrol == 1){
	$datos_consulta = $clase->ListarRoot();
}else{
	$datos_consulta = $clase->Listar();
}
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
	<tbody id = "tablabody">
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
<?php
			if($idrol == 1){
				if($datos_consulta[$i]['Est'] != "E" && $datos_consulta[$i]['Est'] != "H" && $datos_consulta[$i]['Est'] != "T"){
?>
					<select class="form-control" onchange="actualizar_tipo(4, '<?php echo $datos_consulta[$i]['Id'] ?>', this.value)">
						<option value="<?php echo $datos_consulta[$i]['Tip'] ?>"><?php echo $tipo ?></option>
						<option value="1">NORMAL</option>
						<option value="2">URGENTE</option>
					</select>
<?php
				}else{
?>
					<label class="form-label"><?php echo $tipo ?></label>
<?php
				}
			}else{
?>
				<label class="form-label"><?php echo $tipo ?></label>
<?php
			}
?>
			</td>
			<td>
<?php
			if($idrol == 1){
				if($datos_consulta[$i]['Est'] != "E" && $datos_consulta[$i]['Est'] != "H" && $datos_consulta[$i]['Est'] != "T"){
?>
					<select class="form-control" onchange="actualizar_estado(3, '<?php echo $datos_consulta[$i]['Id'] ?>', this.value)">
						<option value="<?php echo $datos_consulta[$i]['Est'] ?>"><?php echo $estado ?></option>
						<option value="N">NUEVO</option>
						<option value="N">ASIGNADO</option>
						<option value="C">EN CAMINO</option>
						<option value="D">ENTREGADO</option>
					</select>
<?php	
				}else{
?>
					<label class="form-label"><?php echo $estado ?></label>
<?php					
				}
			}else{
?>
				<label class="form-label"><?php echo $estado ?></label>
<?php
			}
?>
			</td>
			<td>
<?php
			if($datos_consulta[$i]['Est'] != "E" && $datos_consulta[$i]['Est'] != "H" && $datos_consulta[$i]['Est'] != "T"){
?>
				<select class="form-control" onchange="actualizar_repartidor(5, '<?php echo $datos_consulta[$i]['Id'] ?>', this.value, '<?php echo $datos_consulta[$i]['Fecing'] ?>', '<?php echo $datos_consulta[$i]['Fecent'] ?>', '<?php echo $datos_consulta[$i]['Horent'] ?>', '<?php echo $datos_consulta[$i]['Tip'] ?>')">
<?php
					if($idrep > 0){
?>
						<option value="0"><?php echo $nomrep.' '.$aperep ?></option>
<?php
					}else{
?>
						<option value="0">-- Seleccionar --</option>
<?php
					}
?>
					
<?php
				for($j=0;$j<count($datos_repartidor);$j++){
?>
					<option value="<?php echo $datos_repartidor[$j]['Id'] ?>"><?php echo $datos_repartidor[$j]["Pnom"].' '.$datos_repartidor[$j]["Pape"] ?></option>
<?php
					
				}
?>
				</select>
<?php
			}else{
				echo $nomrep.' '.$aperep;
			}
?>				
			</td>
			<td>
				<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modaldetalles" onclick="cargar_datos('<?php echo $datos ?>')">
					<i class="nav-icon fa fa-eye"></i>
				</button>

				<button class="btn btn-outline-secondary" onclick="eliminar_datos(1, '<?php echo $datos_consulta[$i]['Id'] ?>')">
					<i class="nav-icon fa fa-trash-alt"></i>
				</button>
<?php
				if($idrol == 1){
?>
					<button class="btn btn-outline-secondary" onclick="eliminar_datos(2, '<?php echo $datos_consulta[$i]['Id'] ?>')">
						<i class="nav-icon fa fa-minus"></i>
					</button>
<?php
					if($datos_consulta[$i]['Est'] == "E"){
?>
					<button class="btn btn-outline-danger" onclick="restaurar_datos(3, '<?php echo $datos_consulta[$i]['Id'] ?>', 'I')">
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

				if($datos_consulta[$i]['Est'] == "H"){
?>
					<button class="btn btn-outline-secondary" data-toggle="modal" data-target="#modalcancelado" onclick="cargar_id('<?php echo $datos ?>')">
						<i class="nav-icon fa fa-edit"></i>
					</button>
<?php
				}else{
?>
					<button class="btn btn-outline-secondary" onclick="cancelar_pedido(3, <?php echo $datos_consulta[$i]['Id'] ?>, 'T')">
						<i class="nav-icon fa fa-ban"></i>
					</button>
<?php				
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