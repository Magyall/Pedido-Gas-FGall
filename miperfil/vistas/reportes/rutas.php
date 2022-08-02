<script src="./js/reportes.js"></script>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Reportes de Pedidos</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="row">
					<input type="hidden" id="txtparametro" name="txtparametro" value="3">

					<div class="col-3">
						<input class="form-control" type="date" id="txtfecini" name="txtfecini" value="<?php echo date('Y-m-d') ?>">
					</div>
					<div class="col-3">
						<input class="form-control" type="date" id="txtfecfin" name="txtfecfin" value="<?php echo date('Y-m-d') ?>">
					</div>
					<div class="col-2">
						<button class="form-control btn btn-secondary" id="btnfiltrar" name="btnfiltrar" onclick="filtro_pedidos(3, 2)">
							FILTRAR
						</button>
					</div>
				</div>
				<hr>

				<div class="card">
					<div class="card-body" id="div_tabla">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
