<?php  
	class Conectar{
		public static function conexion(){
			include ('db.php');
			$con=mysqli_connect($server, $username, $password, $db);
			if (!$con->set_charset("utf8")) {
 		   	//printf("Error cambiando el juego de caracteres utf8: %s\n", $con->error);
			} else {
	    		//printf("Juego de caracteres actual: %s\n", $con->character_set_name());
			}
			return $con;
		}		
	}
?>