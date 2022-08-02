<?php
session_start();

require_once('../../../config/conexion.php');
require_once('../../../modelo/pedido_modelo.php');

$clase = new Pedido;

if(isset($_SESSION['UserPedido'])){

    $usuario = $clase->Cargar_Usuario($_SESSION['UserPedido']);

    for($i=0;$i<count($usuario);$i++){
?>
		<div class="col-lg-4 form-group">
			<div class="row">
				<div class="col-lg-3" style="align-self: center;">
					<h6>Identificación:</h6>
				</div>
				<div class="col-lg-9" style="align-self: center;">
					<input class="form-control" type="text" id="txtdni" name="txtdni" value="<?php echo $usuario[$i]['Dni'] ?>" onblur="verificar_cliente(2, this.value)">
				</div>
			</div>
		</div>

		<div class="col-lg-4 form-group">
			<div class="row">
				<div class="col-lg-3" style="align-self: center;">
					<h6>Email:</h6>
				</div>
				<div class="col-lg-9" style="align-self: center;">
					<input class="form-control" type="text" id="txtemail" name="txtemail" value="<?php echo $usuario[$i]['Mail'] ?>" readonly="">
				</div>
			</div>
		</div>

		<div class="col-lg-4 form-group">
			<div class="row">
				<div class="col-lg-3" style="align-self: center;">
					<h6>Celular:</h6>
				</div>
				<div class="col-lg-9" style="align-self: center;">
					<input class="form-control" type="text" id="txtcel" name="txtcel" value="<?php echo $usuario[$i]['Cel'] ?>" readonly="">
				</div>
			</div>
		</div>

		<div class="col-lg-6 form-group">
			<div class="row">
				<div class="col-lg-3" style="align-self: center;">
					<h6>Primer Nombre:</h6>
				</div>
				<div class="col-lg-9" style="align-self: center;">
					<input class="form-control" type="text" id="txtpnom" name="txtpnom" value="<?php echo $usuario[$i]['Pnom'] ?>" readonly="">
				</div>
			</div>
		</div>

		<div class="col-lg-6 form-group">
			<div class="row">
				<div class="col-lg-3" style="align-self: center;">
					<h6>Segundo Nombre:</h6>
				</div>
				<div class="col-lg-9" style="align-self: center;">
					<input class="form-control" type="text" id="txtsnom" name="txtsnom" value="<?php echo $usuario[$i]['Snom'] ?>" readonly="">
				</div>
			</div>
		</div>

		<div class="col-lg-6 form-group">
			<div class="row">
				<div class="col-lg-3" style="align-self: center;">
					<h6>Primer Apellido:</h6>
				</div>
				<div class="col-lg-9" style="align-self: center;">
					<input class="form-control" type="text" id="txtpape" name="txtpape" value="<?php echo $usuario[$i]['Pape'] ?>" readonly="">
				</div>
			</div>
		</div>

		<div class="col-lg-6 form-group">
			<div class="row">
				<div class="col-lg-3" style="align-self: center;">
					<h6>Segundo Apellido:</h6>
				</div>
				<div class="col-lg-9" style="align-self: center;">
					<input class="form-control" type="text" id="txtsape" name="txtsape" value="<?php echo $usuario[$i]['Sape'] ?>" readonly="">
				</div>
			</div>
		</div>

		<div class="col-lg-12 form-group">
			<div class="row">
				<div class="col-lg-1" style="align-self: center;">
					<h6>Direccion:</h6>
				</div>
				<div class="col-lg-11" style="align-self: center;">
					<input class="form-control" type="text" id="txtdir" name="txtdir" value="<?php echo $usuario[$i]['Dir'] ?>" readonly="">
				</div>
			</div>
		</div>
<?php
    }
}                   
?>