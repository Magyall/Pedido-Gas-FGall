<?php
require('../../complementos/plugins/fpdf/fpdf.php');
require_once('../../config/conexion.php');
require_once('../modelo/reportes_modelo.php');

$fecini = $_GET['fecini'];
$fecfin = $_GET['fecfin'];

$usr_ide = "";
$usr_nom = "";
$usr_ape = "";
$usr_ema = "";
$usr_dir = "";
$usr_cel = "";
$rep_ide = "";
$rep_nom = "";
$rep_ape = "";
$rep_ema = "";
$rep_dir = "";
$rep_cel = "";
$modveh = "";
$plaveh = "";

$clase = new Procesos;

$datos_consulta = $clase->Listarpedidos($fecini, $fecfin);

$pdf=new FPDF();
$pdf->AddPage("L");


$pdf-> Image("../../complementos/images/logo.png",10,10,15,15);

$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(205, 92, 92);
$pdf->Cell(0,15,'REPORTE DE PEDIDOS',0,0,'C');
$pdf->Ln(20);

$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(23, 32, 42);
$pdf->Cell(185,10,'Lista de pedidos desde: '.$fecini.' hasta: '.$fecfin,0,0,'L');
$pdf->Ln(15);

$pdf->SetFillColor(233, 150, 122);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(39.5,12,'FECHA CREACION',1,0,'C',1);
$pdf->Cell(39.5,12,'CANTIDAD',1,0,'C',1);
$pdf->Cell(39.5,12,'USUARIO',1,0,'C',1);
$pdf->Cell(39.5,12,'REPARTIDOR',1,0,'C',1);
$pdf->Cell(39.5,12,'FECHA ENTREGA',1,0,'C',1);
$pdf->Cell(39.5,12,'ESTADO',1,0,'C',1);
$pdf->Cell(39.5,12,'VEHICULO',1,0,'C',1);
$pdf->Ln(12);

for($i=0;$i<count($datos_consulta);$i++){
    $usuario = $clase->Listarusuario($datos_consulta[$i]['ped_idusu']);
    $repartidor = $clase->Listarusuario($datos_consulta[$i]['ped_idrep']);
    $vehiculo = $clase->Listarvehiculo($datos_consulta[$i]['ped_idrep']);

    for($j=0;$j<count($usuario);$j++){
        $usr_ide = $usuario[$j]['usr_ide'];
        $usr_nom = $usuario[$j]['usr_nom'];
        $usr_ape = $usuario[$j]['usr_ape'];
        $usr_ema = $usuario[$j]['usr_ema'];
        $usr_dir = $usuario[$j]['usr_dir'];
        $usr_cel = $usuario[$j]['usr_cel'];
    }

    for($j=0;$j<count($repartidor);$j++){
        $rep_ide = $repartidor[$j]['usr_ide'];
        $rep_nom = $repartidor[$j]['usr_nom'];
        $rep_ape = $repartidor[$j]['usr_ape'];
        $rep_ema = $repartidor[$j]['usr_ema'];
        $rep_dir = $repartidor[$j]['usr_dir'];
        $rep_cel = $repartidor[$j]['usr_cel'];
    }

    for($j=0;$j<count($vehiculo);$j++){
        $modveh = $vehiculo[$j]['vhc_mod'];
        $plaveh = $vehiculo[$j]['vhc_pla'];
    }

    if($i%2==0){
        $pdf->SetFillColor(255, 255, 255);
    }else{
        $pdf->SetFillColor(255, 248, 220);
    }
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['ped_fecing'].' - '.$datos_consulta[$i]['ped_horing']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['ped_can']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($usr_nom.' '.$usr_ape),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($rep_nom.' '.$rep_ape),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['ped_fecent'].' - '.$datos_consulta[$i]['ped_horent']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['ped_est']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($modveh.' - '.$plaveh),1,0,'C',1);
    $pdf->Ln(8);
}

//$pdf->Output('I','entradamateriaPrima.pdf');
$pdf->Output('D','Reporte de pedidos.pdf');
?>