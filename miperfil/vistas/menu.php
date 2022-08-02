<?php  
$user = $clase->datos_usuario($_SESSION['User']);


$datos_menu = $clase->menu_principal($_SESSION['Rol']);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="../index.php" class="brand-link">
      	<img src="../complementos/images/<?php echo $log ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      	<span class="brand-text font-weight-light"><?php echo strtoupper($nom) ?></span>
    </a>
    <div class="sidebar">
<?php 
for($i=0;$i<count($user);$i++){
?>
      	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        	<div class="image">
          		<img src="../complementos/imagenes/usuarios/<?php echo $user[$i]['Fot'] ?>" class="img-circle elevation-2" alt="User">
        	</div>
    		<div class="info">
          		<a href="./panel.php?pag=perfil" class="d-block"><?php echo $user[$i]['Pnom'].' '.$user[$i]['Pape'] ?></a>
        	</div>
      	</div>
<?php
}
?>		    	
      	<div class="form-inline">
        	<div class="input-group" data-widget="sidebar-search">
          		<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          		<div class="input-group-append">
            		<button class="btn btn-sidebar">
              			<i class="fas fa-search fa-fw"></i>
            		</button>
          		</div>
    		</div>
      	</div>
		<nav class="mt-2">
        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
<?php 
for($j=0;$j<count($datos_menu);$j++){
?>
				<li class="nav-item">
            		<a href="#" class="nav-link">
            			<i class="nav-icon <?php echo $datos_menu[$j]['Ico'] ?>"></i>
              			<p>
                			<?php echo $datos_menu[$j]['Des']; ?>
                			<i class="right fas fa-angle-left"></i>
              			</p>
            		</a>
            		<ul class="nav nav-treeview">
<?php 
$datos_submenu = $clase->menu_secundario($_SESSION['Rol'], $datos_menu[$j]['Id']);

for($k=0;$k<count($datos_submenu);$k++){
?>
						<li class="nav-item">
                			<a href="./panel.php?pag=<?php echo $datos_submenu[$k]['Url'] ?>" class="nav-link">
                  				<i class="far fa-circle nav-icon"></i>
                  				<p><?php echo $datos_submenu[$k]['Des'] ?></p>
                			</a>
              			</li>
<?php
}
?>
            		</ul>
          		</li>
<?php
}
?>
        	</ul>
      	</nav>
    </div>
</aside>

<div class="content-wrapper">