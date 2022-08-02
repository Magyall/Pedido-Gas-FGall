<?php
    session_start();

    require_once('../../../config/conexion.php');
    require_once('../../../modelo/chat_modelo.php');

    $clase = new Chat;

    if(isset($_SESSION['chat'])){

        $mensajes = $clase->mensajes($_SESSION['chat']);
                for($i=0;$i<count($mensajes);$i++){
                    if($mensajes[$i]['Usuid'] != NULL || $mensajes[$i]['Usuid'] != ""){
?>
                        <table width="100%" border="0">
                            <tr>
                                <td align="left" width="75%">
                                    <div style="width: 100%; height: 100%; color: white background-color: #DCDCDC; border-radius: 10px; padding-left: 7px; padding-right: 7px;">
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
                    }else{
?>
                        <table width="100%" border="0">
                            <tr>
                                <td width="25%">
                                    
                                </td>
                                <td align="right" width="75%">
                                    <div style="width: 100%; height: 100%; color: white; background-color: #A9A9A9; border-radius: 10px; padding-left: 7px; padding-right: 7px;">
                                        <strong>
                                            <?php echo $mensajes[$i]['Men'] ?>
                                        </strong>
                                    </div>
                                </td>
                            </tr>
                        </table>
<?php
                    }
                }
    }else{
?>
        <div class="info-chat">
            <label>Gracias por contactárnos, al iniciar el chat un usuario de nuestra empresa se pondra en contacto con usted. </label>
        </div>
        <div class="form-chat">
            <p class="form-message"></p>
            <form id="frm_chat" class="form_contact">
                <input type="hidden" name="parametro" id="parametro" value="1">
                <input class="form-control" type="text" name="txtusuario" id="txtusuario" placeholder="Nombre Usuario">
                <input class="form-control" type="text" name="txtemail" id="txtemail" placeholder="E-mail">
                <input class="form-control" type="text" name="txtcelular" id="txtcelular" placeholder="Celular">
            </form>
        </div>
<?php
    }
?>