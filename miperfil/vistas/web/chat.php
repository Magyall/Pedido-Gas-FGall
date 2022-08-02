<script src="./js/chat.js"></script>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1>Chats</h1>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">

			<div class="col-3">
<?php
				if(isset($_SESSION['ChatRec'])){
?>
					<input type="hidden" name="txtsesionrecepcionista" id="txtsesionrecepcionista" value="<?php echo $_SESSION['ChatRec'] ?>">
<?php
				}else{
?>
					<input type="hidden" id="txtsesionrecepcionista" name="txtsesionrecepcionista" value="0">
<?php
				}
?>
				<!--
				<button class="btn btn-secondary form-control" onclick="cerrarchat(-1, 0)">CERRAR CHAT</button>
				-->
				<div class="card" style="height: 410px; overflow-y: scroll;" id="div_chats">
				</div>
			</div>
			<div class="col-9">
				<div class="card" style="height: 480px;">
					<div class="card-body" id="div_mensajes" style="height: 390px; overflow-y: scroll;">
						
					</div>
					<div class="card-body" id="div_accionchat" style="height: 60px;">
<?php
if(isset($_SESSION['ChatRec'])){
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
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
