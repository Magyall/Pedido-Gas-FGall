<?php
session_start();
date_default_timezone_set("America/Bogota");

require_once('./config/conexion.php');
require_once('./modelo/web_modelo.php');

$clase = new Web;

$pagina = "inicio";

$compania = $clase->datos_compania();
$noticias = $clase->datos_noticias();
$slider = $clase->datos_sliders($pagina);

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
	</head>
	<body>

<?php 
		include ('./complementos/web/complementos/header.php'); 
?>
		<section class="banner-area relative" style="background: url(./complementos/imagenes/sliders/<?php echo $urls ?>) center;">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row fullscreen align-items-center justify-content-between">
					<div class="col-lg-8 col-md-8 banner-left">
						<h1 class="text-white"><?php echo $nom ?></h1>
						<p class="text-white">
							<?php echo $des ?>
						</p>
						<a href="./pedido.php" class="primary-btn text-uppercase">HACER PEDIDO</a>
					</div>
					
					<div class="col-lg-4 col-md-4 banner-right">
						<center>
							<img src="./complementos/images/<?php echo $log ?>" style="width: 100%">
						</center>
					</div>
				</div>
			</div>					
		</section>

		<section class="popular-destination-area section-gap">
			<div class="container">
	            <div class="row d-flex justify-content-center">
	                <div class="menu-content pb-70 col-lg-8">
	                    <div class="title text-center">
	                        <h1 class="mb-10">Noticias</h1>
	                        <p>La compañia <?php echo $nom ?> le presenta las siguientes noticias destacadas. Para ver todas las noticias pulsar <a href="noticias.php">AQUI</a></p>
	                    </div>
	                </div>
	            </div>						
				<div class="row">
<?php
					for($i=0;$i<count($noticias);$i++){
?>
						<div class="col-lg-4">
							<div class="single-destination relative">
								<div class="thumb relative">
									<div class="overlay overlay-bg"></div>
									<img class="img-fluid" src="./complementos/imagenes/noticias/<?php echo $noticias[$i]['Img'] ?>" alt="">
								</div>
								<div class="desc">	
									<a href="#" class="price-btn">VER MAS</a>
									<h4><?php echo $noticias[$i]['Tit'] ?></h4>
									<p><?php echo $noticias[$i]['Des'] ?></p>
								</div>
							</div>
						</div>
<?php
					}
?>									
				</div>
			</div>	
		</section>
		<?php include('./complementos/web/complementos/footer.php'); ?>
	</body>
</html>