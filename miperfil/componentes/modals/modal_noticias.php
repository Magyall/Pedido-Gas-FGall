<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">AGREGAR NOTICIA</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12">
        				<form method="post" id="frmadddatos">
	        				<input type="text" name="parametro" id="parametro" value="1" hidden="">
							<label>TITULO:</label>
							<input type="text" id="txttituloa" name="txttituloa" class="form-control">
							<label>URL:</label>
							<input type="text" id="txturla" name="txturla" class="form-control">
							<label>DESCRIPCION:</label>
							<textarea id="txtdescripciona" name="txtdescripciona" class="form-control"></textarea>
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
				<h4 class="modal-title" id="myModalLabel">EDITAR NOTICIA</h4>
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
							<label>TITULO:</label>
							<input type="text" id="txttitulou" name="txttitulou" class="form-control">
							<label>URL:</label>
							<input type="text" id="txturlu" name="txturlu" class="form-control">
							<label>DESCRIPCION:</label>
							<textarea id="txtdescripcionu" name="txtdescripcionu" class="form-control"></textarea>
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

<div class="modal fade" id="modalimagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">IMAGEN NOTICIA</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12" id="mod_imagen">
        				<form method="post" id="frmimagen" enctype="multipart/form-data">
	        				<input type="text" name="parametro" id="parametro" value="6" hidden="">
							<input type="text" name="txtidi" id="txtidi" hidden="">
							<input type="text" name="txttituloi" id="txttituloi" hidden="">
							<input type="file" name="fileimagen" id="fileimagen">
						</form>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
				<button type"button" class="btn btn btn-secondary" id="btnimagen">Actualizar</button>
			</div>
		</div>
	</div>
</div>