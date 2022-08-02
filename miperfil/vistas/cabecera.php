<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PANEL - <?php echo strtoupper($nom) ?></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../complementos/plugins/fontawesome-free/css/all.min.css">
	<link rel="icon" type="image/png" href="../complementos/images/<?php echo $log ?>"/>
	<link rel="stylesheet" href="../complementos/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../complementos/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="../complementos/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="../complementos/panel/dist/css/adminlte.min.css">
	<link rel="stylesheet" type="text/css" href="../complementos/plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../complementos/plugins/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="../complementos/panel/css/buttontoggle.css">
	<link rel="stylesheet" href="../complementos/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../complementos/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<script src="../complementos/plugins/jquery-3.2.1.min.js"></script>
	<script>
		$(function () {
	        $('.select2').select2();

	        $('.select2bs4').select2({
	          theme: 'bootstrap4'
	        });
	    });

		
		var time;

		function inicio() { 
		  	time = setTimeout(function() { 
		    	$(document).ready(function(e) {
	        		document.location.href='../logout.php?opc=1';
				});
		    },180000);
		}
		 
		function reset() {
		  	clearTimeout(time);
		  	time = setTimeout(function() { 
		    	$(document).ready(function(e) {
		    		document.location.href='../logout.php?opc=1';
				});
	    	},180000);
		}
	</script>
</head>
<?php
if ($_SESSION['Rol'] == 5) {
?>
  <body class="hold-transition sidebar-mini">
<?php
}else{
?>
  <body class="hold-transition sidebar-mini" onload="inicio()" onkeypress="reset()" onclick="reset()" onmousemove="reset()">
<?php
}
?>
  <div class="wrapper">
  		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    		<ul class="navbar-nav">
      			<li class="nav-item">
        			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      			</li>
      			<li class="nav-item d-none d-sm-inline-block">
        			<a href="../miperfil/panel.php" class="nav-link">Inicio</a>
      			</li>
      			<!--
      			<li class="nav-item d-none d-sm-inline-block">
        			<a href="#" class="nav-link">Contact</a>
      			</li>
      			-->
			</ul>
    		<ul class="navbar-nav ml-auto">
      			<!--
      			<li class="nav-item">
        			<a class="nav-link" data-widget="navbar-search" href="#" role="button">
          				<i class="fas fa-search"></i>
    				</a>
    				<div class="navbar-search-block">
          				<form class="form-inline">
            				<div class="input-group input-group-sm">
              					<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              					<div class="input-group-append">
                					<button class="btn btn-navbar" type="submit">
              							<i class="fas fa-search"></i>
                					</button>
                					<button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  						<i class="fas fa-times"></i>
                					</button>
              					</div>
            				</div>
          				</form>
        			</div>
      			</li>
      			<li class="nav-item dropdown">
        			<a class="nav-link" data-toggle="dropdown" href="#">
          				<i class="far fa-comments"></i>
      					<span class="badge badge-danger navbar-badge">3</span>
        			</a>
        			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          				<a href="#" class="dropdown-item">
            				<div class="media">
              					<img src="../complementos/panel/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
          						<div class="media-body">
                					<h3 class="dropdown-item-title">
                  						Brad Diesel
                  						<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                					</h3>
                					<p class="text-sm">Call me whenever you can...</p>
                					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              					</div>
            				</div>
          				</a>
          				<div class="dropdown-divider"></div>
      					<a href="#" class="dropdown-item">
        					<div class="media">
          						<img src="../complementos/panel/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
      							<div class="media-body">
        							<h3 class="dropdown-item-title">
          								John Pierce
      									<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
        							</h3>
        							<p class="text-sm">I got your message bro</p>
        							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
      							</div>
    						</div>
      					</a>
      					<div class="dropdown-divider"></div>
  						<a href="#" class="dropdown-item">
            				<div class="media">
              					<img src="../complementos/panel/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              					<div class="media-body">
                					<h3 class="dropdown-item-title">
                  						Nora Silvester
                  						<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                					</h3>
                					<p class="text-sm">The subject goes here</p>
                					<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              					</div>
            				</div>
      					</a>
      					<div class="dropdown-divider"></div>
  						<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
					  	<i class="far fa-bell"></i>
					  	<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				  		<span class="dropdown-item dropdown-header">15 Notifications</span>
				  		<div class="dropdown-divider"></div>
			  			<a href="#" class="dropdown-item">
				    		<i class="fas fa-envelope mr-2"></i> 4 new messages
				    		<span class="float-right text-muted text-sm">3 mins</span>
				  		</a>
				  		<div class="dropdown-divider"></div>
			  			<a href="#" class="dropdown-item">
				    		<i class="fas fa-users mr-2"></i> 8 friend requests
				    		<span class="float-right text-muted text-sm">12 hours</span>
				  		</a>
				  		<div class="dropdown-divider"></div>
			  			<a href="#" class="dropdown-item">
				    		<i class="fas fa-file mr-2"></i> 3 new reports
				    		<span class="float-right text-muted text-sm">2 days</span>
				  		</a>
				  		<div class="dropdown-divider"></div>
			  			<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="fullscreen" href="#" role="button">
			  			<i class="fas fa-expand-arrows-alt"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
				  		<i class="fas fa-th-large"></i>
					</a>
				</li>
				-->
				<li class="nav-item d-none d-sm-inline-block">
        			<a href="../logout.php?opc=2" class="nav-link">
        				<i class="fas fa-sign-out-alt"></i>
        			</a>
      			</li>
			</ul>
		</nav>


