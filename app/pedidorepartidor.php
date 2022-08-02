<?php
session_start();
date_default_timezone_set("America/Bogota");

require_once('../config/conexion.php');
require_once('../modelo/pedido_modelo.php');

$clase = new Pedido;

$fechaactual = date("Y-m-d");
$user = 0;

if(isset($_SESSION['User'])){
	$user = $_SESSION['User'];
}else{
	header("Location: ../loginrepartidor.php");
}

$pedpersonalizado = $clase->datos_pedidourgente($user, $fechaactual, "A");
$pednormal = $clase->datos_pedidonormal($user, $fechaactual, "A");

$pedpersonalizado1 = $clase->datos_pedidourgente($user, $fechaactual, "C");
$pednormal1 = $clase->datos_pedidonormal($user, $fechaactual, "C");

$pedincompleto = $clase->datos_pedidoincompleto($user, "I");
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
										<td width="45%">
											<button class="btn btn-outline-secondary" style="width: 100%" onclick="mostrardivnormales()">
												NORMALES
											</button>
										</td>
										<td width="10%">
											<button class="btn btn-outline-secondary" style="width: 100%" onclick="window.location='../logout.php?opc=3'">
												<i class="fa fa-sign-out"></i>
											</button>
										</td>
										<td width="45%">
											<button class="btn btn-outline-secondary" style="width: 100%" onclick="mostrardivincompletos()">
												INCOMPLETO
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
				<div id="div_inicio">
					<img src="../complementos/images/logo.png" style="width: 100%;">
				</div>

				<div id="div_normales">
					<center><h5><b>Pedidos personalizados:</b></h5></center>
					<hr>
					<table width="100%" border="0">
<?php
						for($i=0;$i<count($pedpersonalizado);$i++){
							$tipo = $clase->Tipo($pedpersonalizado[$i]['Tip']);
?>
							<tr>
								<td width="50%"><h5><font color="#f8b600">Num Pedido:</font></font></h5> <?php echo $pedpersonalizado[$i]['Num'] ?></td>
								<td width="50%"><h5><font color="#f8b600">Cliente:</font></h5> <?php echo $pedpersonalizado[$i]['Pnom'].' '.$pedpersonalizado[$i]['Pape'] ?></td>
							</tr>
							<tr>
								<td width="50%"><h5><font color="#f8b600">Total cilindros:</font></h5> cantidad <?php echo $pedpersonalizado[$i]['Can'] ?></td>
								<td width="50%"><h5><font color="#f8b600">Fecha y hora limite de entrega:</font></h5> <?php echo $pedpersonalizado[$i]['Fecmax'].' '.$pedpersonalizado[$i]['Hormax'] ?></td>
							</tr>
							<tr>
								<td colspan="2">
									<center>
										<!--
										<button class="btn btn-outline-warning" onclick="location.href='../detallepedidosrepartidor.php?id=<?php echo $pedpersonalizado[$i]["Id"] ?>';">
											Realizar entrega <i class="nav-icon fa fa-caret-square-o-right"></i>
										</button>
										-->
										<button class="btn btn-outline-success" onclick="comenzarentrega(1, <?php echo $pedpersonalizado[$i]["Id"] ?>)">
											Realizar entrega <i class="nav-icon fa fa-caret-square-o-right"></i>
										</button>
									</center>
								</td>
							</tr>
<?php
						}
?>
					</table>
					<table width="100%" border="0">
<?php
						for($i=0;$i<count($pedpersonalizado1);$i++){
							$tipo = $clase->Tipo($pedpersonalizado1[$i]['Tip']);
?>
							<tr>
								<td width="50%"><h5><font color="#f8b600">Num Pedido:</font></font></h5> <?php echo $pedpersonalizado1[$i]['Num'] ?></td>
								<td width="50%"><h5><font color="#f8b600">Cliente:</font></h5> <?php echo $pedpersonalizado1[$i]['Pnom'].' '.$pedpersonalizado1[$i]['Pape'] ?></td>
							</tr>
							<tr>
								<td width="50%"><h5><font color="#f8b600">Total cilindros:</font></h5> cantidad <?php echo $pedpersonalizado1[$i]['Can'] ?></td>
								<td width="50%"><h5><font color="#f8b600">Fecha y hora limite de entrega:</font></h5> <?php echo $pedpersonalizado1[$i]['Fecmax'].' '.$pedpersonalizado1[$i]['Hormax'] ?></td>
							</tr>
							<tr>
								<td colspan="2">
									<center>
										<!--
										<button class="btn btn-outline-warning" onclick="location.href='../detallepedidosrepartidor.php?id=<?php echo $pedpersonalizado1[$i]["Id"] ?>';">
											Realizar entrega <i class="nav-icon fa fa-caret-square-o-right"></i>
										</button>
										-->
										<button class="btn btn-outline-success" onclick="comenzarentrega(1, <?php echo $pedpersonalizado1[$i]["Id"] ?>)">
											Continuar entrega <i class="nav-icon fa fa-caret-square-o-right"></i>
										</button>
									</center>
								</td>
							</tr>
<?php
						}
