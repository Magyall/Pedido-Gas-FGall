<?php
    session_start();

    if(isset($_SESSION['chat'])){
?>
        <div class="container-fluid" id="div_botones">
            <div class="input-group">
                <input class="form-control" type="text" name="txtmensaje" id="txtmensaje">
                <button class="btn btn-outline-success" onclick="enviar_mensaje(3, <?php echo $_SESSION['chat'] ?>, 'N')">
                    <i class="nav-icon fa fa-send"></i>
                </button>
            </div>
            <button class="form-control btn btn-outline-danger" onclick="cerrar_chat(2, <?php echo $_SESSION['chat'] ?>)">
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