<div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">FOTO</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12" align="center">
        				<div id="upload-input" style="width:275px; height: 300px;"></div>
    				</div>
        			<div class="col-md-12" align="center">
        				<form method="post" id="frmaddempresa">
							<input type="text" name="txtiduser" id="txtiduser" hidden="">
							<input type="text" name="txtdnifile" id="txtdnifile" hidden="">
							<input type="text" name="txtnamefile" id="txtnamefile" hidden="">
							<input type="text" name="txtfotouser" id="txtfotouser" hidden="">
	        				<label>Seleccionar imagen</label><br>
				            <input type="file" id="upload"><br>
				            <hr>
			            </form>
	  				</div>
	  				<div class="col-md-12" id="div_mensaje"></div>
	  				<div class="col-md-6" align="center">
	  					<button class="btn btn btn-secondary upload-result">Agregar</button>
	  				</div>
	  				<div class="col-md-6" align="center">
	  					<button class="btn btn-dark" data-dismiss="modal">Cerrar</button>
	  				</div>
				</div>
			</div>
		</div>
	</div>
</div>