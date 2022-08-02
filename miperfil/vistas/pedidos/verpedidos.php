<?php
include('./componentes/modals/modal_verpedidos.php');
?>

<script src="./js/pedidos.js"></script>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Pedidos</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<a href="../pedidopersonalizado.php" target="_blank">
						<button class="btn btn btn-secondary">
							CREAR PEDIDO PERSONALIZADO
						</button>
					</a>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body" id="div_tabla">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
