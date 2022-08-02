<?php  
session_start();

session_destroy();

if(isset($_GET["opc"])){
	switch ($_GET["opc"]) {
		case 1:
			echo "<script>alert('La sesion caduco.');</script>";
			echo "<script>window.location = 'index.php';</script>";
		break;

		case 2:
			echo "<script>alert('Se cerró la sesión');</script>";
			echo "<script>window.location = 'index.php';</script>";
		break;

		case 3:
			echo "<script>alert('Se cerró la sesión');</script>";
			echo "<script>window.location = 'loginrepartidor.php';</script>";
		break;
	}
}else{
	echo "<script>alert('Se cerró la sesión');</script>";
	echo "<script>window.location = 'index.php';</script>";
}
?>