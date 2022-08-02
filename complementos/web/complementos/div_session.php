<?php
    session_start();

    if(isset($_SESSION['chat'])){
?>
        <input type="hidden" name="session" id="session" value="1">
<?php
    }else{
?>
        <input type="hidden" name="session" id="session" value="0">
<?php
    }
?>