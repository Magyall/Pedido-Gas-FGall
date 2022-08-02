<?php
require_once('../config/conexion.php');
require_once('./modelo/menu_modelo.php');
require_once('../modelo/web_modelo.php');

$clase = new Menu;
$clase1 = new Web;

session_start();
date_default_timezone_set("America/Bogota");

$compania = $clase1->datos_compania();

for($i=0;$i<count($compania);$i++){
    $id = $compania[$i]['Id'];
    $nom = $compania[$i]['Nom'];
    $des = $compania[$i]['Des'];
    $log = $compania[$i]['Log'];
    $img = $compania[$i]['Img'];
    $est = $compania[$i]['Est'];
}

if(isset($_SESSION['Rol'])){
    $pagina = 'inicio.php';
    $carpeta = '';
    if (isset($_GET['pag'])) {
        $pagina = $_GET['pag'] . '.php';
    }

    $url = explode('.', $pagina);

    $carpeta_menu = $clase->menu_carpeta($url[0]);

    for($i=0;$i<count($carpeta_menu);$i++){
        $carpeta = $carpeta_menu[$i]['Url'].'/';
    }

    include ('vistas/cabecera.php');
    include ('vistas/menu.php');
    include ('vistas/' . $carpeta. '' .$pagina);
    include ('vistas/pie.php');
}else{
    header('Location: ../index.php');
}
?>