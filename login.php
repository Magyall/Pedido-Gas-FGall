<?php 
session_start();

if (isset($_SESSION['Rol'])) {
    echo '<script>window.location = "./miperfil/panel.php";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>PEDIDOS GAS</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="./complementos/images/logo.png"/>
		<link rel="stylesheet" type="text/css" href="./complementos/panel/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="./complementos/panel/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="./complementos/panel/vendor/animate/animate.css">	
		<link rel="stylesheet" type="text/css" href="./complementos/panel/vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="./complementos/panel/vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="./complementos/panel/css/util.css">
		<link rel="stylesheet" type="text/css" href="./complementos/panel/css/main.css">
		<link rel="stylesheet" type="text/css" href="./complementos/plugins/alertifyjs/css/alertify.css">
		<link rel="stylesheet" type="text/css" href="./complementos/plugins/alertifyjs/css/themes/default.css">
	</head>
	<body>
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<br><br><br>
						<center>
							<img src="./complementos/images/logo.png" alt="IMG" width="250px">
						</center>
					</div>
					<div class="login100-form validate-form">
						<span class="login100-form-title">
							PEDIDOS GAS
						</span>
						<form id="frm_datos">
							<input type="text" name="parametro" id="parametro" value="1" hidden="">
							<input type="text" name="txtver" id="txtver" value="<?php echo $_GET['ver'] ?>" hidden="">
							<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
								<input class="input100" type="text" name="txtemail" id="txtemail" placeholder="Email">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-envelope" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="txtpass" id="txtpass" placeholder="Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
						</form>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" id="btnlogin" name="btnlogin">
								INICIAR SESION
							</button>
						</div>

						<div class="text-center p-t-12">
							<span class="txt1">
								OLVIDO
							</span>
							<a class="txt2" data-toggle="modal" data-target="#modalrecuperar" href="#">
								Su Usuario / Contraseña?
							</a>
						</div>
						<div class="text-center p-t-136">
							<a class="txt2" data-toggle="modal" data-target="#modalregistrarse" href="#">
								Registrarse
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					<div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modalrecuperar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
						<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
						<script src="./js/test.js"></script>
						<h4 class="modal-title" id="myModalLabel">RECUPERAR CONTRASEÑA</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
		        		<div class="row">
		        			<div class="col-md-12">
		        				<form method="post" id="frmrecuperar">
			        				<input type="text" name="parametro" id="parametro" value="2" hidden="">
									<label>EMAIL:</label>
									<input type="text" id="txtemail" name="txtemail" class="form-control">
									<hr>
									<label style="color: red">
										Se enviara un correo electronico para continuar con el proceso de recuperar el password.
									</label>
									<center>
										<img src="./complementos/images/loading.gif" width="75px" id="imgloading" name="imgloading">
									</center>
								</form>
		        			</div>
						</div>
					</div>
					<div class="modal-footer">
		        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
						<button type"button" class="btn btn btn-secondary" id="btnenviar">Enviar</button>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modalregistrarse" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css">
						<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.js"></script>
						<script src="./js/test.js"></script>
						<h4 class="modal-title" id="myModalLabel">REGISTRARSE</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
		        		<div class="row">
		        			<div class="col-md-12">
		        				<form method="post" id="frmregistrarse">
			        				<input type="text" name="parametro" id="parametro" value="4" hidden="">
			        				<label>CEDULA:</label>
									<input type="text" oninput="this.value = this.value.replace(/[^0-9]/,'')" id="txtcedula" name="txtcedula" class="form-control" maxlength="13">
									<label>NOMBRE:</label>
									<input type="text" oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" id="txtnombre" name="txtnombre" class="form-control">
									<label>APELLIDO:</label>
									<input type="text" oninput="this.value = this.value.replace(/[^a-zA-Z]/,'')" id="txtapellido" name="txtapellido" class="form-control">
									<label>EMAIL:</label>
									<input type="text" id="txtemail" name="txtemail" class="form-control">
									<label>DIRECCION:</label>
									<input type="text" id="txtdireccion" name="txtdireccion" class="form-control">
									<label>TELEFONO:</label>
									<input type="text" id="txttelefono" oninput="this.value = this.value.replace(/[^0-9]/,'')" name="txttelefono" maxlenght="10" class="form-control">
									<label>PASSWORD:</label>
									<input type="password" id="txtpassword" name="txtpassword" class="form-control">
									<label>CONFIRMAR PASSWORD:</label>
									<input type="password" id="txtconfpassword" name="txtconfpassword" class="form-control">
								</form>
		        			</div>
						</div>
					</div>
					<div class="modal-footer">
		        		<button type"button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
						<button type"button" class="btn btn btn-secondary" id="btnregistrarse">Registrarse</button>
					</div>
				</div>
			</div>
		</div>

		<script src="./complementos/panel/vendor/jquery/jquery-3.2.1.min.js"></script>
		<script src="./complementos/panel/vendor/bootstrap/js/popper.js"></script>
		<script src="./complementos/panel/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="./complementos/panel/vendor/select2/select2.min.js"></script>
		<script src="./complementos/panel/vendor/tilt/tilt.jquery.min.js"></script>
		<script >
			$('.js-tilt').tilt({
				scale: 1.1
			})
		</script>
		<script src="./complementos/js/main.js"></script>
		<script src="./complementos/plugins/alertifyjs/alertify.js"></script>
		<script src="./js/login.js"></script>
		<script src="./js/validaciones.js"></script>
	</body>
</html>