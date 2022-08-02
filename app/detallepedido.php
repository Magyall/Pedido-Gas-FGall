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
	$est = $detallepedido[$i]['Est'];
	$com = $detallepedido[$i]['Com'];
	$cani = $detallepedido[$i]['Cani'];
	$pnom = $detallepedido[$i]['Pnom'];
	$pape = $detallepedido[$i]['Pape'];
	$cel = $detallepedido[$i]['Cel'];
}

if($est == "E"){
	header("Location: ../pedidorepartidor.php");
}

$tipo = $clase->Tipo($tip);
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
		<script src="../complementos/plugins/jquery-3.2.1.min.js"></script>
	</head>
	<body onload="enrutamiento()">
		<section class="popular-destination-area section-gap1">
			<div class="container">
				<div class="row d-flex justify-content-center">
	                <div class="menu-content pb-10 col-lg-8">
	                    <div class="title text-center">
	                        <h5><b>RECORRIDO DEL PEDIDO</b></h5>
	                    </div>
	                </div>
	            </div>	
			</div>
		</section>	

		<section class="popular-destination-area">
			<div class="container">
				<input type="hidden" id="txthoramax" name="txthoramax" value="<?php echo $hormax ?>">
				<input type="hidden" id="txtfecmax" name="txtfecmax" value="<?php echo $fecmax ?>">

				<input type="hidden" id="txtlat" name="txthoramax" value="">
				<input type="hidden" id="txtlon" name="txtfecmax" value="">

				<input type="hidden" id="txtlatentrega" name="txtlatentrega" value="<?php echo $lat ?>">
				<input type="hidden" id="txtlonentrega" name="txtlonentrega" value="<?php echo $lon ?>">

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
						<td width="50%"><h5><font color="#f8b600">Tipo:</font></h5> <?php echo $tipo ?></td>
					</tr>
<?php
					if($tip == 1){
						if($hormax > 0){
?>
							<tr>
								<td colspan="2" align="center"><h5><font color="#f8b600">Fecha Entrega:</font></h5> <?php echo $fecmax.' / '.$hormax ?></td>
							</tr>
<?php
						}else{
?>
							<tr>
								<td colspan="2" align="center"><h5><font color="#f8b600">Fecha Entrega:</font></h5> <?php echo $fecmax ?></td>
							</tr>
<?php
						}
					}else{
?>
					<tr>
						<td width="50%"><h5><font color="#f8b600">Fecha Entrega:</font></h5> <?php echo $fecmax ?></td>
						<td width="50%"><h5><font color="#f8b600">Horas Entrega:</font></h5> <?php echo $horent.'/'.$hormax ?></div></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><h5><font color="#f8b600">Tiempo restante de entrega:</font></h5> <div id="hor_limite"></div></td>
					</tr>
<?php
					}

					if($tip == 1){
?>
					<tr>
						<td width="50%">
							<hr>
							<center>
								<button id="btnentregado" class="btn btn-outline-success" onclick="marcar_repartidor(2, <?php echo $id ?>)">
									Entregado <i class="nav-icon fa fa-check"></i>
								</button>
							</center>
						</td>
						<td width="50%">
							<hr>
							<center>
								<button class="btn btn-outline-info" onclick="mostrardivs(1)">
									Incompleto <i class="nav-icon fa fa-check"></i>
								</button>
							</center>
						</td>
					</tr>
<?php
					}else{
?>
					<tr>
						<td colspan="2" width="50%">
							<hr>
							<center>
								<button class="btn btn-outline-success" onclick="marcar_repartidor(5, <?php echo $id ?>)">
									Entregado <i class="nav-icon fa fa-check"></i>
								</button>
							</center>
						</td>
					</tr>
<?php
					}
?>
				</table>
				<hr>
				<div class="col-md-12 form-group" id="div_comentario">
					<center>
						<button class="btn btn-outline-danger" onclick="mostrardivs(2)">
							Cerrar comentario <i class="nav-icon fa fa-check"></i>
						</button>
						<hr>
            			<h6>Comentario</h6>
            			<textarea class="form-control" id="txtcomentario"></textarea>
						<hr>
						<button class="btn btn-outline-success" onclick="savecomentario(3, <?php echo $id ?>, $('#txtcomentario').val(), <?php echo $cani ?>)">
							Guardar <i class="nav-icon fa fa-check"></i>
						</button>
            		</center>
            	</div>        
            	<div class="col-md-12 form-group" id="div_ubicacion">
            		<center>
<?php
						if($lat == "" || $lon == ""){
?>
						<h6>Comentario</h6>
            			<label class="form-label"><?php echo $des ?></label>
<?php
						}else{
?>
						<h6>Ubicación</h6>
            			<div id="mapa" style="width: 100%; height: 400px;"></div>
<?php
						}
?>
            		</center>
            	</div>        
			</div>	
		</section>
		<script src="../complementos/plugins/jquery/jquery.min.js"></script>
        <script src="../complementos/plugins/alertifyjs/alertify.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbOp3b6Hbif-dt1haOd_UNKGo1a4ihMX8">
		</script>
        <script src="../js/maps_repartidor.js"></script>
        <script src="../js/repartidor.js"></script>
        <script type="text/javascript">
        	cargardivs();
        </script>
	</body>
</html>