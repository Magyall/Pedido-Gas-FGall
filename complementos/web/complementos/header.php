<!-- chat -->
<link rel="stylesheet" href="./complementos/web/css/style-chat.css">

<header id="header">
	<!--
	<div class="header-top">
		<div class="container">
  		<div class="row align-items-center">
  			<div class="col-lg-6 col-sm-6 col-6 header-top-left">
  				<ul>
  					<li><a href="#">Visítanos</a></li>
  					<li><a href="#">Comprar boletos</a></li>
  				</ul>			
  			</div>
  			<div class="col-lg-6 col-sm-6 col-6 header-top-right">
				<div class="header-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
  			</div>
  		</div>			  					
		</div>
	</div>
	-->
	<div class="container main-menu">
		<div class="row align-items-center justify-content-between d-flex">
	      <div id="logo">
	        <a href="index.php"><img src="./complementos/images/logo.png" alt="" title="" style="height: 25px" /></a>
	      </div>
	      <nav id="nav-menu-container">
	        <ul class="nav-menu">
	          <li><a href="index.php">Inicio</a></li>
	          <li><a href="nosotros.php">Nosotros</a></li>
	          <li><a href="noticias.php">Noticias</a></li>
	          <li class="menu-has-children"><a href="#">Pedidos</a>
	            <ul>
	              <li><a href="pedido.php">Hacer Pedido</a></li>
	            </ul>
	          </li>		          		          
	          <li>
<?php
				if(isset($_SESSION['User'])){
					$user = $clase->datos_usuario($_SESSION['User']);
					for($i=0;$i<count($user);$i++){
?>
						<a href="./login.php?ver=1"><img src="./complementos/imagenes/usuarios/<?php echo $user[$i]['Fot'] ?>" style="height: 25px; border-radius: 50%"> PANEL</a>
<?php
					}
				}else{
?>
					<a href="./login.php?ver=1"><i class="nav-icon fa fa-user"></i> LOGIN</a>
<?php
				}
?>
	          	
	          </li>
	        </ul>
	      </nav>				      		  
		</div>
	</div>
</header>