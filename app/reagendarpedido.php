<?php
session_start();
date_default_timezone_set("America/Bogota");

require_once('../config/conexion.php');
require_once('../modelo/pedido_modelo.php');

$clase = new Pedido;

if(isset($_SESSION['Rol'])){
	$rol = $_SESSION['Rol'];
}else{
	header("Location: ../loginrepartidor.php");
}


$id = $_GET['id'];

$detallepedido = $clase->detalle_pedidos($id);

for($i=0;$i<count($detallepedido);$i++){
	$id = $detallepedido[$i]['Id'];
	$idusu = $detallepedido[$i]['Idusu'];
	$idrep = $detallepedido[$i]['Idrep'];
	$num = $detallepedido[$i]['Num'];
	$fecing = $detallepedido[$i]['Fecing'];
	$horing = $detallepedido[$i]['Horing'];
	$fecent = $detallepedido[$i]['Fecent'];
	$horent = $detallepedido[$i]['Horent'];
	$fecmax = $detallepedido[$i]['Fecmax'];
	$hormax = $detallepedido[$i]['Hormax'];
	$can = $detallepedido[$i]['Can'];
	$des = $detallepedido[$i]['Des'];
	$lat = $detallepedido[$i]['Lat'];
	$lon = $detallepedido[$i]['Lon'];
	$tip = $detallepedido[$i]['Tip'];
	$com = $detallepedido[$i]['Com'];
	$est = $detallepedido[$i]['Est'];
	$pnom = $detallepedido[$i]['Pnom'];
	$pape = $detallepedido[$i]['Pape'];
	$cel = $detallepedido[$i]['Cel'];
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="colorlib">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta charset="UTF-8">

		<title>PEDIDO</title>
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<link rel="stylesheet" href="../complementos/web/css/linearicons.css">
		<link rel="stylesheet" href="../complementos/web/css/font-awesome.min.css">
		<link rel="stylesheet" href="../complementos/web/css/bootstrap.css">
		<link rel="stylesheet" href="../complementos/web/css/magnific-popup.css">
		<link rel="stylesheet" href="../complementos/web/css/jquery-ui.css">				
		<link rel="stylesheet" href="../complementos/web/css/nice-select.css">							
		<link rel="stylesheet" href="../complementos/web/css/animate.min.css">
		<link rel="stylesheet" href="../complementos/web/css/owl.carousel.css">				
		<link rel="stylesheet" href="../complementos/web/css/main.css">
		<link rel="stylesheet" type="text/css" href="../complementos/plugins/alertifyjs/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="../complementos/plugins/alertifyjs/css/themes/default.css">
	</head>
	<body onload="ocultardivs()">
		<section class="popular-destination-area section-gap1">
			<div class="container">
				<div class="row d-flex justify-content-center">
	                <div class="menu-content pb-10 col-lg-8">
	                    <div class="title text-center">
	                    	<table border="0" width="100%">
									<tr>
										<td width="100%">
											<button class="btn btn-outline-secondary" style="width: 100%" onclick="window.location='./pedidorepartidor.php'">
												ATRAS
											</button>
										</td>
									</tr>
							</table>
	                    </div>
	                </div>
	            </div>	
			</div>
		</section>		

		<section class="popular-destination-area">
			<div class="container">
				<table width="100%">
					<tr>
						<td width="50%"><h5><font color="#f8b600">Num Pedido:</font></font></h5> <?php echo $num ?></td>
						<td width="50%"><h5><font color="#f8b600">Cliente:</font></h5> <?php echo $pnom.' '.$pape ?></td>
					</tr>

					<tr>
						<td width="50%"><h5><font color="#f8b600">Fecha Solicitud:</font></h5> <?php echo $fecing ?></td>
						<td width="50%"><h5><font color="#f8b600">Hora Solicitud:</font></h5> <?php echo $horing ?></td>
					</tr>

					<tr>
						<td width="50%"><h5><font color="#f8b600">Cantidad:</font></h5> <?php echo $can ?> cilindro/s</td>
						<td width="50%"><h5><font color="#f8b600">Tipo:</font></h5> Normal</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><h5><font color="#f8b600">Fecha Entrega:</font></h5> <?php echo $fecmax ?></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><h5><font color="#f8b600">Motivo del pedido incompleto:</font></h5> <?php echo $com ?></td>
					</tr>
					
				</table>
				<hr>
				<input class="form-control" type="date" id="txtnuevafecha" name="txtnuevafecha">
				<input class="form-control" type="time" id="txtnuevahora" name="txtnuevahora">
				<hr>
				<center>
					<button class="btn btn-outline-success" onclick="reagendar_pedido(4, <?php echo $id ?>, $('#txtnuevafecha').val(), $('#txtnuevahora').val())">
						Guardar <i class="nav-icon fa fa-check"></i>
					</button>
				</center>
			</div>
		</section>
		<script src="../complementos/web/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="../complementos/plugins/alertifyjs/alertify.js"></script>
        <script src="../js/pedido.js"></script>
	</body>
</html>