<?php
session_start();
date_default_timezone_set("America/Bogota");

require_once('./config/conexion.php');
require_once('./modelo/web_modelo.php');

$clase = new Web;

$pagina = "noticias";

$compania = $clase->datos_compania();
$noticias = $clase->datos_noticias();
$noticiasnormales = $clase->datos_noticiasnormales();
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
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Noticias				
						</h1>	
						<p class="text-white link-nav"><a href="index.php">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <a href="nosotros.php"> Noticias</a></p>
					</div>	
				</div>
			</div>					
		</section>

		<section class="other-issue-area section-gap">
			<div class="container">
	            <div class="row d-flex justify-content-center">
	                <div class="menu-content pb-70 col-lg-9">
	                    <div class="title text-center">
	                        <h1 class="mb-10">Noticias Destacadas</h1>
	                    </div>
	                </div>
	            </div>					
				<div class="row">
<?php
					for($i=0;$i<count($noticias);$i++){
?>
					<div class="col-lg-4 col-md-6">
						<div class="single-other-issue">
							<div class="thumb">
								<img class="img-fluid" src="./complementos/imagenes/noticias/<?php echo $noticias[$i]['Img'] ?>" alt="">					
							</div>
							<a href="#">
								<h4><?php echo $noticias[$i]['Tit'] ?></h4>
							</a>
							<p>
								<?php echo $noticias[$i]['Des'] ?>
							</p>
						</div>
					</div>
<?php
					}
?>
<!--
					<div class="col-lg-4 col-md-6">
						<div class="single-other-issue">
							<div class="thumb">
								<img class="img-fluid" src="img/o1.jpg" alt="">					
							</div>
							<a href="#">
								<h4>Mision</h4>
							</a>
							<p>
								<?php echo $mis ?>
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-other-issue">
							<div class="thumb">
								<img class="img-fluid" src="img/o2.jpg" alt="">					
							</div>
							<a href="#">
								<h4>Vision</h4>
							</a>
							<p>
								<?php echo $vis ?>
							</p>
						</div>
					</div>																		
-->
				</div>
			</div>	
		</section>

		<section class="other-issue-area section-gap">
			<div class="container">
	            <div class="row d-flex justify-content-center">
	                <div class="menu-content pb-70 col-lg-9">
	                    <div class="title text-center">
	                        <h1 class="mb-10">Noticias Normales</h1>
	                    </div>
	                </div>
	            </div>					
				<div class="row">
<?php
					for($i=0;$i<count($noticiasnormales);$i++){
?>
					<div class="col-lg-4 col-md-6">
						<div class="single-other-issue">
							<div class="thumb">
								<img class="img-fluid" src="./complementos/imagenes/noticias/<?php echo $noticiasnormales[$i]['Img'] ?>" alt="">					
							</div>
							<a href="#">
								<h4><?php echo $noticiasnormales[$i]['Tit'] ?></h4>
							</a>
							<p>
								<?php echo $noticiasnormales[$i]['Des'] ?>
							</p>
						</div>
					</div>
<?php
					}
?>
<!--
					<div class="col-lg-4 col-md-6">
						<div class="single-other-issue">
							<div class="thumb">
								<img class="img-fluid" src="img/o1.jpg" alt="">					
							</div>
							<a href="#">
								<h4>Mision</h4>
							</a>
							<p>
								<?php echo $mis ?>
							</p>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="single-other-issue">
							<div class="thumb">
								<img class="img-fluid" src="img/o2.jpg" alt="">					
							</div>
							<a href="#">
								<h4>Vision</h4>
							</a>
							<p>
								<?php echo $vis ?>
							</p>
						</div>
					</div>																		
-->																	
				</div>
			</div>	
		</section>
<?php 
		include('./complementos/web/complementos/footer.php'); 
?>
	</body>
</html>