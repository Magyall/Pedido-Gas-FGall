<?php
session_start();

if(isset($_SESSION['ChatRec']))
{
?>
	<div class="container-fluid">
        <div class="input-group">
            <input class="form-control" type="text" name="txtmensaje" id="txtmensaje">
            <button class="btn btn-outline-success" onclick="enviarmensajes(3, <?php echo $_SESSION['ChatRec'] ?>, 'N', <?php echo $_SESSION['User'] ?>)">
                ENVIAR
            </button>
        </div>
    </div>
<?php
}
?>		