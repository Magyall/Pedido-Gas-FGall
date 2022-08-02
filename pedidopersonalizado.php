<?php
session_start();
date_default_timezone_set("America/Bogota");

if (!isset($_SESSION['Rol'])) {
	echo '<script>window.location = "./login.php?ver=1";</script>';
}

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
	<body>

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
				<div class="row d-flex justify-content-center">
	                <div class="menu-content pb-10 col-lg-8">
	                    <div class="title text-center">
	                        <h5><b>Ingrese todos los campos que le solicitan el formulario para realizar el pedido.</b></h5>
	                    </div>
	                </div>
	            </div>	
	            <form id="frmadddatos" method="post">
	            	<input type="hidden" id="parametro" name="parametro" value="3">
            		<input type="hidden" id="txtidusu" name="txtidusu" value="0">
		            <div class="row">
		            	<div class="col-lg-12">
		            		<h6><b>Datos del usuario:</b></h6>
		            	</div>

		            	<div id="div_usuario" class="row">
		            		<div class="col-lg-4 form-group">
			            		<div class="row">
			            			<div class="col-lg-3" style="align-self: center;">
			            				<h6>Identificación:</h6>
			            			</div>
			            			<div class="col-lg-9" style="align-self: center;">
			            				<input class="form-control" type="text" id="txtdni" name="txtdni" value="" onblur="verificar_cliente(2, this.value)">
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-4 form-group">
			            		<div class="row">
			            			<div class="col-lg-3" style="align-self: center;">
			            				<h6>Email:</h6>
			            			</div>
			            			<div class="col-lg-9" style="align-self: center;">
			            				<input class="form-control" type="text" id="txtemail" name="txtemail" value="">
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-4 form-group">
			            		<div class="row">
			            			<div class="col-lg-3" style="align-self: center;">
			            				<h6>Celular:</h6>
			            			</div>
			            			<div class="col-lg-9" style="align-self: center;">
			            				<input class="form-control" type="text" value="" id="txtcel" name="txtcel">
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-6 form-group">
			            		<div class="row">
			            			<div class="col-lg-3" style="align-self: center;">
			            				<h6>Primer Nombre:</h6>
			            			</div>
			            			<div class="col-lg-9" style="align-self: center;">
			            				<input class="form-control" type="text" value="" id="txtpnom" name="txtpnom">
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-6 form-group">
			            		<div class="row">
			            			<div class="col-lg-3" style="align-self: center;">
			            				<h6>Segundo Nombre:</h6>
			            			</div>
			            			<div class="col-lg-9" style="align-self: center;">
			            				<input class="form-control" type="text" value="" id="txtsnom" name="txtsnom">
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-6 form-group">
			            		<div class="row">
			            			<div class="col-lg-3" style="align-self: center;">
			            				<h6>Primer Apellido:</h6>
			            			</div>
			            			<div class="col-lg-9" style="align-self: center;">
			            				<input class="form-control" type="text" value="" id="txtpape" name="txtpape">
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-6 form-group">
			            		<div class="row">
			            			<div class="col-lg-3" style="align-self: center;">
			            				<h6>Segundo Apellido:</h6>
			            			</div>
			            			<div class="col-lg-9" style="align-self: center;">
			            				<input class="form-control" type="text" value="" id="txtsape" name="txtsape">
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-12 form-group">
			            		<div class="row">
			            			<div class="col-lg-1" style="align-self: center;">
			            				<h6>Direccion:</h6>
			            			</div>
			            			<div class="col-lg-11" style="align-self: center;">
			            				<input class="form-control" type="text" value="" id="txtdir" name="txtdir">
			            			</div>
			            		</div>
			            	</div>
		            	</div>

		            </div>
		            <hr>
	    			<div class="row">
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
			            				
			            			</div>
			            			<div class="col-lg-5" style="align-self: center;">
			            				
			            			</div>
			            		</div>
			            	</div>

			            	<div class="col-lg-8 form-group">
			            		<div class="row">
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
		            	</div>
	            	</div>
            	</form>
            	<div class="row">
            		<div class="col-md-6 form-group">
	            		<center>
	            			<button type"button" class="btn btn-dark" id="btnlimpiar">Vacias campos</button>
            			</center>
	            	</div>
	            	<div class="col-md-6 form-group">
	            		<center>
	            			<button type"button" class="btn btn btn-secondary" id="btnagregar">Guardar Pedido</button>
            			</center>
	            	</div>
            	</div>
			</div>	
		</section>
<?php 
		include('./complementos/web/complementos/footer.php'); 
?>
		<script src="./js/pedidopersonalizado.js"></script>
		<script src="./complementos/plugins/alertifyjs/alertify.js"></script>
	</body>
</html>