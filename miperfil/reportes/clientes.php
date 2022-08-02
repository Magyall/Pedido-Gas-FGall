<?php
require('../../complementos/plugins/fpdf/fpdf.php');
require_once('../../config/conexion.php');
require_once('../modelo/reportes_modelo.php');

$clase = new Procesos;

$datos_consulta = $clase->Listarclientes();

$pdf=new FPDF();
$pdf->AddPage("L");


$pdf-> Image("../../complementos/images/logo.png",10,10,15,15);

$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(205, 92, 92);
$pdf->Cell(0,15,'REPORTE DE CLIENTES',0,0,'C');
$pdf->Ln(20);

$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(23, 32, 42);
$pdf->Cell(185,10,'Lista del total de clientes registrados.',0,0,'L');
$pdf->Ln(15);

$pdf->SetFillColor(233, 150, 122);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(39.5,12,'DNI',1,0,'C',1);
$pdf->Cell(39.5,12,'USUARIO',1,0,'C',1);
$pdf->Cell(39.5,12,'EMAIL',1,0,'C',1);
$pdf->Cell(39.5,12,'CELULAR',1,0,'C',1);
$pdf->Cell(39.5,12,'F. NACIMIENTO',1,0,'C',1);
$pdf->Cell(39.5,12,'F. REGISTRO',1,0,'C',1);
$pdf->Cell(39.5,12,'ROL',1,0,'C',1);
$pdf->Cell(39.5,12,'ESTADO',1,0,'C',1);
$pdf->Ln(12);

for($i=0;$i<count($datos_consulta);$i++){
    $detselect = $clase->ListarRolxid($datos_consulta[$i]['Idrol']);
    $estado = $clase->Estado($datos_consulta[$i]['Est']);

    if($i%2==0){
        $pdf->SetFillColor(255, 255, 255);
    }else{
        $pdf->SetFillColor(255, 248, 220);
    }
    $pdf->SetFont('Arial','B',10);

    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['Dni']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['Pnom'].' - '.$datos_consulta[$i]['Snom'].' - '.$datos_consulta[$i]['Pape'].' - '.$datos_consulta[$i]['Sape']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['Ema']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['Cel']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['Nac']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($datos_consulta[$i]['Reg']),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($detselect),1,0,'C',1);
    $pdf->Cell(39.5,8,utf8_decode($estado),1,0,'C',1);
    $pdf->Ln(8);
}

//$pdf->Output('I','entradamateriaPrima.pdf');
$pdf->Output('D','Reporte de clientes.pdf');
?>