<a class="buttom-btn">
    <img src="./complementos/images/mensajeria.png" style="width: 80px">
</a>

<div class="contact-form-page" id="contact-form-page">
    <div class="header-chat">
        <label class="title">CHATEA CON NOSOTROS </label>
        <i title="Minimizar"  class="fa fa-minus top-btn opc"></i>
    </div>

    <div id="divsessionvalidacion">
        <input type="hidden" name="session" id="session" value="<?php if(isset($_SESSION['chat'])){ echo 1; }else{ echo 0; } ?>">
    </div>
    
<?php
    if(isset($_SESSION['chat'])){
?>
        <div style=" height: 210px; overflow-y: scroll; width: 100%">
            <div class="container" id="div_chat">
                
            </div>
        </div>
<?php
    }else{
?>
        <div class="container-fluid" style=" height: 210px; overflow-y: scroll; width: 100%">
            <div id="div_chat">
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
            </div>
        </div>
<?php
    }

    if(isset($_SESSION['chat'])){
?>
        <div class="container-fluid" id="div_botones">
            <div class="input-group">
                <input class="form-control" type="text" name="txtmensaje" id="txtmensaje">
                <button class="btn btn-outline-success" onclick="enviar_mensaje(3, <?php echo $_SESSION['chat'] ?>, 'N')">
                    <i class="nav-icon fa fa-send"></i>
                </button>
            </div>
            <button class="form-control btn btn-outline-danger" onclick="cerrar_chat(2)">
                <i class="nav-icon fa fa-close"> Salir del chat</i>
            </button>    
        </div>
<?php
    }else{
?>
        <div class="container-fluid" id="div_botones">
            <hr>
            <button class="form-control btn btn-outline-secondary" type="button"  id="btn-register" onclick="iniciar_chat()">Enviar Mensaje</button>
        </div>
<?php
    }
?>
</div>