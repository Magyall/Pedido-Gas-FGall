<?php
session_start();

require_once('../../../config/conexion.php');
require_once('../../modelo/chat_modelo.php');

$clase = new Chat;

$chats = $clase->chats($_SESSION['User']);
$chats1 = $clase->chats1();

if(isset($_SESSION['ChatRec'])){
?>
	<button class="form-control btn btn-outline-danger" onclick="cerrarchat(4, <?php echo $_SESSION['ChatRec'] ?>)">
        <i class="nav-icon fa fa-close"> FINALIZAR CHAT</i>
    </button>    
    <hr>
<?php
}else{
?>
	<button class="form-control btn btn-outline-danger" disabled="">
        <i class="nav-icon fa fa-close"> FINALIZAR CHAT</i>
    </button>    
    <hr>
<?php
}

for($i=0;$i<count($chats);$i++){
?>
	<div class="card" style="background-color: #A9A9A9">
		<div class="card-body" onclick="activar(2, <?php echo $chats[$i]['Rec'] ?>, <?php echo $chats[$i]['Id'] ?>)">
			<center>
				<h5><?php echo $chats[$i]['Emi'] ?></h5>
				<label><?php echo $chats[$i]['Num'] ?></label>
				<label><?php echo $chats[$i]['Ema'] ?></label>
			</center>
		</div>
	</div>	
<?php
}

for($i=0;$i<count($chats1);$i++){
?>
	<div class="card" style="background-color: #DCDCDC">
		<div class="card-body" onclick="activarchat(1, <?php echo $_SESSION['User'] ?>, <?php echo $chats1[$i]['Id'] ?>)">
			<center>
				<h5><?php echo $chats1[$i]['Emi'] ?></h5>
				<label><?php echo $chats1[$i]['Num'] ?></label>
				<label><?php echo $chats1[$i]['Ema'] ?></label>
			</center>
		</div>
	</div>
<?php
}
?>