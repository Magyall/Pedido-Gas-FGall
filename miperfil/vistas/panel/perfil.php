<?php
include('./componentes/modals/modal_perfil.php');
?>
<script src="./js/perfil.js"></script>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>PERFIL</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<button class="btn btn-secondary" onclick="actualizarpagina()">
						ACTUALIZAR PAGINA
					</button>
				<!--
					<li class="breadcrumb-item"><a href="#">Inicio</a></li>
					<li class="breadcrumb-item active">PERFIL</li>
				-->
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="row" id="div_perfil">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>