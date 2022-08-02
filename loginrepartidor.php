<?php 
session_start();

if (isset($_SESSION['Rol'])) {
    echo '<script>window.location = "./app/pedidorepartidor.php";</script>';
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
							<input type="text" name="txtver" id="txtver" value="3" hidden="">
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
						<!--
						<div class="text-center p-t-12">
							<span class="txt1">
								OLVIDO
							</span>
							<a class="txt2" href="#">
								Su Usuario / Contraseña?
							</a>
						</div>
						-->
						<div class="text-center p-t-136">
							<!--
							<a class="txt2" href="#">
								Create your Account
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
							-->
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
	</body>
</html>