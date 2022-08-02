<div class="modal fade" id="modaldetalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">DETALLES PEDIDO</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-4">
						<label>CLIENTE:</label>
						<input type="text" id="txtcliente" name="txtcliente" class="form-control" readonly="">
        			</div>
        			<div class="col-md-4">
						<label>CELULAR:</label>
						<input type="text" id="txtcelular" name="txtcelular" class="form-control" readonly="">
        			</div>
        			<div class="col-md-4">
						<label>IDENTIFICACION:</label>
						<input type="text" id="txtidentificacion" name="txtidentificacion" class="form-control" readonly="">
        			</div>

        			<div class="col-md-4">
						<label>VEHICULO:</label>
						<input type="text" id="txtvehiculo" name="txtvehiculo" class="form-control" readonly="">
        			</div>

        			<div class="col-md-8">
						<label>DIRECCION:</label>
						<input type="text" id="txtdireccion" name="txtdireccion" class="form-control" readonly="">
        			</div>

        			<div class="col-md-4">
        				<label>FECHA Y HORA DE SOLICITUD:</label>
						<input type="text" id="txtfecsol" name="txtfecsol" class="form-control" readonly="">
        			</div>

        			<div class="col-md-4">
        				<label>FECHA Y HORA DE ENTREGA:</label>
						<input type="text" id="txtfecent" name="txtfecent" class="form-control" readonly="">
        			</div>

        			<div class="col-md-4">
        				<label>FECHA Y HORA MAXIMA:</label>
						<input type="text" id="txtfecmax" name="txtfecmax" class="form-control" readonly="">
        			</div>

					<div class="col-md-12">
						<label>COMENTARIO:</label>
						<textarea id="txtcomentario" name="txtcomentario" class="form-control" readonly=""></textarea>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalcancelado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
        				<form id="frmdatos">
	        				<input type="hidden" id="txtid" name="txtid">

	        				<label>Que desea hacer con el pedido?</label>
							<select class="form-control" id="selectaccion" onchange="habilitarcampos(this.value)">
								<option value="0">-- Seleccionar --</option>
								<option value="1">Renovar</option>
								<option value="2">Cancelar</option>
							</select>

							<div id="inputsren">
		        				<label>FECHA:</label>
								<input type="date" id="txtfecren" name="txtfecren" class="form-control">
								<label>HORA:</label>
								<input type="time" id="txthorren" name="txthorren" class="form-control">
							</div>
	        			</form>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        		<button type"button" class="btn btn btn-secondary" id="btnguardar">Guardar</button>
			</div>
		</div>
	</div>
</div>