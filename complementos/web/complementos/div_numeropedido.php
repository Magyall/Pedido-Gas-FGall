<?php
session_start();

require_once('../../../config/conexion.php');
require_once('../../../modelo/pedido_modelo.php');

$clase = new Pedido;

$numero = $clase->MostrarNumero();

for($i=0;$i<count($numero);$i++){
	$num = $numero[$i]['Num']+1;
	$numpedido = 'NUM-'.str_pad(($num), 4, "0", STR_PAD_LEFT);
?>
	<input class="form-control" id="txtnumero" name="txtnumero" type="text" value="<?php echo $numpedido ?>" readonly="">
<?php
}
?>