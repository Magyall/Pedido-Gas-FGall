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
	        				<input type="text" name="parametro" id="parametro" value="1" hidden="">
	        				<input type="text" name="txtidu" id="txtidu" hidden="">
							<label>NOMBRE:</label>
							<input type="text" id="txtnombreu" name="txtnombreu" class="form-control">
							<label>DESCRIPCION:</label>
							<textarea class="form-control" id="txtdescripcionu" name="txtdescripcionu"></textarea>
							<label>HISTORIA:</label>
							<textarea class="form-control" id="txthistoriau" name="txthistoriau"></textarea>
							<label>MISION:</label>
							<textarea class="form-control" id="txtmisionu" name="txtmisionu"></textarea>
							<label>VISION:</label>
							<textarea class="form-control" id="txtvisionu" name="txtvisionu"></textarea>
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

<div class="modal fade" id="modallogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">LOGO</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12">
        				<form method="post" id="frmlogo">
        					<input type="text" name="parametro" id="parametro" value="2" hidden="">
        					<input type="text" name="txtidl" id="txtidl" hidden="">
        					<input type="text" name="txtnombrel" id="txtnombrel" hidden="">
							<label>IMAGEN:</label>
							<input type="file" id="filelogo" name="filelogo" class="form-control">
						</form>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
				<button type"button" class="btn btn btn-secondary" id="btnsavelogo">Actualizar</button>
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
				<h4 class="modal-title" id="myModalLabel">IMAGEN</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12">
        				<form method="post" id="frmimagen">
        					<input type="text" name="parametro" id="parametro" value="3" hidden="">
        					<input type="text" name="txtidi" id="txtidi">
        					<input type="text" name="txtnombrei" id="txtnombrei" hidden="">
							<label>IMAGEN:</label>
							<label>Subir la imagen del slider, en un tamaño de: 1920 x 800 pixeles.</label>
							<input type="file" id="fileimagei" name="fileimagei" class="form-control">
						</form>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
				<button type"button" class="btn btn btn-secondary" id="btnsaveimage">Actualizar</button>
			</div>
		</div>
	</div>
</div>
