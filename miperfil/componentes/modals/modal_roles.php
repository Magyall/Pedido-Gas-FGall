<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">AGREGAR ROL</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12">
        				<form method="post" id="frmadddatos">
	        				<input type="text" name="parametro" id="parametro" value="1" hidden="">
							<label>DESCRIPCION:</label>
							<input type="text" id="txtdescripciona" name="txtdescripciona" class="form-control">
						</form>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
				<button type"button" class="btn btn btn-secondary" id="btnagregar">Agregar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalactualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">EDITAR ROL</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12">
        				<form method="post" id="frmupdatos">
	        				<input type="text" name="parametro" id="parametro" value="2" hidden="">
	        				<input type="text" name="txtid" id="txtid" hidden="">
							<label>DESCRIPCION:</label>
							<input type="text" id="txtdescripcionu" name="txtdescripcionu" class="form-control">
						</form>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
				<button type"button" class="btn btn btn-secondary" id="btnactualizar">Actualizar</button>
			</div>
		</div>
	</div>
</div>