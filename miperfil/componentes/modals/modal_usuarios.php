<div class="modal fade" id="modalagregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">AGREGAR USUARIO</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12">
        				<form method="post" id="frmadddatos">
        					<input type="text" name="parametro" id="parametro" value="1" hidden="">
        					<div class="row">
        						<div class="col-md-6">
									<label>CEDULA:</label>
									<input type="text" id="txtcedulaa" name="txtcedulaa" class="form-control">
									<label>PRIMER NOMBRE:</label>
									<input type="text" id="txtpnombrea" name="txtpnombrea" class="form-control">
									<label>PRIMER APELLIDO:</label>
									<input type="text" id="txtpapellidoa" name="txtpapellidoa" class="form-control">
									<label>DIRECCION:</label>
									<input type="text" id="txtdirecciona" name="txtdirecciona" class="form-control">
								</div>
								<div class="col-md-6">
			        				<label>CORREO ELECTRONICO:</label>
									<input type="text" id="txtemaila" name="txtemaila" class="form-control">
									<label>SEGUNDO NOMBRE:</label>
									<input type="text" id="txtsnombrea" name="txtsnombrea" class="form-control">
									<label>SEGUNDO APELLIDO:</label>
									<input type="text" id="txtsapellidoa" name="txtsapellidoa" class="form-control">
									<label>CELULAR:</label>
									<input type="text" id="txtcelulara" name="txtcelulara" class="form-control">
								</div>
							</div>
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
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">EDITAR USUARIO</h4>
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
        					<div class="row">
        						<div class="col-md-6">
									<label>CEDULA:</label>
									<input type="text" id="txtcedulau" name="txtcedulau" class="form-control">
									<label>PRIMER NOMBRE:</label>
									<input type="text" id="txtpnombreu" name="txtpnombreu" class="form-control">
									<label>PRIMER APELLIDO:</label>
									<input type="text" id="txtpapellidou" name="txtpapellidou" class="form-control">
									<label>DIRECCION:</label>
									<input type="text" id="txtdireccionu" name="txtdireccionu" class="form-control">
								</div>
								<div class="col-md-6">
			        				<label>CORREO ELECTRONICO:</label>
									<input type="text" id="txtemailu" name="txtemailu" class="form-control">
									<label>SEGUNDO NOMBRE:</label>
									<input type="text" id="txtsnombreu" name="txtsnombreu" class="form-control">
									<label>SEGUNDO APELLIDO:</label>
									<input type="text" id="txtsapellidou" name="txtsapellidou" class="form-control">
									<label>CELULAR:</label>
									<input type="text" id="txtcelularu" name="txtcelularu" class="form-control">
								</div>
							</div>
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

<div class="modal fade" id="modalpassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
				<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
				<script src="./js/test.js"></script>
				<h4 class="modal-title" id="myModalLabel">CAMBIO DE CONTRASEÑA</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
        		<div class="row">
        			<div class="col-md-12">
        				<form method="post" id="frmuppassword">
        					<input type="text" name="parametro" id="parametro" value="6" hidden="">
        					<input type="text" name="txtidc" id="txtidc" hidden="">
        					<input type="text" name="txtemailc" id="txtemailc" hidden="">
        					<label>NUEVA CONTRASEÑA:</label>
							<input type="password" id="txtpassword1" name="txtpassword1" class="form-control">
							<label>CONFIRMAR CONTRASEÑA:</label>
							<input type="password" id="txtpassword2" name="txtpassword2" class="form-control">
						</form>
        			</div>
				</div>
			</div>
			<div class="modal-footer">
        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
				<button type"button" class="btn btn btn-secondary" id="btnpassword">Cambiar</button>
			</div>
		</div>
	</div>
</div>