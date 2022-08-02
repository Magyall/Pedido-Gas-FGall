<?php
session_start();
date_default_timezone_set("America/Bogota");

require_once('./config/conexion.php');
require_once('./modelo/login_modelo.php');

$clase = new Login;

if(isset($_GET['id'])){
	
}else{
	echo '<script>window.location = "./login.php?ver=1";</script>';
}

$recuperarpass = $clase->recuperar_pass($_GET['id']);

if ($recuperarpass[0]['Acor'] != 1) {
    echo '<script>window.location = "./login.php?ver=1";</script>';
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
							RECUPERA TU PASSWORD
						</span>
						<form id="frm_recovery">
							<input type="text" name="parametro" id="parametro" value="3" hidden="">
							<input type="text" name="txtid" id="txtid" value="<?php echo $_GET['id'] ?>" hidden="">
							<input type="text" name="txtemail" id="txtemail" value="<?php echo $recuperarpass[0]['Mail'] ?>" hidden="">
							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="txtpassnew" id="txtpassnew" placeholder="Nuevo Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100 validate-input" data-validate = "Password is required">
								<input class="input100" type="password" name="txtpassconfirm" id="txtpassconfirm" placeholder="Confirmar Password">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-lock" aria-hidden="true"></i>
								</span>
							</div>
						</form>
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" id="btnrecuperar" name="btnlogin">
								CAMBIAR CONTRASEÑA
							</button>
						</div>
					<div>
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