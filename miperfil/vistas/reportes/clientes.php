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
					<input type="hidden" id="txtparametro" name="txtparametro" value="2">

					<div class="col-5">
					</div>
					<div class="col-2">
						<button class="form-control btn btn-secondary" id="btnexportar" name="btnexportar" onclick="exportar_pedidos(2, $('#txtfecini').val(), $('#txtfecfin').val())">
							EXPORTAR
						</button>
					</div>
					<div class="col-5">
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
