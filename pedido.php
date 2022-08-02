<?php
session_start();
date_default_timezone_set("America/Bogota");

require_once('./config/conexion.php');
require_once('./modelo/web_modelo.php');
require_once('./modelo/pedido_modelo.php');

$clase = new Web;
$clase1 = new Pedido;

$pagina = "pedido";

$compania = $clase->datos_compania();
$slider = $clase->datos_sliders($pagina);
$numero = $clase1->MostrarNumero();


for($i=0;$i<count($numero);$i++){
	$num = $numero[$i]['Num']+1;
	$numpedido = 'NUM-'.str_pad(($num), 4, "0", STR_PAD_LEFT);
}

for($i=0;$i<count($compania);$i++){
	$id = $compania[$i]['Id'];
	$nom = $compania[$i]['Nom'];
	$des = $compania[$i]['Des'];
	$his = $compania[$i]['His'];
	$mis = $compania[$i]['Mis'];
	$vis = $compania[$i]['Vis'];
	$log = $compania[$i]['Log'];
	$img = $compania[$i]['Img'];
	$est = $compania[$i]['Est'];
}

for($i=0;$i<count($slider);$i++){
	$ids = $slider[$i]['Id'];
	$noms = $slider[$i]['Nom'];
	$dess = $slider[$i]['Des'];
	$pags = $slider[$i]['Pag'];
	$urls = $slider[$i]['Url'];
	$ests = $slider[$i]['Est'];
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

		<title>INICIO - <?php echo strtoupper($nom) ?></title>
		<link rel="icon" type="image/png" href="./complementos/images/<?php echo $log ?>"/>
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
		<link rel="stylesheet" href="./complementos/web/css/linearicons.css">
		<link rel="stylesheet" href="./complementos/web/css/font-awesome.min.css">
		<link rel="stylesheet" href="./complementos/web/css/bootstrap.css">
		<link rel="stylesheet" href="./complementos/web/css/magnific-popup.css">
		<link rel="stylesheet" href="./complementos/web/css/jquery-ui.css">				
		<link rel="stylesheet" href="./complementos/web/css/nice-select.css">							
		<link rel="stylesheet" href="./complementos/web/css/animate.min.css">
		<link rel="stylesheet" href="./complementos/web/css/owl.carousel.css">				
		<link rel="stylesheet" href="./complementos/web/css/main.css">
		<link rel="stylesheet" type="text/css" href="./complementos/plugins/alertifyjs/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="./complementos/plugins/alertifyjs/css/themes/default.css">
	</head>
	<body onload="enrutamiento()">

<?php 
		include ('./complementos/web/complementos/header.php'); 
?>
		<section class="banner-area relative" style="background: url(./complementos/imagenes/sliders/<?php echo $urls ?>) center;">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row align-items-end justify-content-between" style="height: 200px">
					<div class="col-lg-12 col-md-12 banner-left">
						<center><h1 style="color: white">PEDIDOS</h1></center>
					</div>
				</div>
			</div>					
		</section>

		<section class="popular-destination-area section-gap1">
			<div class="container">
<?php
				if (isset($_SESSION['Rol'])) {
					$usuario = $clase->datos_usuario($_SESSION['User']);
					for($i=0;$i<count($usuario);$i++){
?>
					<div class="row d-flex justify-content-center">
		                <div class="menu-content pb-10 col-lg-8">
		                    <div class="title text-center">
		                        <h5><b>Ingrese todos los campos que le solicitan el formulario para realizar el pedido.</b></h5>
		                    </div>
		                </div>
		            </div>	
		            <div class="row">
		            	<div class="col-lg-12">
		            		<h6><b>Datos del usuario:</b></h6>
		            	</div>
		            	<div class="col-lg-6 form-group">
		            		<div class="row">
		            			<div class="col-lg-3" style="align-self: center;">
		            				<h6>Usuario:</h6>
		            			</div>
		            			<div class="col-lg-9" style="align-self: center;">
		            				<input class="form-control" type="text" value="<?php echo $usuario[$i]['Pnom'].' '.$usuario[$i]['Snom'].' '.$usuario[$i]['Pape'].' '.$usuario[$i]['Sape'] ?>" readonly="">
		            			</div>
		            		</div>
		            	</div>
		            	<div class="col-lg-6 form-group">
		            		<div class="row">
		            			<div class="col-lg-3" style="align-self: center;">
		            				<h6>Email:</h6>
		            			</div>
		            			<div class="col-lg-9" style="align-self: center;">
		            				<input class="form-control" type="text" value="<?php echo $usuario[$i]['Ema'] ?>"  readonly="">
		            			</div>
		            		</div>
		            	</div>
		            	<div class="col-lg-4 form-group">
		            		<div class="row">
		            			<div class="col-lg-3" style="align-self: center;">
		            				<h6>Cédula:</h6>
		            			</div>
		            			<div class="col-lg-9" style="align-self: center;">
		            				<input class="form-control" type="text" value="<?php echo $usuario[$i]['Dni'] ?>" readonly="">
		            			</div>
		            		</div>
		            	</div>
		            	<div class="col-lg-4 form-group">
		            		<div class="row">
		            			<div class="col-lg-3" style="align-self: center;">
		            				<h6>Dirección:</h6>
		            			</div>
		            			<div class="col-lg-9" style="align-self: center;">
		            				<input class="form-control" type="text" value="<?php echo $usuario[$i]['Dir'] ?>"  readonly="">
		            			</div>
		            		</div>
		            	</div>
		            	<div class="col-lg-4 form-group">
		            		<div class="row">
		            			<div class="col-lg-3" style="align-self: center;">
		            				<h6>Teléfono:</h6>
		            			</div>
		            			<div class="col-lg-9" style="align-self: center;">
		            				<input class="form-control" type="text" value="<?php echo $usuario[$i]['Cel'] ?>"  readonly="">
		            			</div>
		            		</div>
		            	</div>
		            </div>
		            <hr>
            			<div class="row">
            				<form method="post" id="frmadddatos">
            					<input type="hidden" id="parametro" name="parametro" value="1">
				            	<input type="hidden" id="txtidusu" name="txtidusu" value="<?php echo $usuario[$i]['Id'] ?>">

				            	<input type="hidden" id="txtlat" name="txtlat" value="-0.075995">
				            	<input type="hidden" id="txtlon" name="txtlon" value="-78.435683">
				            	<div class="row">
					            	<div class="col-lg-12 form-group">
					            		<h6><b>Formulario de pedido:</b></h6>
					            	</div>
					            	<div class="col-lg-4 form-group">
					            		<div class="row">
					            			<div class="col-lg-3" style="align-self: center;">
					            				<h6>Número:</h6>
					            			</div>
					            			<div class="col-lg-9" style="align-self: center;" id="divnumero">
					            				<input class="form-control" id="txtnumero" name="txtnumero" type="text" value="<?php echo $numpedido ?>" readonly="">
					            			</div>
					            		</div>
					            	</div>
					            	<div class="col-lg-4 form-group">
					            		<div class="row">
					            			<div class="col-lg-3" style="align-self: center;">
					            				<h6>Fecha:</h6>
					            			</div>
					            			<div class="col-lg-9" style="align-self: center;">
					            				<input class="form-control" id="txtfecha" name="txtfecha" type="text" value="<?php echo date('Y-m-d') ?>" readonly="">
					            			</div>
					            		</div>
					            	</div>
					            	<div class="col-lg-4 form-group">
					            		<div class="row">
					            			<div class="col-lg-3" style="align-self: center;">
					            				<h6>Hora:</h6>
					            			</div>
					            			<div class="col-lg-9" style="align-self: center;">
					            				<input class="form-control" id="txthora" name="txthora" type="text" value="<?php echo date('G:i:s') ?>"  readonly="">
					            			</div>
					            		</div>
					            	</div>

					            	<div class="col-lg-4 form-group">
					            		<div class="row">
					            			<div class="col-lg-3" style="align-self: center;">
					            				<h6>Cantidad:</h6>
					            			</div>
					            			<div class="col-lg-3" style="align-self: center;">
					            				<input class="form-control" id="txtcantidad" name="txtcantidad" type="number" min="1" value="1">
					            			</div>
					            			<div class="col-lg-1" style="align-self: center;">
					            				<h6>Tipo</h6>
					            			</div>
					            			<div class="col-lg-5" style="align-self: center;">
					            				<select class="form-control" id="txttipo" name="txttipo" onchange="mostrarocultardiv()">
					            					<option value="0">Seleccionar</option>
					            					<option value="1">Normal</option>
					            					<option value="2">Personalizado</option>
					            				</select>
					            			</div>
					            		</div>
					            	</div>

					            	<div class="col-lg-8 form-group">
					            		<div class="row" id="divpersonalizado">
					            			<div class="col-lg-3" style="align-self: center;">
					            				<h6>Fecha Entrega:</h6>
					            			</div>
					            			<div class="col-lg-3" style="align-self: center;">
					            				<input class="form-control" type="date" id="txtfecentrega" name="txtfecentrega">
					            			</div>
					            			<div class="col-lg-3" style="align-self: center;">
					            				<h6>Hora Entrega:</h6>
					            			</div>
					            			<div class="col-lg-3" style="align-self: center;">
					            				<input class="form-control" type="time" id="txthorentrega" name="txthorentrega">
					            			</div>
					            		</div>
					            	</div>

					            	<div class="col-lg-12 form-group">
					            		<div class="row">
					            			<div class="col-lg-2" style="align-self: center;">
					            				<h6>Comentario:</h6>
					            			</div>
					            			<div class="col-lg-10" style="align-self: center;">
					            				<textarea class="form-control" id="txtcomentario" name="txtcomentario"></textarea>
					            			</div>
					            		</div>
					            	</div>

					            	<div class="col-md-12 form-group">
					            		<h6>Ubicación</h6>
					            		<center>
					            			<div id="mapa" style="width: 100%; height: 400px;"></div>
					            		</center>
					            	</div>
				            	</div>
	            			</form>
		            	</div>
		            	<div class="row">
		            		<div class="col-md-6 form-group">
			            		<center>
			            			<button type"button" class="btn btn-dark" id="btnlimpiar">Vaciar campos</button>
		            			</center>
			            	</div>
			            	<div class="col-md-6 form-group">
			            		<center>
			            			<button type"button" class="btn btn btn-secondary" id="btnagregar">Guardar Pedido</button>
		            			</center>
			            	</div>
		            	</div>
<?php
					}  
				}else{
?>
				<div class="row d-flex justify-content-center">
	                <div class="menu-content pb-10 col-lg-8">
	                    <div class="title text-center">
	                        <h5><b>No existe una sesion abierta para que pueda realizar un pedido.</b></h5>
	                        <a href="./login.php?ver=2">INICIAR SESIÓN</a>
	                    </div>
	                </div>
	            </div>
<?php
				}
?>	            
			</div>	
		</section>
<?php 
		include('./complementos/web/complementos/footer.php'); 
		//include('./js/di-maps.php');
?>
		<script src="./js/maps.js"></script>
		<script src="./js/pedido.js"></script>
		<!--
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbOp3b6Hbif-dt1haOd_UNKGo1a4ihMX8"></script>
    	-->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbOp3b6Hbif-dt1haOd_UNKGo1a4ihMX8">
    	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		</script>
		<script src="./complementos/plugins/alertifyjs/alertify.js"></script>
	</body>
</html>