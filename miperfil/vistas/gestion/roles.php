<?php
include('./componentes/modals/modal_roles.php');
?>
<script src="./js/roles.js"></script>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Roles</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<button class="btn btn-secondary" data-toggle="modal" data-target="#modalagregar">
						AGREGAR ROL
					</button>
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
