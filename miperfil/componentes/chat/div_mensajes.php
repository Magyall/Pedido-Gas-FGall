<?php
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/chat_modelo.php');

$clase = new Chat;

if(isset($_SESSION['ChatRec'])){
 	$mensajes = $clase->mensajes($_SESSION['ChatRec']);
    for($i=0;$i<count($mensajes);$i++){
        if($mensajes[$i]['Usuid'] != NULL || $mensajes[$i]['Usuid'] != ""){
?>
            <table width="100%" border="0">
                <tr>
                    <td width="25%">
                        
                    </td>
                    <td align="right" width="75%">
                        <div style="width: 100%; height: 100%; color: black; background-color: #DCDCDC; border-radius: 10px; padding-left: 7px; padding-right: 7px;">
                            <strong>
                                <?php echo $mensajes[$i]['Men'] ?>
                            </strong>
                        </div>
                    </td>
                </tr>
            </table>
<?php
        }else{
?>
            <table width="100%" border="0">
                <tr>
                    <td align="left" width="75%">
                        <div style="width: 100%; height: 100%; color: black; background-color: #A9A9A9; border-radius: 10px; padding-left: 7px; padding-right: 7px;">
                            <strong>
                                <?php echo $mensajes[$i]['Men'] ?>
                            </strong>
                        </div>
                    </td>
                    <td width="25%">
                    </td>
                </tr>
            </table>
<?php
        }
    }

}else{
	if(isset($_GET['par']))
	{
		if($_GET['par'] == 1){
			$chats = $clase->chats2($_GET['id']);

			for($i=0;$i<count($chats);$i++){
		?>
				<center>
					<h5><?php echo $chats[$i]['Emi'] ?></h5>
					<label><?php echo $chats[$i]['Num'] ?></label><br>
					<label><?php echo $chats[$i]['Ema'] ?></label>
					<hr>
					<button class="btn btn-success" id="btnactivar" onclick="activar(1, <?php echo $_GET['rec'] ?>, <?php echo $_GET['id'] ?>)">Activar chat</button>
				</center>
		<?php
			}
		}
	}
}
?>