?>
					</table>
					<hr>
					<center><h5><b>Pedidos normales:</b></h5></center>
					<hr>
					<table width="100%" border="0">
<?php
						for($i=0;$i<count($pednormal);$i++){
							$tipo = $clase->Tipo($pednormal[$i]['Tip']);
?>
							<tr>
								<td width="50%"><h5><font color="#f8b600">Num Pedido:</font></font></h5> <?php echo $pednormal[$i]['Num'] ?></td>
								<td width="50%"><h5><font color="#f8b600">Cliente:</font></h5> <?php echo $pednormal[$i]['Pnom'].' '.$pednormal[$i]['Pape'] ?></td>
							</tr>

							<tr>
								<td width="50%"><h5><font color="#f8b600">Total cilindros:</font></h5> cantidad <?php echo $pednormal[$i]['Can'] ?></td>
<?php
								if($pednormal[$i]['Hormax'] != "" || $pednormal[$i]['Hormax'] != NULL){
?>
								<td width="50%"><h5><font color="#f8b600">Fecha y hora entrega:</font></h5> <?php echo $pednormal[$i]['Fecmax'].' - '. $pednormal[$i]['Hormax'] ?></td>
<?php
								}
?>
							</tr>
<?php
								if($pednormal[$i]['Hormax'] != "" || $pednormal[$i]['Hormax'] != NULL || $pednormal[$i]['Hormax'] > "00:00:00"){
?>	
							<tr>
								<td colspan="2" align="center"><h5><font color="red">PEDIDO REAGENDADO</td>
							</tr>
<?php
								}
?>
							<tr>
								<td colspan="2">
									<center>
										<button class="btn btn-outline-success" onclick="comenzarentrega(1, <?php echo $pednormal[$i]["Id"] ?>)">
											Realizar entrega <i class="nav-icon fa fa-caret-square-o-right"></i>
										</button>
									</center>
								</td>
							</tr>
<?php
						}
?>
					</table>
					<table width="100%" border="0">
<?php
						for($i=0;$i<count($pednormal1);$i++){
							$tipo = $clase->Tipo($pednormal1[$i]['Tip']);
?>
							<tr>
								<td width="50%"><h5><font color="#f8b600">Num Pedido:</font></font></h5> <?php echo $pednormal1[$i]['Num'] ?></td>
								<td width="50%"><h5><font color="#f8b600">Cliente:</font></h5> <?php echo $pednormal1[$i]['Pnom'].' '.$pednormal1[$i]['Pape'] ?></td>
							</tr>

							<tr>
								<td width="50%"><h5><font color="#f8b600">Total cilindros:</font></h5> cantidad <?php echo $pednormal1[$i]['Can'] ?></td>
							</tr>
							<tr>
								<td colspan="2">
									<center>
										<button class="btn btn-outline-success" onclick="comenzarentrega(1, <?php echo $pednormal1[$i]["Id"] ?>)">
											Continuar entrega <i class="nav-icon fa fa-caret-square-o-right"></i>
										</button>
									</center>
								</td>
							</tr>
<?php
						}
?>
					</table>
				</div>
				<div id="div_incompletos">
					<center><h5><b>Pedidos incompletos:</b></h5></center>
					<hr>
					<table width="100%" border="0">
<?php
						for($i=0;$i<count($pedincompleto);$i++){
							$tipo = $clase->Tipo($pedincompleto[$i]['Tip']);
?>
							<tr>
								<td width="50%"><h5><font color="#f8b600">Num Pedido:</font></h5> <?php echo $pedincompleto[$i]['Num'] ?></td>
								<td width="50%"><h5><font color="#f8b600">Cliente:</font></h5> <?php echo $pedincompleto[$i]['Pnom'].' '.$pedincompleto[$i]['Pape'] ?></td>
							</tr>

							<tr>
								<td width="50%"><h5><font color="#f8b600">Tipo:</font></h5> <?php echo $tipo ?></td>
								<td width="50%"><h5><font color="#f8b600">Fecha Entrega:</font></h5> <?php echo $pedincompleto[$i]['Fecent'] ?></td>
							</tr>
							<tr>
								<td colspan="2" width="50%">
									<center>
										<button class="btn btn-outline-info" onclick="location.href='./reagendarpedido.php?id=<?php echo $pedincompleto[$i]["Id"] ?>';">
											Reagendar <i class="nav-icon fa fa-caret-square-o-right"></i>
										</button>
									</center>
								</td>
							</tr>
<?php
						}
?>
					</table>
				</div>	
			</div>
		</section>
		<script src="../complementos/web/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="../complementos/plugins/alertifyjs/alertify.js"></script>
        <script src="../js/pedido.js"></script>
	</body>
</html>